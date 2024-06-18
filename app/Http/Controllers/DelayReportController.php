<?php

namespace App\Http\Controllers;

use App\Http\Requests\DelayRequests\DelayAnnounceRequest;
use App\Repositories\DelayReportRepository;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DelayReportController extends Controller
{

    protected DelayReportRepository $delayReportRepository;

    public function __construct(DelayReportRepository $delayReportRepository)
    {
        $this->delayReportRepository = $delayReportRepository;
    }

    /**
     * @param DelayAnnounceRequest $request
     * @return JsonResponse
     * @throws GuzzleException
     * to announce a delay of an order
     */
    public function orderDelayAnnounce(DelayAnnounceRequest $request){

        Log::info("hiihih");
        $result = $this->delayReportRepository->orderDelayAnnounce($request);
        if (!$result)
            return response()->json(['error' => "خطا!"], 400);

        return response()->json(['data' => $result], 200);
    }

    /**
     * @return JsonResponse
     * get total delay of vendors in the last week
     */
    public function getReportPerVendor()
    {
        Log::info("uu");
        $result = $this->delayReportRepository->getReportPerVendor();
        return response()->json(['data' => $result], 200);
    }

}
