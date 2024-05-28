<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class PemasukanController extends Controller
{

    public function index()
    {
        // $client = new Client();
        // $notifResponse = $client->get(env('URL_API') . "/web/notif", [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . Session::get('token'),
        //     ],
        //     'verify' => false
        // ])->getBody()->getContents();
        // $notifResponse = json_decode($notifResponse);

        return view('pages.kas.pemasukan.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try {
            // rubah menjadi int dari format rupiah
            $rupiah = (int)str_replace('.', '', str_replace('Rp.', '', $request->rupiah));

            if($rupiah == 0) {
                return redirect()->back()->with('error', 'Nominal Tidak Boleh 0!');
            }

            $pic_pengirim = $request->pic_pengirim;
            $pic_penerima = $request->pic_penerima;
            $nominal = $rupiah;
            $tanggal = $request->tanggal;
            $keterangan = $request->keterangan;
            $upload = $request->file('upload');

            $nominal = preg_replace("/[^0-9]/", "", $nominal);

            $client = new Client();
            $res = $client->request('POST', env('URL_API') . '/kasmas',  [
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
                        'name'     => 'pic_pengirim',
                        'contents' => $pic_pengirim,
                    ],
                    [
                        'name'     => 'pic_penerima',
                        'contents' => $pic_penerima,
                    ],
                    [
                        'name'     => 'nominal_pemasukan',
                        'contents' => $nominal,
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

            return redirect()->route('pemasukan.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }



    public function show(string $id)
    {
        //
    }



    public function edit(string $id)
    {
        //
    }



    public function update(Request $request, string $id)
    {
        //
    }



    public function destroy(string $id)
    {
        //
    }
}
