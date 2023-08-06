<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiWhatsApp
{
    public function enviaMensagem($numero, $mensangem): void
    {
        $client = new Client();

        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'SecretKey' => env('WHATS_SECRETKEY'),
                'PublicToken' => env('WHATS_PUBLIC_TOKEN'),
                'DeviceToken' => env('WHATS_DEVICE_TOKEN'),
                'Authorization' => 'Bearer ' . env('WHATS_BEARER_TOKEN'),
            ],
            'json' => [
                'number' => $numero,
                'text' => $mensangem,
                'time_typing' => 1
            ],
        ];

        $response = $client->post('https://cluster.apigratis.com/api/v1/whatsapp/sendText', $params);

        $body = $response->getBody()->getContents();
    }
}
