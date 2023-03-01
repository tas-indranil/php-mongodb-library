<?php

namespace Mongo;
use Mongo\Operation\MongoInsert;
use Mongo\Operation\MongoRead;
use Mongo\Operation\MongoUpdate;
use MongoDB;

class MongoConnection
{
    private static $instance = null;
    private $database;
    private $collection;
    private $mongoClient;

    private function __construct(string $connection, string $database, string $collection)
    {
        $this->mongoClient = new MongoDB\Client($connection);
        $this->database = $this->mongoClient->selectDatabase($database);
        $this->collection = $this->database->selectCollection($collection);
    }

    /**
     * Get a single instance connection
     * @param $connection Mongodb connection string
     * @param $database database name
     * @param $collection collection or table name
     * @return MongoConnection|null
     */
    public static function getInstance($connection, $database, $collection): ?MongoConnection
    {
        if (self::$instance === null) {
            self::$instance = new self($connection, $database, $collection);
        }
        return self::$instance;
    }

    public function insert()
    {
        return new MongoInsert($this->collection);
    }

    public function read()
    {
        return new MongoRead($this->collection);
    }

    //------------------------------------------ private methods -----------------------------------------------------//

    /**
     * Check if array is multidimensional
     * @param $array
     * @return bool
     */
    public function is_multidimensional($array): bool
    {
        if (count($array) == count($array, COUNT_RECURSIVE))
        {
            // array is not multidimensional
            return false;
        }
        else
        {
            // array is multidimensional
            return true;
        }
    }
}


