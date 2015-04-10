<?php

class ServerTest extends TestCase {

	/**
	 * Test Server API Entpoint without Authentication.
	 *
	 * @return void
	 */
	public function testServerIndexUnauthorized()
	{
	   	$response = $this->call('GET', 'api/v1/server');
	   	$this->assertEquals('Invalid credentials.', $response->getContent());
	   	$this->assertResponseStatus(401);
	}


	/**
	 * Test Server API Entpoint with Authentication.
	 *
	 * @return void
	 */
	public function testServerIndexAuthorized()
	{
	   	$user = new \rhwilr\mcUserAdminPortal\Models\User(['name' => 'admin']);
		$admin = $user->where('name', '=', 'admin')->firstOrFail();
		$this->be($admin);
      
	   	$response = $this->call('GET', 'api/v1/server');
	   	$data = json_decode($response->getContent(true), true);
      	$this->assertArrayHasKey('data', $data);
      	$this->assertArrayHasKey('paginator', $data);
	   	$this->assertResponseOk();
	}

}