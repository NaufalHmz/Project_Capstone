<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat;
use App\Http\Resources\ObatResource;
use DB;
use Illuminate\Support\Facades\Validator;


class ObatController extends Controller
{
    public function index()
    {
        
        $obat = Obat::join('kategori_obat', 'kategori_obat.id', '=', 'obat.kategori_obat_id')
                ->select('obat.kode_obat','obat.nama_obat','kategori_obat.nama_kategoriobat AS kategori',
                'obat.penyimpanan','obat.stock','obat.unit','obat.kadaluwarsa','obat.harga','obat.keterangan')
                ->get();
        
                return new ObatResource(true, 'Data Obat',$obat);
    }

    public function show($id)
    {
        
        $obat = Obat::join('kategori_obat', 'kategori_obat.id', '=', 'obat.kategori_obat_id')
        ->select('obat.kode_obat','obat.nama_obat','kategori_obat.nama_kategoriobat AS kategori',
        'obat.penyimpanan','obat.stock','obat.unit','obat.kadaluwarsa','obat.harga','obat.keterangan')
        ->where('obat.id', '=', $id) 
        ->get();
        
        return new ObatResource(true, 'Detail Data Obat',$obat);
        
    }

    public function store(Request $request)
    {
        //proses input obat
        $validator = Validator::make($request->all(),[
            'kode_obat' => 'required|unique:obat',
            'nama_obat' => 'required',
            'kategori_obat_id' => 'required',
            'penyimpanan' => 'required',
            'stock' => 'required|integer',
            'unit' => 'required',
            'kadaluwarsa' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            //'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        
        //cek error
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        //proses menyimpan data yg diinput
        $obat = Obat::create([
            'kode_obat'=>$request->kode_obat,
            'nama_obat'=>$request->nama_obat,
            'kategori_obat_id'=>$request->kategori_obat_id,
            'penyimpanan'=>$request->penyimpanan,
            'stock'=>$request->stock,
            'unit'=>$request->unit,
            'kadaluwarsa'=>$request->kadaluwarsa,
            'harga'=>$request->harga,
            'keterangan'=>$request->keterangan,
        ]);

        return new ObatResource(true, 'Data Obat Berhasil diinput',$obat);
       
    }
}
