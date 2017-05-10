<?php

return [
    // Mail Driver
    'driver' => getenv('MAIL_DRIVER', 'smtp'),             // "smtp" | "sendmail"
    'host' => getenv('MAIL_HOST', 'smtp.mailgun.org'),
    'port' => getenv('MAIL_PORT', 587),
    'encryption' => getenv('MAIL_ENCRYPTION', 'tls'),

    // SMTP Auth
    'username' => getenv('MAIL_USERNAME'),
    'password' => getenv('MAIL_PASSWORD'),

    // Sendmail
    'sendmail' => '/usr/sbin/sendmail -bs',

    // Mail Message
    'from' => [
        'address' => getenv('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => getenv('MAIL_FROM_NAME', 'Example'),
    ],
    'to' => getenv('MAIL_CONTACT_TO', 'hello@example.com'),
];
