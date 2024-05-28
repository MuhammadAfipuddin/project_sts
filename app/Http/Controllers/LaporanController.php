<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LaporanController extends Controller
{
    // LAPORAN KAS
    public function laporanKas(Request $request)
    {
        $client = new Client();

        $datestart = isset($request->date_start) ? $request->date_start : date('Y-m-d', strtotime('-5 years'));
        $dateend = isset($request->date_end) ? $request->date_end : date('Y-m-d');

        $tanggal_awal = (int)str_replace('-', '', $datestart);
        $tanggal_akhir = (int)str_replace('-', '', $dateend);

        if ($tanggal_awal > $tanggal_akhir) {
            return redirect()->back()->with('error', 'Tanggal awal tidak boleh lebih besar dari tanggal akhir!');
        }

        $client = new Client();

        $pemasukan_response = $client->get(env('URL_API') . '/laporanpemasukan?star=' . $datestart . '&date=' . $dateend, ['verify' => false])->getBody()->getContents();
        $pemasukan_response = json_decode($pemasukan_response);
        $pemasukan_response = collect($pemasukan_response)->sortByDesc('tanggal_waktu');

        $pengeluaran_response = $client->get(env('URL_API') . '/laporanpengeluaran?star=' . $datestart . '&date=' . $dateend, ['verify' => false])->getBody()->getContents();
        $pengeluaran_response = json_decode($pengeluaran_response);
        $pengeluaran_response = collect($pengeluaran_response)->sortByDesc('tanggal_waktu');


        return view('pages.laporan.laporanKas', compact('pemasukan_response', 'pengeluaran_response'));
    }

    // DETAIL KAS PEMASUKAN
    public function dtlKasPemasukan($id_masuk)
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . "/detailpemasukan/$id_masuk", ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);

        return view('pages.laporan.dtlKasPemasukan', compact('response'));
    }

    // DETAIL KAS PENGELUARAN
    public function dtlKasPengeluaran($id_keluar)
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . "/detail/laporanpengeluaran/$id_keluar", ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);

        return view('pages.laporan.dtlKasPengeluaran', compact('response', 'id_keluar'));
    }

    // DETAIL REIMBURSEMENT
    public function dtlReimbursement($idReimbursement)
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . "/reimburs/detail/$idReimbursement", ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);

        return view('pages.laporan.dtlReimbursement', compact('response'));
    }


    // DETAIL PENGEMBALIAN
    public function dtlPengembalian($idKembali)
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . "/reimburs/detail/$idKembali", ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);
        // dd($response);

        return view('pages.laporan.dtlPengembalian', compact('response'));
    }


    // DETAIL INVENTORY
    public function dtlInventory($idInven)
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . "/detail/inventory/$idInven", ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);

        return view('pages.laporan.dtlInventory', compact('response'));
    }


    // DETAIL LAPORAN INVENTORY
    public function dtlLapin()
    {
        return view('pages.laporan.dtlLapin');
    }

    // DETAIL PENGAJUAN BARANG
    public function dtlPengajuanBarang($id_ajukan_barang)
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . "/detailpengajuan/$id_ajukan_barang", ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);
        $response = $response[0];

        return view('pages.laporan.dtlPengajuanBarang', compact('response'));
    }

    // DETAIL PEMINJAMAN BARANG
    public function dtlPeminjamanBrg($id_pinjam_barang)
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . "/detailpinjam/$id_pinjam_barang", ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);
        $response = $response[0];

        return view('pages.laporan.dtlPeminjamanbrg', compact('response'));
    }

    // LAPORAN PENGADAAN
    public function laporanPengadaan(Request $request)
    {
        $datestart = isset($request->date_start) ? $request->date_start : date('Y-m-d', strtotime('-5 years'));
        $dateend = isset($request->date_end) ? $request->date_end : date('Y-m-d');

        $tanggal_awal = (int)str_replace('-', '', $datestart);
        $tanggal_akhir = (int)str_replace('-', '', $dateend);

        if ($tanggal_awal > $tanggal_akhir) {
            return redirect()->back()->with('error', 'Tanggal awal tidak boleh lebih besar dari tanggal akhir!');
        }

        $client = new Client();

        $pengajuan_response = $client->get(env('URL_API') . '/laporan/pengajuan?star=' . $datestart . '&date=' . $dateend, ['verify' => false])->getBody()->getContents();
        $pengajuan_response = json_decode($pengajuan_response);
        $pengajuan_response = collect($pengajuan_response)->sortByDesc('created_at');

        $peminjaman_response = $client->get(env('URL_API') . '/laporan/peminjaman?star=' . $datestart . '&date=' . $dateend, ['verify' => false])->getBody()->getContents();
        $peminjaman_response = json_decode($peminjaman_response);
        $peminjaman_response = collect($peminjaman_response)->sortByDesc('tanggal_pinjam');

        $inventory_response = $client->get(env('URL_API') . '/laporan/inventory?star=' . $datestart . '&date=' . $dateend, ['verify' => false])->getBody()->getContents();
        $inventory_response = json_decode($inventory_response);
        $inventory_response = collect($inventory_response)->sortByDesc('created_at');

        $serahterima_response = $client->get(env('URL_API') . '/laporan/penyerahan?star=' . $datestart . '&date=' . $dateend, ['verify' => false])->getBody()->getContents();
        $serahterima_response = json_decode($serahterima_response);
        $serahterima_response = collect($serahterima_response)->sortByDesc('created_at');

        return view('pages.laporan.laporanPengadaan', compact('pengajuan_response', 'peminjaman_response', 'inventory_response', 'serahterima_response'));
    }

    // DETAIL SERAH TERIMA
    public function dtlSerahTerima($idSerahTerima)
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . "/detail/serahterima/$idSerahTerima", ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);
        $response = $response[0];

        return view('pages.laporan.dtlSerahTerima', compact('response'));
    }

    // DETAIL CUTI
    public function dtlCuti($idCuti)
    {
        $client = new Client();

        $response = $client->get(env('URL_API') . "/detail/data/cuti/$idCuti", ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);
        $response = $response[0];

        return view('pages.laporan.dtlCuti', compact('response'));
    }

    // LAPORAN CUTI
    public function laporanCuti(Request $request)
    {
        $datestart = isset($request->date_start) ? $request->date_start : date('Y-m-d', strtotime('-5 years'));
        $dateend = isset($request->date_end) ? $request->date_end : date('Y-m-d');

        $tanggal_awal = (int)str_replace('-', '', $datestart);
        $tanggal_akhir = (int)str_replace('-', '', $dateend);

        if ($tanggal_awal > $tanggal_akhir) {
            return redirect()->back()->with('error', 'Tanggal awal tidak boleh lebih besar dari tanggal akhir!');
        }

        $client = new Client();

        $response = $client->get(env('URL_API') . "/laporan/cuti?star=" . $datestart . "&date=" . $dateend, ['verify' => false])->getBody()->getContents();
        $response = json_decode($response);
        $response = collect($response)->sortByDesc('tanggal_mulai');

        return view('pages.laporan.laporanCuti', compact('response'));
    }

    // PERSETUJUAN REIMBURSEMENT
    function persetujuan_reimbursement($id_persetujuan, $status)
    {

        $client = new Client();
        $res = $client->request('put', env('URL_API') . '/terimatolak/reimburst/' . $id_persetujuan,  [
            'headers' => [
                'Authorization' => 'Bearer ' . Session::get('token'),
            ],
            'verify' => false,
            'multipart' => [
                [
                    'name'     => 'status',
                    'contents' => $status,
                ]
            ],
        ]);

        return redirect()->route('reimbursement.index');
    }

    // PERSETUJUAN PEMINJAMAN
    function persetujuan_peminjaman($id_persetujuan_peminjaman, $status)
    {
        $client = new Client();
        $res = $client->request('put', env('URL_API') . "/terimatolak/pinjam/" . $id_persetujuan_peminjaman, [
            'headers' => [
                'Authorization' => 'Bearer ' . Session::get('token'),
            ],
            'verify' => false,
            'multipart' => [
                [
                    'name'     => 'status',
                    'contents' => $status,
                ]
            ],
        ]);

        return redirect()->route('peminjaman.index');
    }

    // PERSETUJUAN PENGAJUAN
    function persetujuan_pengajuan($id_persetujuan_pengajuan, Request $request)
    {
        $client = new Client();
        $res = $client->request('put', env('URL_API') . "/terimatolak/pengajuan/" . $id_persetujuan_pengajuan, [
            'headers' => [
                'Authorization' => 'Bearer ' . Session::get('token'),
            ],
            'verify' => false,
            'multipart' => [
                [
                    'name'     => 'status',
                    'contents' => $request->status,
                ],
                [
                    'name'     => 'catatan',
                    'contents' => $request->catatan,
                ]
            ],
        ]);

        return redirect()->route('pengajuan.index');
    }

    // PERSETUJUAN PENGAJUAN CUTI
    function persetujuan_cuti($id_persetujuan_cuti, $status)
    {
        $client = new Client();
        $res = $client->request('put', env('URL_API') . "/terimatolak/cuti/" . $id_persetujuan_cuti, [
            'headers' => [
                'Authorization' => 'Bearer ' . Session::get('token'),
            ],
            'verify' => false,
            'multipart' => [
                [
                    'name'     => 'status',
                    'contents' => $status,
                ]
            ],
        ]);

        return redirect()->route('datapengajuancuti.index');
    }
}















// public function dtlSerahTerima($idSerahTerima){
//         $client = new Client();

//         $response = $client->get(env('URL_API') . "/detail/serahterima/$idSerahTerima", ['verify' => false])->getBody()->getContents();
//         $response = json_decode($response);
//         $response = $response[0];

//         return view('pages.laporan.dtlSerahTerima', compact('response'));
// }

// public function dtlReimbursement($idReimbursement){
//         $client = new Client();

//         $response = $client->get(env('URL_API') . "/reimburs/detail/$idReimbursement", ['verify' => false])->getBody()->getContents();
//         $response = json_decode($response);

//         return view('pages.laporan.dtlReimbursement', compact('response'));
// }
