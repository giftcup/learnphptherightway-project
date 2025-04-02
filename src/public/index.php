<?php

declare(strict_types=1);

// require_once '../Transaction.php';

require_once '../app/PaymentGateway/Stripe/Transaction.php';
require_once '../app/PaymentGateway/Paddle/Transaction.php';
require_once '../app/PaymentGateway/Paddle/CustomerProfile.php';

use App\PaymentGateway\Stripe\Transaction as StripeTransaction;
use App\PaymentGateway\Paddle\Transaction;

var_dump(new Transaction());
var_dump(new StripeTransaction());