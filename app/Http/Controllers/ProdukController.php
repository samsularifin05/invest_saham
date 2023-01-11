<?php

namespace App\Http\Controllers;

use App\Models\ModelProduk;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Storage;
use File;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dataproduk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cekData = ModelProduk::max('kode_produk');
        if ($cekData) {
            $urutan = (int) substr($cekData, 3, 3);
            $urutan++;
            $kode_produk = 'BRG' . sprintf("%03s", $urutan);
        } else {
            $kode_produk = "BRG001";
        }
        $simpan = ModelProduk::create([
            'kode_produk' => $kode_produk,
            'nama_produk' => $request->get('nama_produk'),
            'harga_produk' => $request->get('harga_produk'),
            'keuntungan_harian' => $request->get('keuntungan_harian'),
            'total_keuntungan' => $request->get('total_keuntungan'),
            'masa_kontrak' => $request->get('masa_kontrak'),
            'image' => ''
        ]);
        if ($simpan) {
            $image_path = $request->file('image')->store('images', 'public');
            ModelProduk::where('kode_produk', $kode_produk)
                ->update([
                    'image' => basename($image_path)
                ]);
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
        $cek = ModelProduk::where('id_produk', '=', $id)->get();
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
        $cek = ModelProduk::where('id_produk', $request->get('id_produk'))
            ->update([
                'nama_produk' => $request->get('nama_produk'),
                'harga_produk' => $request->get('harga_produk'),
                'keuntungan_harian' => $request->get('keuntungan_harian'),
                'total_keuntungan' => $request->get('total_keuntungan'),
                'masa_kontrak' => $request->get('masa_kontrak'),
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
        $images = ModelProduk::where('id_produk', $id)->first();

        if(File::exists("storage/images/".$images->image)){
            unlink("storage/images/".$images->image);
        }

        $hasil = ModelProduk::where('id_produk', $id)->delete();
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
            $datas = ModelProduk::all();
            return DataTables::of($datas)
                ->addIndexColumn() //memberikan penomoran
                ->addColumn('action', function ($row) {
                    $btn = '<a class="edit btn btn-sm btn-primary" onclick="showDetailProduk(' . $row->id_produk . ')"> <i class="fas fa-edit"></i> Edit</a>
                        <a onclick="hapusDataProduk(' . $row->id_produk . ')" class="hapus btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Hapus</a>';
                    return $btn;
                })
                ->editColumn('harga_produk', function ($data) {
                    return number_format($data->harga_produk, 0);
                })
                ->editColumn('keuntungan_harian', function ($data) {
                    return number_format($data->keuntungan_harian, 0);
                })
                ->editColumn('total_keuntungan', function ($data) {
                    return number_format($data->total_keuntungan, 0);
                })
                ->rawColumns(['action'])   //merender content column dalam bentuk html
                ->escapeColumns()  //mencegah XSS Attack
                ->toJson(); //merubah response dalam bentuk Json
        }
    }
}
