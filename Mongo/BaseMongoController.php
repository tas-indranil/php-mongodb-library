<?php

namespace Mongo;

class BaseMongoController
{
    protected array $rabbitmqFields = ["_id", "name", "age"];

    public function rabbitmqFieldsGetter(): array
    {
        return $this->rabbitmqFields;
    }


//    public function format_read_data($arrayType)
//    {
//        if(property_exists($this, $arrayType))
//        {
//            return "yes";
//        }else{
//            return "No ".$arrayType;
//        }
//    }
}