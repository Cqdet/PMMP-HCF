<?php

declare(strict_types=1);

namespace HCF;

use HCF\Database\Database;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class Loader extends PluginBase
{
    /** @var Database */
    public $db;

    /** @var Listener */
    private $listener;

    public function onEnable()
    {
        $this->listener = new Listener($this);
        $this->getServer()->getLogger()->info(C::GREEN . "HCF Core has been enabled");
        $this->db = new Database($this, 'hcf'); // We'll initalize with the players since its the core DB

    }
}
