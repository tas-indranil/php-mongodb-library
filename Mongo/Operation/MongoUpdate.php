<?php

namespace Mongo\Operation;

class MongoUpdate
{
    private $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }
}