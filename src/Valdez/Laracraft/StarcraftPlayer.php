<?php namespace Valdez\Laracraft;

class StarcraftPlayer extends StarcraftObject {

	protected $id;
	protected $realm;
	protected $name;

	function __construct($id, $name, $realm)
	{
		$this->id = $id;
		$this->name = $name;
		$this->realm = $realm;
	}

	public function populate()
	{
	}

}
