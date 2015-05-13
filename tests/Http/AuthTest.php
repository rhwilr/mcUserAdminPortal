<?php

class AuthTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testRedirectUnauthenticated()
	{
		$this->call('GET', '/');

		$this->assertResponseStatus(302);
	}

}
