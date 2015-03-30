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
	   $user = new \rhwilr\mcUserAdminPortal\Models\User(['id' => 1]);
      $this->be($user);
      
	   $response = $this->call('GET', 'api/v1/server');
	   $data = json_decode($response->getContent(true), true);
      $this->assertArrayHasKey('data', $data);
      $this->assertArrayHasKey('paginator', $data);
	   $this->assertResponseOk();
	}

}