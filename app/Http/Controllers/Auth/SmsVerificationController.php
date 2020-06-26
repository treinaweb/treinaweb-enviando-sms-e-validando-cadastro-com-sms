<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SMS\SmsServiceInterface;


class SmsVerificationController extends Controller
{
    /**
     * recebe o número do celular pela URL e envia o código de validação por SMS
     *
     * @param string $celNumber
     * @param SmsServiceInterface $smsService
     * @return void
     */
    public function send(string $celNumber, SmsServiceInterface $smsService)
    {
        $code = \mt_rand(1000, 9999);

        session(['code' => $code]);

        $response = $smsService->send(
            $celNumber, 
            "Seu codigo de verificacao e: $code"
        );

        if ($response == 200) {
            return 'enviado';
        }

        return response('nao-enviado', $response);
    }
}
