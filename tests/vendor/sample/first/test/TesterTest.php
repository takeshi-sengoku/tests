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
        $class_path = get_called_class();
        if (!isset(static::$instance[$class_path])) {
            if (is_null(static::$instance)) {
                static::$instance = array();
            }
            static::$instance[$class_path] = new static();
        }
        return static::$instance[$class_path];
    }
}

class CoMultiton extends Multiton {
}
