<?php

declare(strict_types=1);

// require_once '../app/PaymentGateway/Stripe/Transaction.php';
// require_once '../app/PaymentGateway/Paddle/Transaction.php';
// require_once '../app/PaymentGateway/Paddle/CustomerProfile.php';
// require_once '../app/Notification/Email.php';

spl_autoload_register(function($class) {
    $path = __DIR__ . '/../' . lcfirst(str_replace('\\', '/', $class)) . '.php';
    
    if(file_exists($path)) {
        require $path;
    }
});

use App\PaymentGateway\Paddle\Transaction;
use App\PaymentGateway\Stripe\Transaction as StripeTransaction;

$paddleTransaction = new Transaction();
$stripeTransaction = new StripeTransaction();

var_dump($paddleTransaction, $stripeTransaction);