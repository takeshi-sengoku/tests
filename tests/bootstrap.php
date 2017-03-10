<?php

if (version_compare(PHP_VERSION, '5.6.0') >= 0) {
    class_alias(PHPUnit\Framework\TestCase::class, 'PHPUnit_Framework_TestCase');
}

include sprintf('%s/src/vendor/autoload.php', dirname(__DIR__));
