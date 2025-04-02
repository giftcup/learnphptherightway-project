<?php

class PaymentProfile
{
    public int $id;

    public function __construct(
        int $id
    ) {
        $this->id = rand();
    }
}
