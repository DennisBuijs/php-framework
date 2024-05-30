<?php declare(strict_types=1);

use Framework\Application;

spl_autoload_register(function ($class) {
    $base_dir = __DIR__ . "/src/";

    $file = $base_dir . str_replace("\\", "/", $class) . ".php";

    if (file_exists($file)) {
        require $file;
    }
});

$application = new Application();
$application->bootstrap();
