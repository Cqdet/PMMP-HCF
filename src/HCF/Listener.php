<?php

declare(strict_types=1);

namespace HCF;

use pocketmine\event\Listener as EventListener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat as C;

class Listener implements EventListener
{
	/** @var Loader */
	private $plugin;

	public function __construct(Loader $plugin)
	{
		$plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
		$this->plugin = $plugin;
	}

	public function onJoin(PlayerJoinEvent $e): void
	{
		
	}
}
