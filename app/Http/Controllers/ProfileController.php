<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
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

        return view('pages.profile.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request) // store gabisa make id
    {
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
            // dd($request->all(), $id_update);
            $username = $request->username;
            $password = $request->password;
            $email = $request->email;
            $no_hp = $request->no_hp;
            // $upload = $request->file('upload');

            $upload = "";
            if ($request->file('upload')){
                $upload = $request->file('upload');
            }

            $client = new Client();
            $res = $client->request('put', env('URL_API') . "/update/profil/" . $id_update,  [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                ],
                'verify' => false,
                'multipart' => [
                    [
                        'name'     => 'username',
                        'contents' => $username,
                    ],
                    [
                        'name'     => 'password',
                        'contents' => $password,
                    ],
                    [
                        'name'     => 'email',
                        'contents' => $email,
                    ],
                    [
                        'name'     => 'no_hp',
                        'contents' => $no_hp,
                    ],
                    [
                        'name'     => 'upload_profil',
                        'contents' => $request->file("upload") ? file_get_contents($upload->getPathname()) : '',
                        'filename' => $request->file("upload") ? 'upload.' . $upload->getClientOriginalExtension() : '',
                    ],
                ],
            ]);

            // return redirect()->route('profile.index')->with('success', 'Profile berhasil diupdate');
            return redirect()->route('logout');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
