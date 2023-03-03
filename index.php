<?php

require_once 'vendor/autoload.php';

use Mongo\MongoConnection;

$faker = \Faker\Factory::create();
$mongoClient = 'mongodb+srv://learnbuildnewskills:U7UOJOnC9rbwEBUR@cluster0.8u8l3.mongodb.net/?retryWrites=true&w=majority';

$values = MongoConnection::getInstance($mongoClient, 'logging', 'log_test');
//$insert_mongo = $values->insert();
//$documents = [
//    ['name' => 'John', 'age' => 25 ,'place' => 'nyc'],
//    ['name' => 'Mary', 'age' => 30 ,'place' => 'delhi'],
//    ['name' => 'Bob', 'age' => 40 ,'place' => 'Kolkata'],
//];
//$insert_mongo->insert_many($documents);

//$read_mongo = $values->read();
//$read_amount = $read_mongo->read_all('rabbitmqFields');
//print_r($read_amount);

//for($i=0;$i<10;)
//{
//    $payload = [
//        "name"          =>  $faker->name,
//        "email"         =>  $faker->email,
//        "message"       =>  $faker->text,
//        "uuid"          =>  $faker->uuid(),
//        "card_type"     =>  $faker->creditCardType(),
//        "card_number"   =>  $faker->creditCardNumber($faker->creditCardType()),
//        "file_name"      =>  $faker->mimeType(),
//        "active_debt"   =>  $faker->boolean(),
//        "api_version"   =>  $faker->semver()
//    ];
//    $documents[] = ["client_name" => "prime", "ip_address" => $faker->localIpv4(), "timestamp" => date("Y-m-d h:i:sa"), "payload" => $payload];
//    $i++;
//}
////$documents = ["client_name" => "prime", "ip_address" => $faker->localIpv4(), "timestamp" => date("Y-m-d h:i:sa"), "payload" => $payload];
//$mongo_data = $values->insert();
//$result = $mongo_data->insert_many($documents);
//print_r($result);
