<?php

namespace App\Repositories;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TripRepository
{
    /**
     * @param $order_id
     * @return Builder|Model|object|Trip|null
     * get trip with order_id or return null
     */
    public function getTripByOrder($order_id)
    {
        return Trip::query()->where('order_id', $order_id)->first();
    }
}
