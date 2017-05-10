<?php
require_once('lib/init.php');

use Slim\Csrf\Guard;

$guard = new Guard;
$guard->validateStorage();
$csrfKeyPair = $guard->generateToken();

$inputs = presence($_SESSION, 'inputs', []);
$errors = presence($_SESSION, 'errors', []);

require('templates/index.php');
