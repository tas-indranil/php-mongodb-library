<?php

namespace Mongo\Operation;

use Mongo\BaseMongoController;
use Mongo\Helper\Formatter;

class MongoRead extends BaseMongoController
{
    private $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }


    public function read_all($type)
    {
        $result = $this->collection->find();
        $baseArrayField = $type;
        if(Formatter::check_property_existsa($baseArrayField, $this))
        {
            return Formatter::format_read_data($this->$baseArrayField, $result);
        }
    }
}