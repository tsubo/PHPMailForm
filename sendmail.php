<?php
require_once('lib/init.php');

function createMailer($config) {
    if ($config['driver'] == 'smtp') {
        // SMTP
        $transport = Swift_SmtpTransport::newInstance()
            ->setHost($config['host'])
            ->setPort($config['port'])
            ->setEncryption($config['encryption'])
            ->setUsername($config['username'])
            ->setPassword($config['password']);
    } elseif ($config['driver'] == 'sendmail') {
        // Sendmail
        $transport = Swift_SendmailTransport::newInstance($config['sendmail']);
    } else {
        // Mail
        $transport = Swift_MailTransport::newInstance();
    }

    return Swift_Mailer::newInstance($transport);
}

function sendmail($input, $message_body, $config) {
    $message = Swift_Message::newInstance($input['subject'])
        ->setFrom($input['email'])
        ->setReplyTo($input['email'])
        ->setTo('ktsubota@gmail.com')
        ->setBody($message_body);
    $mailer = createMailer($config['mail']);
    $mailer->send($message);
}

$inputs = $_POST;
$message_body = require('templates/mails/contact.php');
sendmail($inputs, $message_body, $config);

clearSession('inputs');
clearSession('errors');

require('templates/sendmail.php');
