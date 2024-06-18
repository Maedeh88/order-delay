<?php

namespace App\Models;

use Cassandra\Bigint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Bigint id
 * @property string name
 */
class Vendor extends Model
{
    use HasFactory;
}
