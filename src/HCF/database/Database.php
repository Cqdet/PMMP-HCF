<?php

declare(strict_types=1);

namespace HCF\Data;

use SQLite3;
use SQLite3Result;
use HCF\Loader;

class Database
{
    /** @var SQLite3 */
    private static $db;

    /** @var Loader */
    private static $plugin;

    public static function setPlugin(Loader $plugin): SQLite3
    {
        Database::$plugin = $plugin;
        Database::$db = new SQLite3("hcf.db");
        return Database::$db;
    }

    public static function init($dbName): SQLite3
    {
		Database::query("
			CREATE TABLE IF NOT EXISTS players(
            username VARCHAR(20) PRIMARY KEY, 
            ip TEXT,
            deviceID TEXT,
            xuid INT,
            hits INT, 
            xp INT,
            money INT,
			power INT,
            kills INT, 
            deaths INT,
            tags TEXT                                        
        );");
    }

    public static function query(string $q): SQLite3Result
	{
        return Database::$db->query($q);
    }
}
