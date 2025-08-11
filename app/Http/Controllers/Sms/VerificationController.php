<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function send(string $phoneNumber,)
    {
        $code = \mt_rand(1000, 9999);

        session(['code' => $code]);

        $reponse = Http::withHeaders([
                    'Authorization' => 'App your authorization code goes here',
                ])
                ->post('https://yrrlpg.api.infobip.com/sms/2/text/advanced', [
                    'messages' => [
                        'from' => 'dtsr',
                        'destionations' => [
                            'to' => '244' . $phoneNumber,
                        ],
                        'text' => "Your verification code is: $code",
                    ],
                ]);
    
        if ($reponse->successful()) return 'enviado';

        return response('nao-enviado', $reponse->status());
    }

}
