<?php

declare(strict_types=1);

namespace HCF\Data;

use pocketmine\Player;

class HCFPlayer {
	/** @var Player */
	private $player;

	/** @var ?string */
	private $factionID;

	/** @var int */
	private $role;
}