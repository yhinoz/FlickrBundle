<?php
$autoload = __DIR__ . '/vendor/.composer/autoload.php';
if (!file_exists($autoload)) {
    throw new RuntimeException('Install dependencies to run test suite.');
}
require $autoload;

spl_autoload_register(function($class)
{
});
