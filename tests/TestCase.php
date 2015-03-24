<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {
 
 
    /**
    * Default preparation for each test
    *
    */
   public function setUp()
   {
       parent::setUp(); // Don't forget this!
    
       $this->prepareForTests();
   }

   /**
    * Migrates the database and set the mailer to 'pretend'.
    * This will cause the tests to run quickly.
    *
    */
   private function prepareForTests()
   {
       Artisan::call('migrate');
       Mail::pretend(true);
   }

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__ . '/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

}
