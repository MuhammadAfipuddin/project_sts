<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        try {
            $username = $request->username; // sebelah kanan itu name, sebelah kiri variable
            $password = $request->password;

            $client = new Client();
            $res = $client->request('POST', env('URL_API') . '/login/web',  [
                'verify' => false,
                'headers' => ['Content-type' => 'application/json'],
                'json' => [
                    'username' => $username,
                    'password' => $password,
                ]
            ]);

            $result = json_decode($res->getBody()->getContents(), true);

            if (isset($result['token'])) {
                $resProfile = $client->request('GET', env('URL_API') . '/data/profil', [
                    'verify' => false,
                    'headers' => [
                        'Authorization' => 'Bearer ' . $result['token'],
                        'Content-type' => 'application/json'
                    ],
                ])->getBody()->getContents();
                $resProf = json_decode($resProfile, true)[0];

                Session::put('token', $result['token']);
                Session::put('id_user', $resProf['id_user']);
                Session::put('nama', $resProf['nama']);
                Session::put('username', $resProf['username']);
                Session::put('no_hp', $resProf['no_hp']);
                Session::put('email', $resProf['email']);
                Session::put('tipe_role', $resProf['tipe_role']);
                Session::put('profil', env('URL_API') . '/profil' . $resProf['profil']);
                return redirect('/');
            } else {
                return redirect()->back()->with('error', 'Username atau password salah.');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Session::forget('token');
        return redirect('login');
    }
}
