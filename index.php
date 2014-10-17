<?php
require_once __DIR__ . '/./vendor/autoload.php';

use \Madcat\Logger;
use \Madcat\Handler\MemoryHandler;

$logger = new Logger();
$handler = new MemoryHandler();

$logger->registerHandler('memory', $handler);

$logger->log("YES, Finished test TDD ");

var_dump($handler->getEntries());