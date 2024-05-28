<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class DashboardController extends Controller
{
    public function index()
    {
        $client = new Client();

        $response_pemasukan = $client->get(env('URL_API') . "/grafik/masuk", ['verify' => false])->getBody()->getContents();
        $response_pemasukan = json_decode($response_pemasukan);

        $response_pengeluaran = $client->get(env('URL_API') . "/grafik/keluar", ['verify' => false])->getBody()->getContents();
        $response_pengeluaran = json_decode($response_pengeluaran);

        $chart_masuk = $response_pemasukan->incomesByMonth;
        $total_masuk = $response_pemasukan->totalIncome;

        $chart_keluar = $response_pengeluaran->expendituresByMonth;
        $total_keluar = $response_pengeluaran->totalExpenditure;

        return view('dashboard', compact('chart_masuk', 'total_masuk', 'chart_keluar', 'total_keluar'));
    }
}
