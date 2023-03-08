<?php

namespace Unit;

use Mongo\MongoConnection;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    const MongoString = 'mongodb+srv://learnbuildnewskills:U7UOJOnC9rbwEBUR@cluster0.8u8l3.mongodb.net/?retryWrites=true&w=majority';
    const MongoDatabase = 'logging';
    const MongoCollection = 'log_test';

    /**
     * Check if the both instances are same
     * @return void
     */
    public function testIfTheInstanceIsSame(): void
    {
        $instance1 = MongoConnection::getInstance(self::MongoString, self::MongoDatabase, self::MongoCollection);
        $instance2 = MongoConnection::getInstance(self::MongoString, self::MongoDatabase, self::MongoCollection);
        $this->assertSame($instance1, $instance2);
    }
}