<?php

namespace Mongo;

abstract class BaseMongoController
{
    protected array $rabbitmqFields = ["_id", "client_name", "ip_address", "timestamp", "payload"];

}