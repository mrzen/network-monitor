<?php

namespace NetworkMonitor\Tests;

error_reporting(-1);
date_default_timezone_set('UTC');

// Load Composer Stuff
require dirname(__DIR__) . '/vendor/autoload.php';

// Create a globally acessable Application
global $app;

$app = new \NetworkMonitor\Application(['debug' => true]);
