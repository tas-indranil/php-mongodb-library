<?php
require_once 'vendor/autoload.php';
use Mongo\MongoConnection;

$val = "mongodb://root:rootpassword@localhost:27017";

//$mongoClient = new MongoDB\Client($val);
//
//// select a database
//$database = $mongoClient->selectDatabase('logging');
//
//// select a collection
//$collection = $database->selectCollection('log_test');

// insert a document
//$document = ['name' => 'indranil', 'age' => 34];
//$result = $collection->insertOne($document);
//echo "Inserted document with ID: " . $result->getInsertedId() . PHP_EOL;

//// find a document
//$query = ['name' => 'John'];
//$document = $collection->findOne($query);
//echo "Found document: " . print_r($document, true) . PHP_EOL;
//
//// update a document
//$query = ['name' => 'John'];
//$newValues = ['$set' => ['age' => 35]];
//$result = $collection->updateOne($query, $newValues);
//echo "Modified document count: " . $result->getModifiedCount() . PHP_EOL;
//
//// delete a document
//$query = ['name' => 'John'];
//$result = $collection->deleteOne($query);
//echo "Deleted document count: " . $result->getDeletedCount() . PHP_EOL;

$values = MongoConnection::getInstance($val, 'logging', 'log_test');

//$inserts = $values->insert();
//$document = ['name' => 'indranil', 'age' => 34, 'place' => 'kolkata'];
//$documents = [
//    ['name' => 'John', 'age' => 25],
//    ['name' => 'Mary', 'age' => 30],
//    ['name' => 'Bob', 'age' => 40],
//];
////print_r($values->is_multidimensional($documents));
//print_r($inserts->insert_many($documents));
$results = [];
$read = $values->read();
$read_amount = $read->read_all('rabbitmqFields');

//foreach ($read_amount as $document) {
//    $results[] = $document->_id;
//}

print_r($read_amount);