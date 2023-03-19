<?php

spl_autoload_register(function ($class) {
	$prefix = 'models\\';

	$base_dir = __DIR__ . '/models/';

	if (strpos($class, $prefix) === 0) {
		$class = substr($class, strlen($prefix));

		$file = $base_dir . str_replace('\\', '/', $class) . '.php';

		if (file_exists($file)) {
			require_once $file;
		}
	}
});
