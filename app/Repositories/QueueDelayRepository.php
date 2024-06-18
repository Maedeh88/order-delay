<?php

namespace App\Repositories;

use App\Http\Requests\QueueDelayRequests\agentAssignRequest;
use App\Models\QueueDelay;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class QueueDelayRepository
{

    protected DelayReportRepository $delayReportRepository;

    public function __construct(DelayReportRepository $delayReportRepository){
        $this->delayReportRepository = $delayReportRepository;
    }

    /**
     * @param $order_id
     * @return bool
     * store a new delayed order in queue
     */
    public function store($order_id){
        $delay = new QueueDelay();
        $delay->order_id = $order_id;
        try {
            $delay->save();
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return false;
        }
        return true;
    }

    /**
     * @return Builder|Model|object|QueueDelay
     */
    public function getFirstOrderNotAssigned(){
        return QueueDelay::query()->whereNull('agent_id')->orderBy('created_at', 'asc')->first();
    }

    /**
     * @param agentAssignRequest $request
     * @return QueueDelay|false|Builder|Model|object
     * to assign an order to an agent with fifo approach
     */
    public function agentAssign(agentAssignRequest $request)
    {
        $firstDelayedOrder = $this->getFirstOrderNotAssigned();
        $firstDelayedOrder->agent_id = $request->agent_id;
//        $delay = Carbon::now() - $firstDelayedOrder->created_at;
//        dd($delay);
        try {
            $firstDelayedOrder->save();//store in delay reports
//            $this->delayReportRepository->store($firstDelayedOrder->order_id, $delay);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return false;
        }

        return $firstDelayedOrder->order_id;
    }


}
