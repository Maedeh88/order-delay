<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderRepository
{

    /**
     * @param $order_id
     * @return Builder|Builder[]|Collection|Model|Order|null
     */
    public function getOrder($order_id){
        return Order::query()->find($order_id);
    }

}
