<?php

require_once 'vendor/autoload.php';

use Mongo\MongoConnection;

$faker = \Faker\Factory::create();
$mongoClient = 'mongodb+srv://learnbuildnewskills:U7UOJOnC9rbwEBUR@cluster0.8u8l3.mongodb.net/?retryWrites=true&w=majority';
$values = MongoConnection::getInstance($mongoClient, 'logging', 'log_test');

// read query

//$read_amount = $read_mongo->read_all('rabbitmqFields');
//$query = ['payload.email' => 'frederik94@hotmail.com'];
//$read_amount = $values->read()->read_one($query);
//print_r($read_amount);


// Insert Query
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

// Insert Single Data
$payload = [
    "name"          =>  $faker->name,
    "email"         =>  $faker->email,
    "message"       =>  $faker->text,
    "uuid"          =>  $faker->uuid(),
    "card_type"     =>  $faker->creditCardType(),
    "card_number"   =>  $faker->creditCardNumber($faker->creditCardType()),
    "file_name"      =>  $faker->mimeType(),
    "active_debt"   =>  $faker->boolean(),
    "api_version"   =>  $faker->semver()
];
$documents = ["client_name" => "prime", "ip_address" => $faker->localIpv4(), "timestamp" => date("Y-m-d h:i:sa"), "payload" => $payload];
$mongo_data = $values->insert()->insert_one($documents);
print_r($mongo_data);

//
//$query = ['payload.email' => 'kapil@xya.com'];
//$read_amount = $values->read()->read_one($query);
//print_r($read_amount[0]['payload']['email']);
