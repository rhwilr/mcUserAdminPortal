<?php namespace rhwilr\mcUserAdminPortal\Http\Controllers\Billing;

use rhwilr\mcUserAdminPortal\Http\Requests;
use rhwilr\mcUserAdminPortal\Http\Controllers\Controller;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Config;
use URL;
use Session;
use Redirect;

/**
 * Class PaypalController
 * @package rhwilr\mcUserAdminPortal\Http\Controllers\Billing
 */
class PaypalController extends Controller {


	/**
	 * @var ApiContext
     */
	private $_api_context;

	/**
	 *
     */
	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	/**
	 * @return mixed
     */
	public function postPayment()
	{

		$payer = new Payer();
		$payer->setPaymentMethod('paypal');


		$item_1 = new Item();
		$amount = new Amount();

		$patron_plan = null;
		$plan_ends_at = null;

		switch (\Input::get('plan')) {
			case '30':
				$item_1->setName('30 Day Patron') // item name
				->setCurrency('CHF')
					->setQuantity(1)
					->setPrice('10');

				$amount->setCurrency('CHF')
					->setTotal(10);

				$patron_plan = '30 Day Patron';
				$plan_ends_at = Carbon::now()->addDays(30);

				break;
			case '60':
				$item_1->setName('60 Day Patron') // item name
				->setCurrency('CHF')
					->setQuantity(1)
					->setPrice('19');

				$amount->setCurrency('CHF')
					->setTotal(19);

				$patron_plan = '60 Day Patron';
				$plan_ends_at = Carbon::now()->addDays(60);

				break;
			case '90':
				$item_1->setName('90 Day Patron') // item name
				->setCurrency('CHF')
					->setQuantity(1)
					->setPrice('27');

				$amount->setCurrency('CHF')
					->setTotal(27);

				$patron_plan = '90 Day Patron';
				$plan_ends_at = Carbon::now()->addDays(90);

				break;
			case 'vip':
				$item_1->setName('90 Day VIP') // item name
				->setCurrency('CHF')
					->setQuantity(1)
					->setPrice('35');

				$amount->setCurrency('CHF')
					->setTotal(35);

				$patron_plan = '90 Day VIP';
				$plan_ends_at = Carbon::now()->addDays(90);

				break;
			default:
				break;
		}


		// add item to list
		$item_list = new ItemList();
		$item_list->setItems(array($item_1));

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription(Config::get('app.appname').' Patron');

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(URL::route('payment.status'))
			->setCancelUrl(URL::route('payment.status'));

		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				return Redirect::route('patron')
					->with('error-flash', 'Some error occur, sorry for inconvenient');
			}
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		Session::put('paypal_payment_id', $payment->getId());
		Session::put('ingame_name', \Crypt::encrypt(\Input::get('name')));

		if(isset($redirect_url)) {

			\Auth::user()->subscribe($patron_plan,$plan_ends_at);

			// redirect to paypal
			return Redirect::away($redirect_url);
		}

		return Redirect::route('patron')
			->with('error-flash', 'Unknown error occurred.');
	}

	/**
	 * @return mixed
     */
	public function getPaymentStatus()
	{
		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');

		// clear the session payment ID
		Session::forget('paypal_payment_id');

		if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
			return Redirect::route('patron')
				->with('error-flash', 'Payment failed.');
		}

		$payment = Payment::get($payment_id, $this->_api_context);

		// PaymentExecution object includes information necessary
		// to execute a PayPal account payment.
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Input::get('PayerID'));

		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);

		if ($result->getState() == 'approved') { // payment made

			\Auth::user()->activate();
			$this->dispatch(
				new \rhwilr\mcUserAdminPortal\Commands\ActivateSubscription(\Auth::user()->minecraft_username)
			);

			return Redirect::route('patron')
				->with('success-flash', 'Payment completed.');
		}
		return Redirect::route('patron')
			->with('error-flash', 'Payment failed.');
	}

}
