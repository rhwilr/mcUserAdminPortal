<?php namespace rhwilr\mcUserAdminPortal\Classes;

use rhwilr\mcUserAdminPortal\Models\Server;
use gries\Rcon\MessengerFactory;

/**
 * Class ServerCheckController
 * @package rhwilr\mcUserAdminPortal\Classes
 */
class Rcon extends Classes {

    /**
     * @var
     */
    protected $server;

    /**
     * @var
     */
    protected $rcon_connection;

    /**
     * ServerCheckController constructor.
     * @param $server
     */
    public function __construct(Server $server)
    {
        $this->server = $server;
        try {
            $this->rcon_connection = MessengerFactory::create($this->server->host, $this->server->rcon_port, $this->server->rcon_password);
        } catch(\Exception $e) {
        }
    }

    /**
     *
     */
    public function online() {
        return $this->rcon_connection ? true : false;
    }

    private function raw($input, $callback = null){
        return  $this->rcon_connection ? $this->rcon_connection->send($input, $callback) : null;
    }

    public function list_players(){

        return $this->raw('list', function($arg) {
            $split_output = explode(':', $arg);
            preg_match_all("/([0-9])+/", $split_output[0], $output_array);
            return [
                'player_online' => $output_array[0][0],
                'player_max' => $output_array[0][1],
                'online' => explode(',', $split_output[1])
            ];
        });
    }

    public function activate_player($user)
    {
        return $this->raw('p user '.$user.' group set patron');
    }

    public function deactivate_player($user)
    {
        return $this->raw('p user '.$user.' group remove patron');
    }
}