<?php

namespace App\Repositories;

use App\Http\Requests\DelayRequests\DelayAnnounceRequest;
use App\Http\Requests\DelayRequests\GetReportPerVendorRequest;
use App\Models\DelayReport;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class DelayReportRepository
{

    protected TripRepository $tripRepository;
    protected QueueDelayRepository $queueDelayRepository;
    protected OrderRepository $orderRepository;

    public function __construct(TripRepository       $tripRepository,
                                QueueDelayRepository $queueDelayRepository,
                                OrderRepository      $orderRepository)
    {
        $this->tripRepository = $tripRepository;
        $this->queueDelayRepository = $queueDelayRepository;
        $this->orderRepository = $orderRepository;
    }

    public function store($order_id, $delay = 0)
    {
        $order = $this->orderRepository->getOrder($order_id);
        $vendor_id = $order->vendor_id;

        $report = new DelayReport();
        $report->order_id = $order_id;
        $report->vendor_id = $vendor_id;

        $report->total_delay = $delay;

        try {
            $report->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return true;
    }

    /**
     * @throws GuzzleException
     * implement two approaches for delay announce and save the result in delay report table in db
     */
    public function orderDelayAnnounce(DelayAnnounceRequest $request)
    {
        $result = $this->tripRepository->getTripByOrder($request->order_id);
        $delay = 0;
        if ($result) {
            if ($result->status_id != 3) {
                // Create a client
                $client = new Client();
                $response = $client->request('GET', 'https://run.mocky.io/v3/122c2796-5df4-461c-ab75-87c1192b17f7');
                $contents = $response->getBody()->getContents();
                $delay = $contents->delay;
                //store in delay reports
                $this->store($request->order_id, $delay);

                return $contents;

            }
        }
        //store in delay reports
        $this->store($request->order_id, $delay);
        $result = $this->queueDelayRepository->store($request->order_id);
        if (!$result)
            return response()->json(['error' => "خطا!"], 400);

        return ['message' => "ثبت تاخیر و ورود به صف."];
    }


    /**
     * @return Collection
     * get total delay of vendors in the last week
     */
    public function getReportPerVendor()
    {
        return DelayReport::query()
            ->where('created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d'))
            ->groupBy('vendor_id')
            ->selectRaw('sum(total_delay) as sum, vendor_id')
            ->pluck('sum','vendor_id');
    }

}
