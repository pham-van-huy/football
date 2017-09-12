<?php

namespace App\Services;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

class PassportService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client;
    }

    public function requestGrantToken($input, $scope = '')
    {
        try {
            $response = $this->client->post(env('APP_URL') . '/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => env('CLIENT_ID'),
                    'client_secret' => env('CLIENT_SECRET'),
                    'username' => $input['email'],
                    'password' => $input['password'],
                    'scope' => $scope,
                ],
            ]);

        } catch(\Exception $e) {
            dd($e);
        }

        return json_decode((string) $response->getBody(), true);
    }

    public function demo(){
        dd(123);
    }

    public function getTokenByUser($user)
    {
        return $user->createToken('myToken')->accessToken;
    }
}
