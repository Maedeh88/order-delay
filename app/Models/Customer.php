<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property BigInteger id
 * @property string name
 * @property string user_name
 * @property string phone_number
 */
class Customer extends Model
{
    use HasFactory;
}
