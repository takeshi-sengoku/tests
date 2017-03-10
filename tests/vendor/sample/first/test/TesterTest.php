<?php

class StackTest extends PHPUnit_Framework_TestCase
{
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
            if (is_null(static::$instance)) {
                static::$instance = array();
            }
            static::$instance[static::class] = new static();
        }
        return static::$instance[static::class];
    }
}

class CoMultiton extends Multiton {
}
