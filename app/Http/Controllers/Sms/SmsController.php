<?php

namespace App\Http\Controllers;

use App\Services\InfobipSmsService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SmsController extends Controller
{
    public function __construct(
        protected InfobipSmsService $smsService,
    ) {
    }

    public function sendSms(Request $request): JsonResponse
    {
        $request->validate([
            'phone' => 'required|string',
            'message' => 'required|string|max:1600'
        ]);

        if (! $this->smsService->isValidAngolanNumber($request->phone)) {
            return response()->json([
                'success' => false,
                'message' => 'Número de telefone inválido para Angola'
            ], 400);
        }

        $result = $this->smsService->sendSms($request->phone, $request->message);

        return response()->json($result, $result['success'] ? 200 : 400);
    }

    public function testPage()
    {
        return view('sms.test');
    }

}
