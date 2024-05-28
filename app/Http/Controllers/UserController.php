<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . '/tabel/user', ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);

        return view('pages.user.index', compact('response'));
    }

    public function tambahUser()
    {
        return view('pages.user.tambahUser');
    }

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
            $nama = $request->nama;
            $username = $request->username;
            $password = $request->password;
            $no_hp = $request->no_hp;
            $email = $request->email;
            $role = $request->role;

            $client = new Client();
            $res = $client->request('POST', env('URL_API') . '/tambah/user',  [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                ],
                'verify' => false,
                'multipart' => [
                    [
                        'name'     => 'nama',
                        'contents' => $nama,
                    ],
                    [
                        'name'     => 'username',
                        'contents' => $username,
                    ],
                    [
                        'name'     => 'password',
                        'contents' => $password,
                    ],
                    [
                        'name'     => 'no_hp',
                        'contents' => $no_hp,
                    ],
                    [
                        'name'     => 'email',
                        'contents' => $email,
                    ],
                    [
                        'name'     => 'tipe_role',
                        'contents' => $role,
                    ],
                ],
            ]);

            return redirect()->route('userManagement.index');
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
        $client = new Client();

        $response = $client->delete(env('URL_API') . '/delet/user/' . $id, ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);

        return redirect()->route('userManagement.index');
    }
}
