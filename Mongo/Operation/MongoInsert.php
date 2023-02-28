<?php

namespace Mongo\Operation;

use MongoDB\Exception\Exception;
use MongoDB;

class MongoInsert
{
    private $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }


    /**
     * Insert a single array in mongodb
     * @param $document
     * @return string
     */
    public function insert_one($document)
    {
        try {
            // insert a document into the collection
            $result = $this->collection->insertOne('John');
            return "Inserted document with ID: " . $result->getInsertedId();
        } catch (MongoDB\Driver\Exception\Exception $e) {
            // handle the exception
            return "Error: " . $e->getMessage();
        }
    }


    /**
     * Insert multidimensional array data
     * @param $document
     * @return array|string
     */
    public function insert_many($document)
    {
        $returnValue = array();
        try {
            // insert many documents
            $results = $this->collection->insertMany($document);
            foreach ($results->getInsertedIds() as $result)
            {
                $returnValue[] = $result;
            }
            return $returnValue;
        } catch (MongoDB\Driver\Exception\Exception $e) {
            // handle the exception
            return "Error: " . $e->getMessage();
        }
    }
}