<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class NotificationController extends Controller
{
    public function fetchNotifications()
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . '/notifweb', ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);

        return response()->json($response);
    }
}
