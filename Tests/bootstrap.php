<?php
$autoload = __DIR__ . '/../vendor/.composer/autoload.php';
if (!file_exists($autoload)) {
    throw new RuntimeException('Install dependencies to run test suite.');
}
require $autoload;

spl_autoload_register(function($class)
{
    if (0 === strpos($class, 'Hnsta\\FlickrBundle\\')) {
        $path = __DIR__ . '/../' . implode('/', array_slice(explode('\\', $class), 2)) . '.php';
        if (!stream_resolve_include_path($path)) {
            return false;
        }
        require_once $path;
        return true;
    }
});
