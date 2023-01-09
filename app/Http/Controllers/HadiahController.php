<?php

namespace App\Http\Controllers;

use App\Models\ModelHadiah;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class HadiahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.datahadiah.index');

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
        $cek = ModelHadiah::where('kode_hadiah', '=', $request->get('kode_hadiah'))->get();
        if(count($cek) == 1){
            $response = array(
                'status' => 'error',
                'pesan' =>"Kode Hadiah ".$request->get('kode_hadiah') .' Sudah Terdaftar'
            );
            return response()->json($response, 500);
        }else{
            $simpan = ModelHadiah::create([
                'total_nominal_hadiah' => $request->get('nominal_hadiah'),
                'kouta' => $request->get('kouta_hadiah'),
                'nominal_hadiah_permember' => (int)$request->get('nominal_hadiah') / (int)$request->get('kouta_hadiah'),
                'kode_hadiah' => $request->get('kode_hadiah'),
                'kuota_terpenuhi' => 0,

            ]);
            if($simpan){
                $response = array(
                    'status' => 'berhasil',
                    'data' => $cek
                );
                return response()->json($response, 200);

            }else{
                $response = array(
                    'status' => 'gagal',
                    'data' => $simpan
                );
            return response()->json($response, 404);
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
        $cek = ModelHadiah::where('id_tm_hadiah', '=', $id)->get();
        if($cek){
            $response = array(
                'status' => 'berhasil',
                'data' => $cek
            );
            return response()->json($response, 200);

        }else{
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
        $cek = ModelHadiah::where('kode_hadiah', $request->get('kode_hadiah'))
        ->update([
            'total_nominal_hadiah' => $request->get('nominal_hadiah'),
            'kouta' => $request->get('kouta_hadiah'),
            'nominal_hadiah_permember' => (int)$request->get('nominal_hadiah') / (int)$request->get('kouta_hadiah'),
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
        $hasil = ModelHadiah::where('id_tm_hadiah', $id)->delete();
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
            $datas = ModelHadiah::all();
            return DataTables::of($datas)
                ->addIndexColumn() //memberikan penomoran
                ->editColumn('total_nominal_hadiah', function ($data) {
                    return number_format($data->total_nominal_hadiah, 0);
                })
                ->editColumn('nominal_hadiah_permember', function ($data) {
                    return number_format($data->nominal_hadiah_permember, 0);
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="edit btn btn-sm btn-primary" onclick="showDetailHadiah(' . $row->id_tm_hadiah . ')"> <i class="fas fa-edit"></i> Edit</a>
                        <a onclick="hapusDataHadiah(' . $row->id_tm_hadiah . ')" class="hapus btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Hapus</a>';
                    return $btn;
                })
                ->rawColumns(['action'])   //merender content column dalam bentuk html

                ->escapeColumns()  //mencegah XSS Attack
                ->toJson(); //merubah response dalam bentuk Json
        }
    }
}
