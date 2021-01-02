<?php


namespace HCF\Data;


use pocketmine\math\Vector3;

class HCFFaction {
	/** @var string */
	public $id;

	/** @var string */
	public $name;

	/** @var string */
	public $description;

	/** @var int */
	public $createdAt;

	/** @var Vector3 */
	public $home;

	/** @var int */
	public $power;

	/** @var string[] */
	public $members;

	/** @var string[] */
	public $toInvite;

	/** @var string[] */
	public $toAlly;

	/** @var string[] */
	public $balance;

	/** @var int */
	public $lastActive;

	private function __construct(array $raw)
	{
		$this->name = $raw['name'];
		$this->id = $raw['id'];
		$this->id = $raw['description'];
		$this->createdAt = $raw['createdAt'];
		if($raw['home']) {
			// We will store Vector3s as 'x,y,z'
			[$x, $y, $z] = explode(",",$raw['home']);
			$this->home	= new Vector3($x, $y, $z);
		} else {
			$this->home	 = new Vector3();
		}
		$this->toInvite = $raw['toInvite'] ? (array)explode(",", $raw['toInvite']) : [];
		$this->toAlly = $raw['toAlly'] ? (array)explode(",", $raw['toAlly']) : [];
		$this->balance = $raw['balance'];
		$this->lastActive = $raw['lastSeen'] ?? time();
	}

	/**
	 * A static function construct a `HCFFaction` class from raw database data
	 * @param array $raw Raw database data
	 * @return HCFFaction
	 */
	public static function from(array $raw): self {
		return new self($raw);
	}
}