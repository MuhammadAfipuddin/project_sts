<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataPengajuanCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . '/data/cuti', ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);
        $response = collect($response)->sortByDesc('tanggal_mulai');

        return view('pages.pengajuan.dataPengajuanCuti.index', compact('response'));
    }


    public function catatan($id_catatan, $menu, Request $request)
    {
        if ($menu == 'pengajuanCuti') {
            $client = new Client();
            $response = $client->request('put', env('URL_API') . '/catatan/cuti/' . $id_catatan,  [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                ],
                'verify' => false,
                'multipart' => [
                    [
                        'name'     => 'catatan',
                        'contents' => $request->catatan,
                    ],
                    [
                        'name'     => 'status',
                        'contents' => $request->status,
                    ]
                ],
            ]);

            return redirect()->route('datapengajuancuti.index', compact('response'));
        } else if ($menu == 'pengajuanBarang') {

            $client = new Client();
            $response = $client->request('put', env('URL_API') . '/terimatolak/pengajuan/' . $id_catatan,  [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                ],
                'verify' => false,
                'multipart' => [
                    [
                        'name'     => 'catatan',
                        'contents' => $request->catatan,
                    ],
                    [
                        'name'     => 'status',
                        'contents' => $request->status,
                    ]
                ],
            ]);

            return redirect()->route('pengajuan.index');
        }
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
