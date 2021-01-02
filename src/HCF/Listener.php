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
		$username = $e->getPlayer()->getName();
		$time = time();
		$this->plugin->getServer()->getLogger()->notice(C::GREEN . "User ($username) has joined the server;");
		$this->plugin->db->query("INSERT INTO players(username, currentTime) VALUES('$username', $time);");
		$this->plugin->getServer()->getLogger()->info(C::GREEN . "Successfully wrote user ($username) into the database;");
	}
}
