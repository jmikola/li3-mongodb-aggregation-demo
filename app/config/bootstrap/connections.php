<?php

use lithium\data\Connections;

Connections::add('default', [
    'type' => 'MongoDb',
    'host' => 'localhost',
    'database' => 'demo'
]);
