<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengajuanBarangController extends Controller
{
    public function index()
    {
        $client = new Client();

        $pengajuan_response = $client->get(env('URL_API') . '/pengajuanbarang', ['verify' => false])->getBody()->getContents();
        $pengajuan_response = json_decode($pengajuan_response);
        $pengajuan_response = collect($pengajuan_response)->sortByDesc('created_at');

        $serahterima_response = $client->get(env('URL_API') . '/serahterima/barang', ['verify' => false])->getBody()->getContents();
        $serahterima_response = json_decode($serahterima_response);

        return view('pages.pengadaan.pengajuanBarang.index', compact('pengajuan_response', 'serahterima_response'));
    }


    public function store(Request $request)
    {
        try {
            $nama_penyerah = $request->nama_penyerah;
            $upload = $request->file('upload');
            $id_ajukan_barang = $request->id_ajukan_barang;

            $client = new Client();
            $res = $client->request('PUT', env('URL_API') . "/upload/bukti/serahterima/" . $id_ajukan_barang,  [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                ],
                'verify' => false,
                'multipart' => [
                    [
                        'name'     => 'uploadbukti',
                        'contents' => file_get_contents($upload->getPathname()),
                        'filename' => 'upload.' . $upload->getClientOriginalExtension(),
                    ],
                    [

                        'name'     => 'nama_penyerah',
                        'contents' => $nama_penyerah,

                    ],
                ],
            ]);

            return redirect()->route('pengajuan.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
