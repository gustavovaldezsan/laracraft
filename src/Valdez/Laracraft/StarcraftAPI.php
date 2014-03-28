<?php namespace Valdez\Laracraft;

use Guzzle\Service\Client;

class StarcraftAPI {

	protected $client;
	protected $locale;

	function __construct($realm, $locale)
	{
		$client = new Client("http://{$realm}.battle.net/api/sc2", array('realm' => $realm));

		$this->locale = $locale;
		$this->client = $client;
	}

	public function changeRealm($realm)
	{
		$this->client->setBaseUrl("http://{$realm}.battle.net/api/sc2/", array('realm' => $realm));
	}

	public function getPlayer($id, $characterRealm, $characterName)
	{
		$player = new StarcraftPlayer($id, $characterRealm, $characterName);

		$player->setupApi($this->client, $this->locale);
		$player->populate();

		return $player;
	}

}
