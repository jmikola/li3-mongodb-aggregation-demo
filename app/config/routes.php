<?php

use lithium\net\http\Router;

Router::connect('/', 'Demo::index');
Router::connect('/money.json', ['Demo::aggregate', 'type' => 'json']);
