<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        // $notifResponse = $client->get(env('URL_API') . "/web/notif", [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . Session::get('token'),
        //     ],
        //     'verify' => false
        // ])->getBody()->getContents();
        // $notifResponse = json_decode($notifResponse);

        $response = $client->get(env('URL_API') . '/pinjambarang', ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);
        $response = collect($response)->sortByDesc('tanggal_pinjam');

        return view('pages.pengadaan.peminjaman.index', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
