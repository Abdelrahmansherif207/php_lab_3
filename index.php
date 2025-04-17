<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';
$config = require 'config.php';

$counter = new VisitorCounter($config['counter_file']);

echo "Unique Visits: " . $counter->getCount();
