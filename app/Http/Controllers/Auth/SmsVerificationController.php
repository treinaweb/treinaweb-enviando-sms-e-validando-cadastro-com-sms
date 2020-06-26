<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class SmsVerificationController extends Controller
{
    public function send(string $celNumber)
    {
        // $response = Http::withHeaders([
        //     'Authorization' => 'App 6ea409a5462d773242f3f33c0833700c-2f52fc97-232f-484e-ad2a-2cca3cf83426'
        // ])
        // ->post('https://yrrlpg.api.infobip.com/sms/2/text/advanced', [
        //     'messages' => [
        //         'from' => 'treinaweb',
        //         'destinations' => [
        //             'to' => '55' . $celNumber
        //         ],
        //         'text' => 'minha primeira mensagem 2'
        //     ]
        // ]);

        // dd($response->successful());

        return 'ok';
    }
}
