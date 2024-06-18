<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property BigInteger id
 * @property BigInteger order_id
 * @property BigInteger status_id
 */
class Trip extends Model
{
    use HasFactory;
}
