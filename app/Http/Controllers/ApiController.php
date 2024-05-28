<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function get_barang()
    {
        $url = env('URL_API');
        $res = Http::withoutVerifying()->get($url . "/barang");

        if ($res->ok()) {
            $body = json_decode($res->body());
        } else {
            echo ('gagal');
        }
    }

    public function get_user()
    {
        $url = env('URL_API');
        $client = new Client();
    }

    public function getData(){
        $client = new Client();
    }
}
