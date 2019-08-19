<?php
error_reporting(E_ALL);
ini_set('display_error', 1);

session_start();

//setlocale(LC_ALL, 'fr_FR.UTF8');
setlocale(LC_ALL, 'fr');

spl_autoload_register('autoload');

function autoload($class) {
    if (exist($class)) {
        require_once str_replace('\\', '/', $class) . '.class.php';
    }
}
function exist($class) {
    return file_exists(str_replace('\\', '/', $class) . '.class.php');
}
