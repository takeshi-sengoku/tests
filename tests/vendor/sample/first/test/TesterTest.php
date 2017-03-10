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
    static $instance = null;

    private final function __construct()
    {}

    public static function getInstance()
    {
        if (!isset(static::$instance[static::class])) {
            if (is_null(static::$instance[static::class])) {
                static::$instance = array();
            }
            static::$instance[static::class] = new static();
        }
        return static::$instance[static::class];
    }
}

class CoMultiton extends Multiton {
}
