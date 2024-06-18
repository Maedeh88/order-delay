<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property BigInteger order_id
 * @property BigInteger vendor_id
 * @property int total_delay
 */
class DelayReport extends Model
{
    use HasFactory;
    protected $table = "delay_reports";
}
