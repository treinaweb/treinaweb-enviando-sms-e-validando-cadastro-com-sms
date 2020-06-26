<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class SmsVerificationController extends Controller
{
    public function send(string $celNumber)
    {
        $code = \mt_rand(1000, 9999);

        session(['code' => $code]);

        $response = Http::withHeaders([
            'Authorization' => 'App 6ea409a5462d773242f3f33c0833700c-2f52fc97-232f-484e-ad2a-2cca3cf83426'
        ])
        ->post('https://yrrlpg.api.infobip.com/sms/2/text/advanced', [
            'messages' => [
                'from' => 'treinaweb',
                'destinations' => [
                    'to' => '55' . $celNumber
                ],
                'text' => "Seu codigo de verificacao e: $code"
            ]
        ]);

        if ($response->successful()) {
            return 'enviado';
        }

        return response('nao-enviado', $response->status());
    }
}
