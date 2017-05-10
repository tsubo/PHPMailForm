<?php
require_once('lib/init.php');

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;
use Slim\Csrf\Guard;

function validateCsrfToken($csrfNameKey, $csrfValueKey) {
    $guard = new Guard;
    $guard->validateStorage();
    if ($guard->validateToken($csrfNameKey, $csrfValueKey) == false) {
        http_response_code(400);
        echo "Bad Request!!";
        exit;
    }
}

function createValidator($inputs) {
    $email = presence($inputs, 'email', '');
    return v::key('name', v::NotBlank())
              ->key('email', v::email())
              ->key('email_confirm', v::equals($email))
              ->key('subject', v::NotBlank())
              ->key('message', v::NotBlank());
}

function getErrorMessages(NestedValidationException $e) {
    return $e->findMessages([
      'name' => 'お名前を入力してください。',
      'email' => 'メールアドレスを正しい書式で入力してください。',
      'email_confirm' => 'メールアドレスが一致していません。',
      'subject' => '件名を入力してください。',
      'message' => '内容を入力してください。',
    ]);
}

$inputs = $_POST;
$_SESSION['inputs'] = $inputs;

$csrfNameKey = presence($inputs, 'csrf_name');
$csrfValueKey = presence($inputs, 'csrf_value');
validateCsrfToken($csrfNameKey, $csrfValueKey);

try {
    $validator = createValidator($inputs);
    $validator->assert($inputs);

    clearSession('errors');
    require('templates/confirm.php');
} catch (NestedValidationException $e) {
    $errors = getErrorMessages($e);
    $_SESSION['errors'] = $errors;

    header('Location: index.php');
    exit;
}
