<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
{

    public function index()
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . '/datainventory', ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);

        return view('pages.pengadaan.inventory.index', compact('response'));
    }

    public function tambahStok()
    {
        return view('pages.pengadaan.inventory.tambahStok');
    }

    public function page_update_stok($id)
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . "/detail/inventory/$id", ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);

        return view('pages.pengadaan.inventory.updateStok', compact('response'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $nama_barang = $request->nama_barang;
            $kategori = $request->kategori;
            $jumlah_barang = $request->jumlah_barang;
            $detail = $request->detail;
            $upload = $request->file('upload');

            $client = new Client();
            $res = $client->request('POST', env('URL_API') . '/tambahstokbarang',  [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                ],
                'verify' => false,
                'multipart' => [
                    [
                        'name'     => 'nama_barang',
                        'contents' => $nama_barang,
                    ],
                    [
                        'name'     => 'kategori',
                        'contents' => $kategori,
                    ],
                    [
                        'name'     => 'jumlah_barang',
                        'contents' => $jumlah_barang,
                    ],
                    [
                        'name'     => 'detail',
                        'contents' => $detail,
                    ],
                    [
                        'name'     => 'upload_poto',
                        'contents' => file_get_contents($upload->getPathname()),
                        'filename' => 'upload.' . $upload->getClientOriginalExtension(),
                    ],
                ],
            ]);

            return redirect()->route('inventory.index');
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

    public function update(Request $request, $id_update)
    {
        try {
            $nama_barang = $request->nama_barang;
            $kategori = $request->kategori;
            $jumlah_barang = $request->jumlah_barang;
            $total_diservice = $request->total_diservice;
            $status = $request->status;

            $client = new Client();
            $res = $client->request('put', env('URL_API') . "/updatebarang/" . $id_update,  [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                ],
                'verify' => false,
                'multipart' => [
                    [
                        'name'     => 'nama_barang',
                        'contents' => $nama_barang,
                    ],
                    [
                        'name'     => 'kategori',
                        'contents' => $kategori,
                    ],
                    [
                        'name'     => 'jumlah_barang',
                        'contents' => $jumlah_barang,
                    ],
                    [
                        'name'     => 'total_diservice',
                        'contents' => $total_diservice,
                    ],
                    [
                        'name'     => 'status',
                        'contents' => $status,
                    ],
                ],
            ]);

            return redirect()->route('inventory.index')->with('success', 'Barang berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $client = new Client();

        $response = $client->delete(env('URL_API') . '/delet/inventory/' . $id, ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);

        return redirect()->route('inventory.index');
    }
}
