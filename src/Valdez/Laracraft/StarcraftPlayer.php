<?php namespace Valdez\Laracraft;

class StarcraftPlayer extends StarcraftObject {

	protected $id;
	protected $realm;
	protected $name;

	protected $profileData;
	protected $laddersData;
	protected $matchesData;

	function __construct($id, $realm, $name)
	{
		$this->id = $id;
		$this->name = $name;
		$this->realm = $realm;
	}

	public function populate()
	{
		$profileQuery = "/api/sc2/profile/$this->id/$this->realm/$this->name/";
		$laddersQuery = $profileQuery . "ladders";
		$matchesQuery = $profileQuery . "matches";

		$this->profileData = $this->runApiCall($profileQuery);
		$this->laddersData = $this->runApiCall($laddersQuery);
		$this->matchesData = $this->runApiCall($matchesQuery);
	}

	public function getProfile()
	{
		// We just want top level data. I'll try to figure out a cleaner way of doing this.
		$data = array(
			'id'           => $this->profileData['id'],
			'realm'        => $this->profileData['realm'],
			'displayName'  => $this->profileData['displayName'],
			'clanName'     => $this->profileData['clanName'],
			'clanTag'      => $this->profileData['clanTag'],
			'profilePath'  => $this->profileData['profilePath'],
		);

		return $data;
	}

}
