<?php

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testPushAndPop()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }

    public function testStatic () {
        $this->assertNotEquals(CoMultiton::getInstance(), Multiton::getInstance());
    }
}

class Multiton {
    protected static $instance = [];

    private final function __construct()
    {}

    public static function getInstance()
    {
        return static::$instance[static::class] ?? static::$instance[static::class] = new static();
    }
}

class CoMultiton extends Multiton {
}
