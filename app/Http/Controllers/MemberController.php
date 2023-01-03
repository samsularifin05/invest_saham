<?php

namespace App\Http\Controllers;

use App\Models\ModelMember;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.datamember.index');
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
        $cek = ModelMember::where('username', '=', $request->get('username'))->get();
        if (count($cek) == 1) {
            return redirect()->route('daftar-member')->with('info', "Username " . $request->get('username') . ' Sudah Terdaftar');
        } else {
            $simpan = ModelMember::create([
                'username' => $request->get('username'),
                'no_hp' => $request->get('no_hp'),
                'nama_lengkap' => $request->get('nama_lengkap'),
                'no_rekening' => $request->get('no_rekening'),
                'kode_referal' => '-',
                'saldo' => 0,
                'alamat_lengkap' => $request->get('alamat_lengkap'),
                'password' => bcrypt($request->get('password')),
            ]);
            if ($simpan) {
                $response = array(
                    'status' => 'berhasil',
                    'data' => $cek
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cek = ModelMember::where('id_member', '=', $id)->get();
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
        $cek = ModelMember::where('username', $request->get('username'))
            ->update([
                'nama_lengkap' => $request->get('nama_lengkap'),
                'no_hp' => $request->get('no_hp'),
                'no_rekening' => $request->get('no_rekening'),
                'alamat_lengkap' => $request->get('alamat_lengkap'),
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
        $hasil = ModelMember::where('id_member', $id)->delete();
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
            $datas = ModelMember::all();
            return DataTables::of($datas)
                ->addIndexColumn() //memberikan penomoran
                ->addColumn('action', function ($row) {
                    $btn = '<a class="edit btn btn-sm btn-primary" onclick="showDetailMember(' . $row->id_member . ')"> <i class="fas fa-edit"></i> Edit</a>
                        <a onclick="hapusDataMember(' . $row->id_member . ')" class="hapus btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Hapus</a>';
                    return $btn;
                })
                ->rawColumns(['action'])   //merender content column dalam bentuk html
                ->escapeColumns()  //mencegah XSS Attack
                ->toJson(); //merubah response dalam bentuk Json
        }
    }
}
