<?php

declare(strict_types=1);

namespace HCF\Database;

use SQLite3;
use HCF\Loader;

class Database
{
    /** @var SQLite3 */
    private $db;

    /** @var Loader */
    private $plugin;

    public function __construct(Loader $plugin, string $dbName)
    {
        $this->plugin = $plugin;
        $this->db = new SQLite3($plugin->getDataFolder() . $dbName . ".db");
    }

    public function createDB($dbName): SQLite3
    {
		$this->query("CREATE TABLE IF NOT EXISTS players(username VARCHAR(20), currentTime INT);");
    }

    public function query(string $q)
    {
        return $this->db->exec($q);
    }
}
