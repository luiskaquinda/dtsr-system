<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class InfobipSmsService
{
    protected $client;
    protected $baseUrl;
    protected $apiKey;
    protected $senderId;

    public function __construct()
    {
        $this->client = new Client(['timeout' => 30]);
        $this->baseUrl = 'http://pemrpm.api.infobip.com/';
        $this->apiKey = '9dda74d201dbb5ed73b53ffeb9263fd8-675a0234-1c6d-4a23-9694-50b30b41e28e';
        $this->senderId = 'DTSR';
    }

    public function sendSms(string $to, string $message): array
    {
        return $this->sendBulkSms([
            [
                'to' => $to,
                'text' => $message
            ]
        ]);
    }

    public function sendBulkSms(array $messages): array
    {
        try {
            $destinations = array_map(function ($message) {
                return [
                    'to' => $this->formatPhoneNumber($message['to']),
                    'text' => $message['text']
                ];
            }, $messages);

            $response = $this->client->post($this->baseUrl . '/sms/2/text/advanced', [
                'headers' => [
                    'Authorization' => 'App ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ],
                'json' => [
                    'messages' => array_map(function ($dest) {
                        return [
                            'destinations' => [
                                ['to' => $dest['to']]
                            ],
                            'from' => $this->senderId,
                            'text' => $dest['text']
                        ];
                    }, $destinations)
                ]
            ]);

            $result = json_decode($response->getBody()->getContents(), true);
            
            return [
                'success' => true,
                'data' => $result,
                'message' => 'SMS enviado com sucesso'
            ];

        } catch (GuzzleException $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'Falha ao enviar SMS'
            ];
        }
    }

    private function formatPhoneNumber(string $phone): string
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (strlen($phone) === 9 && ! str_starts_with($phone, '244')) {
            $phone = '244' . $phone;
        }

        if (!str_starts_with($phone, '+')) {
            $phone = '+' . $phone;
        }
        
        return $phone;
    }

    public function isValidAngolanNumber(string $phone): bool
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (str_starts_with($phone, '244')) {
            $phone = substr($phone, 3);
        }

        return strlen($phone) === 9 && str_starts_with($phone, '9');
    }

}
