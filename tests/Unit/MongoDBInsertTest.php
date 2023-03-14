<?php

namespace Unit;
use Mongo\MongoConnection;
use PHPUnit\Framework\TestCase;

class MongoDBInsertTest extends TestCase
{
    const MongoString = 'mongodb+srv://learnbuildnewskills:U7UOJOnC9rbwEBUR@cluster0.8u8l3.mongodb.net/?retryWrites=true&w=majority';
    const MongoDatabase = 'logging';
    const MongoCollection = 'testing';
    protected $mongoConnection;
    protected $result;

    protected function setUp(): void
    {
        $this->mongoConnection = MongoConnection::getInstance(self::MongoString, self::MongoDatabase, self::MongoCollection);
        $payload = [
            "name"          =>  "Kapil",
            "email"         =>  "kapil@xya.com",
            "message"       =>  "PHPUnit Test message",
            "uuid"          =>  "344e6d1f-f8ac-3b2c-bf0c-474a85eae113",
            "card_type"     =>  "Visa",
            "card_number"   =>  "342144403204224",
            "file_name"      =>  "audio/ogg",
            "active_debt"   =>  "true",
            "api_version"   =>  "1.0.0"
        ];
        $documents = ["client_name" => "redwood", "ip_address" => "192.168.80.40", "timestamp" => date("Y-m-d h:i:sa"), "payload" => $payload];
        $this->result = $this->mongoConnection->insert()->insert_one($documents);
    }


    public function testValueHasBeenInserted()
    {
        $dataType = gettype($this->result);
        $this->assertSame('string', $dataType);
    }


    public function testInsertedDataIsTheSame()
    {
        $query = ['payload.name' => 'Kapil'];
        $query_result = $this->mongoConnection->read()->read_one($query);
        $this->assertSame('Kapil', $query_result[0]['payload']['name']);
        $this->assertSame('kapil@xya.com', $query_result[0]['payload']['email']);
        $this->assertSame('1.0.0', $query_result[0]['payload']['api_version']);
        $this->assertSame('342144403204224', $query_result[0]['payload']['card_number']);
        $this->assertSame('redwood', $query_result[0]['client_name']);
        $this->assertSame('192.168.80.40', $query_result[0]['ip_address']);
    }




    protected function tearDown(): void
    {
        $this->mongoConnection = null;
    }
}