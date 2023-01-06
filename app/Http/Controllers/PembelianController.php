<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelPembelian;
use Yajra\DataTables\DataTables;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //file index
        return view('member.pembelian.index');
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
        //save pembelian 
        $simpan = ModelPembelian::create([
            'id_produk' => '1',
            'id_member' => '1',
            'id_detail_paket' => $request->get('paket'),
            'tanggal_mulai' => 'contoh',
            'tanggal_selesai' => 'contoh',
            'status_pembayaran' => '0'
        ]);
        if ($simpan) {
            $response = array(
                'status' => 'berhasil',
                'data' => $simpan
            );
            return response()->json($response, 200);
        } else {
            $response = array(
                'status' => 'gagal',
                'data' => $simpan
            );
            return response()->json($response, 404);
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
        //
        $cek = ModelPembelian::where('id', '=', $id)->get();
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
        $cek = ModelPembelian::where('id', $request->get('id'))
            ->update([
                'id_detail_paket' => $request->get('paket'),
            ]);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $hasil = ModelPembelian::where('id', $id)->delete();
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

    public function dataTable(Request $request)
    {
        if ($request->ajax()) {
            $datas = ModelPembelian::all();

            return DataTables::of($datas)
                ->addIndexColumn() //memberikan penomoran
                ->addColumn('action', function ($row) {
                    $btn = '<a class="edit btn btn-sm btn-primary" onclick="showDetailPembelian(' . $row->id . ')"> <i class="fas fa-edit"></i> Edit</a>
                        <a onclick="hapusDataPembelian(' . $row->id . ')" class="hapus btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Hapus</a>';
                    return $btn;
                })
                ->rawColumns(['action'])   //merender content column dalam bentuk html
                ->escapeColumns()  //mencegah XSS Attack
                ->toJson(); //merubah response dalam bentuk Json
        }
    }
}
