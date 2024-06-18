<?php

namespace App\Http\Controllers;

use App\Http\Requests\QueueDelayRequests\agentAssignRequest;
use App\Repositories\OrderRepository;
use App\Repositories\QueueDelayRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QueueDelayController extends Controller
{
    protected QueueDelayRepository $queueDelayRepository;
    protected OrderRepository $orderRepository;

    public function __construct(QueueDelayRepository $queueDelayRepository,
                                OrderRepository      $orderRepository)
    {
        $this->queueDelayRepository = $queueDelayRepository;
        $this->orderRepository = $orderRepository;
    }


    /**
     * @param agentAssignRequest $request
     * @return JsonResponse
     * to assign an order to an agent with FIFO approach
     */
    public function agentAssign(agentAssignRequest $request)
    {
        $result = $this->queueDelayRepository->agentAssign($request);
        if (!$result)
            return response()->json(['error' => "خطا!"], 400);

        $order = $this->orderRepository->getOrder($result);
        return response()->json(['data' => $order], 200);
    }

}
