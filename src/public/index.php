<?php

declare(strict_types=1);

require_once '../Transaction.php';

$transaction = new Transaction(5.99, "Headsets");

// Chaining methods
$amount = $transaction->addTax(7.5)
    ->applyDiscount(20)
    ->getAmount();


$transaction2 = new Transaction(5, 'Test');

$transaction->customer?->paymentProfile?->id;