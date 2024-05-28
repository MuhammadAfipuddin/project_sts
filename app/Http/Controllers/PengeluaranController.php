<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $client = new Client();
        // $notifResponse = $client->get(env('URL_API') . "/web/notif", [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . Session::get('token'),
        //     ],
        //     'verify' => false
        // ])->getBody()->getContents();
        // $notifResponse = json_decode($notifResponse);

        $datestart = isset($request->pemasukan_start) ? $request->pemasukan_start : date('Y-m-d', strtotime('-5 years'));
        $dateend = isset($request->pemasukan_end) ? $request->pemasukan_end : date('Y-m-d');

        $pengeluaran_response = $client->get(env('URL_API') . '/laporanpengeluaran?star=' . $datestart . '&date=' . $dateend, ['verify' => false])->getBody()->getContents();
        $pengeluaran_response = json_decode($pengeluaran_response);

        return view('pages.kas.pengeluaran.index', compact('pengeluaran_response'));
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
        try {
            // rubah menjadi int dari format rupiah
            $rupiah = (int)str_replace('.', '', str_replace('Rp.', '', $request->rupiah));

            if ($rupiah == 0) {
                return redirect()->back()->with('error', 'Nominal Tidak Boleh 0!');
            }

            $nama_pengirim = $request->nama_pengirim;
            $nama_penerima = $request->nama_penerima;
            $nominal_pengeluaran = $rupiah;
            $tanggal = $request->tanggal;
            $keterangan = $request->keterangan;
            $upload = $request->file('upload');

            $nominal = preg_replace("/[^0-9]/", "", $nominal_pengeluaran);

            $client = new Client();
            $res = $client->request('POST', env('URL_API') . '/kasKeluar',  [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                ],
                'verify' => false,
                'multipart' => [
                    [
                        'name'     => 'upload_bukti',
                        'contents' => file_get_contents($upload->getPathname()),
                        'filename' => 'upload.' . $upload->getClientOriginalExtension(),
                    ],
                    [
                        'name'     => 'nama_pengirim',
                        'contents' => $nama_pengirim,
                    ],
                    [
                        'name'     => 'nama_penerima',
                        'contents' => $nama_penerima,
                    ],
                    [
                        'name'     => 'nominal_pengeluaran',
                        'contents' => $nominal_pengeluaran,
                    ],
                    [
                        'name'     => 'tanggal',
                        'contents' => $tanggal,
                    ],
                    [
                        'name'     => 'keterangan',
                        'contents' => $keterangan,
                    ]
                ],
            ]);

            return redirect()->route('pengeluaran.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
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
