<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

class Transaction 
{
   const STATUS_PAID = 'paid';
   const STATUS_PENDING = 'status_pending';
   const STATUS_DECLINED = 'declined';

     public function __construct()
     {
        var_dump(self::STATUS_DECLINED);
     }
}