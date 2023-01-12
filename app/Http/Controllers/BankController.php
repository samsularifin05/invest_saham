<?php

namespace App\Http\Controllers;

use App\Models\ModelBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databank = ModelBank::all();
        $listbank = array(
            '1' => 'Bank BCA',
            '2' => 'Bank BRI',
            '3' => 'Bank BNI',
            '4' => 'Bank Mandiri',
            '5' => "Bank CIMB Niaga",
            '6' => 'Permata Bank',
            '7' => 'Bank Danamon',
            '8' => 'Bank Syariah Mandiri(BSI)',
            '9' => 'Bank Alfindo (Bank National Nobu)',
            '10' => 'Bank Jabar dan Banten (BJB)',
            '11' => 'Bank Tabungan Negara (BTN)',
            '12' => 'Bank Artos IND',
            '13' => 'Bank OCBC NISP',
            '14' => 'Bank Sinarmas',
            '15' => 'Bank Panin',
            '16' => 'Bank BNC',
        );
        return view('member.databank.index', compact('databank', 'listbank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = ModelBank::where('no_rekening', '=', $request->get('no_rekening'))->get();
        if (count($cek) == 1) {
            $response = array(
                'status' => "Berhasil",
                'pesan' => 'No Rekening Sudah Tersedia',
                'data' => []
            );
            return response()->json($response, 400);

        } else {
            $simpan = ModelBank::create([
                'id_member' => Session::get('datauser')->id_member,
                'nama_bank' => $request->get('nama_bank'),
                'no_rekening' => $request->get('no_rekening'),
                'atas_nama' => $request->get('atas_nama'),
            ]);
            if ($simpan) {
                $response = array(
                    'status' => 'berhasil',
                    'pesan' => 'Data Bank Tersedia',
                    'data' => $cek
                );
                return response()->json($response, 200);
            } else {
                $response = array(
                    'status' => 'gagal',
                    'pesan' => 'Data Bank Tidak Tersedia',
                    'data' => $simpan
                );
                return response()->json($response, 400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Session::get('datauser')->id_member;
        $cek = ModelBank::where('id_member', '=', Session::get('datauser')->id_member)->get();
        if ($cek) {
            $response = array(
                'status' => 'berhasil',
                'data' => $cek
            );
            return response()->json($response, 200);
        } else {
            $response = array(
                'status' => 'gagal',
                'pesan' => "Gagal Mengambil Data"
            );
            return response()->json($response, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasil = ModelBank::where('id', $id)->delete();
        if ($hasil) {
            $response = array(
                'status' => 'berhasil',
                'pesan' => 'Data Berhasil Di hapus'
            );
            return response()->json($response, 200);
        } else {
            $response = array(
                'status' => 'error',
                'pesan' => 'Data Gagal Di hapus'
            );
            return response()->json($response, 200);
        }
    }
}
