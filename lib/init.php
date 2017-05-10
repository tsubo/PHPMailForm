<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;

function h($str) {
    return htmlspecialchars($str);
}

function present($hash, $key) {
    return !empty($hash[$key]);
}

function presence($hash, $key, $default_value = null) {
    return present($hash, $key) ? $hash[$key] : $default_value;
}

function clearSession($key) {
    if (isset($_SESSION[$key])) {
        unset($_SESSION[$key]);
    }
}

$dotenv = new Dotenv(__DIR__ . "/..");
$dotenv->load();
$config = [];
$config['mail'] = require __DIR__ . "/../config/mail.php";

session_start();
