<?php

namespace App\Services\SMS\Providers;

use Illuminate\Support\Facades\Http;
use App\Services\SMS\SmsServiceInterface;

class InfobipProvider implements SmsServiceInterface
{
    /**
     * Token da api
     *
     * @var string
     */
    private $token;

    /**
     * URL da API
     *
     * @var string
     */
    private $url;

    /**
     * Recebe os dados de acesso da API
     *
     * @param string $token
     * @param string $url
     */
    public function __construct(string $token, string $url)
    {
        $this->token = $token;
        $this->url = $url;
    }

    /**
     * Envia um SMS
     *
     * @param string $celNumber
     * @param string $msg
     * @return integer
     */
    public function send(string $celNumber, string $msg): int
    {
        $response = Http::withHeaders([
            'Authorization' => "App {$this->token}"
        ])
        ->post("{$this->url}/text/advanced", [
            'messages' => [
                'from' => 'treinaweb',
                'destinations' => [
                    'to' => '55' . $celNumber
                ],
                'text' => $msg
            ]
        ]);

        return $response->status();
    }
}