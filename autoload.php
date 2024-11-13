<?php
spl_autoload_register(function ($class) {
    $class = str_replace('classes\\', '', $class);
    $file = __DIR__ . '/classes/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Файл не найден: $file\n";
    }
});