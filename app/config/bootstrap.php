<?php

require __DIR__ . '/bootstrap/libraries.php';
require __DIR__ . '/bootstrap/errors.php';

if (PHP_SAPI !== 'cli') {
	require __DIR__ . '/bootstrap/cache.php';
}

require __DIR__ . '/bootstrap/connections.php';
require __DIR__ . '/bootstrap/action.php';

if (PHP_SAPI === 'cli') {
	require __DIR__ . '/bootstrap/console.php';
}
