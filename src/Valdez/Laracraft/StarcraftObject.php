<?php namespace Valdez\Laracraft;

use Guzzle\Service\Client;

class StarcraftObject {

	protected $client;
	protected $locale;

	public function setupApi($client, $locale)
	{
		$this->client = $client;
		$this->locale = $locale;
	}

	public function runApiCall($query)
	{
		$query = $query . "?locale=$this->locale";

		// TODO: Handle errors
		return $this->client->get($query)->send()->json();
	}

}
