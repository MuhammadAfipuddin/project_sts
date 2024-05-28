<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReimbursementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . '/reimburs', ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);
        $response = collect($response)->sortByDesc('tanggal_waktu');

        $res = $client->get(env('URL_API') . '/reimbursmen/pengembalian/dana', ['verify' => false])->getBody()->getContents();
        $res = json_decode($res);
        $res = collect($res)->sortBy('nama')->values()->all();

        return view('pages.kas.reimbursement.index', compact('response', 'res'));
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
            $upload = $request->file('upload');
            $id_kembali = $request->id_kembali;

            $client = new Client();
            $res = $client->request('PUT', env('URL_API') . "/reimburs/pengembaliandana/" . $id_kembali,  [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                ],
                'verify' => false,
                'multipart' => [
                    [
                        'name'     => 'bukti_reimburs',
                        'contents' => file_get_contents($upload->getPathname()),
                        'filename' => 'upload.' . $upload->getClientOriginalExtension(),
                    ],
                ],
            ]);

            return redirect()->route('reimbursement.index');
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
