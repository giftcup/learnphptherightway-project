<?php

declare(strict_types=1);

require_once 'Customer.php';

class Transaction {

    public ?Customer $customer = null;

    // Contructor property promotion
    public function __construct(
        private float $amount, 
        private string $description
    )
    {
    }

    public function addTax(float $rate): Transaction {
        $this->amount += $this->amount * $rate / 100;

        return $this;
    }

    public function applyDiscount(float $rate): Transaction {
        $this->amount -= $this->amount * $rate / 100;

        return $this;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function __destruct()
    {
        echo 'Destruct ' . $this->description . "\n\n";
    }
}