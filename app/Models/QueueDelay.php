<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property BigInteger order_id
 * @property BigInteger agent_id
 */
class QueueDelay extends Model
{
    use HasFactory;
}
