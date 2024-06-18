<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property BigInteger customer_id
 * @property BigInteger vendor_id
 * @property int delivery_time
 * @property int new_delivery_time
 */
class Order extends Model
{
    use HasFactory;
}
