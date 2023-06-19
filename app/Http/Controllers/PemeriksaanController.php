<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Pemeriksaan;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Resep;

use DB;



class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        
        $pemeriksaan = Pemeriksaan::orderBy('id', 'DESC')->get();
        return view('pemeriksaan.index',compact('pemeriksaan'));
    }

    public function apiPemeriksaan()
    {
        
        $pemeriksaan = Pemeriksaan::join('pasien', 'pasien.id', '=', 'pemeriksaan.pasien_id')
                ->join('dokter','dokter.id','=','pemeriksaan.dokter_id')
                ->select('pemeriksaan.tgl','pasien.nama AS pasien','dokter.nama AS dokter','pemeriksaan.diagnosa')
                ->get();
        return response()->json(
            [
                'success'=>true,
                'message'=>'Data Pemeriksaan',
                'data'=>$pemeriksaan,
            ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
       
        $ar_dokter = Dokter::all();
        $ar_pasien = Pasien::all();
       
       
        //arahkan ke form input data
        return view('pemeriksaan.form',compact('ar_dokter','ar_pasien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses input obat
        $request->validate([
            
            'tgl' => 'required',
            'diagnosa' => 'required',
            'solusi' => 'required',
            'dokter_id' => 'required',
            'pasien_id' => 'required',
            
        ]);
       
        //lakukan insert data dari request form
        DB::table('pemeriksaan')->insert(
            [
                
                'tgl'=>$request->tgl,
                'diagnosa'=>$request->diagnosa,
                'solusi'=>$request->solusi,
                'dokter_id'=>$request->dokter_id,
                'pasien_id'=>$request->pasien_id,

               
            ]);
       
        return redirect()->route('pemeriksaan.index')
                        ->with('success','Data Periksa Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Pemeriksaan::find($id);
        return view('pemeriksaan.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Pemeriksaan::find($id);
        return view('pemeriksaan.edit',compact('row'));
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
        //proses input obat
        $request->validate([
          
            
            'tgl' => 'required',
            'diagnosa' => 'required',
            'solusi' => 'required',
            'dokter_id' => 'required',
            'pasien_id' => 'required',
            
        ]);
        
        //lakukan update data dari request form edit
        DB::table('pemeriksaan')->where('id',$id)->update(
            [
                
                'tgl'=>$request->tgl,
                'diagnosa'=>$request->diagnosa,
                'solusi'=>$request->solusi,
                'dokter_id'=>$request->dokter_id,
                'pasien_id'=>$request->pasien_id,

                
            ]);
       
        return redirect()->route('pemeriksaan.index')
                        ->with('success','Data Periksa Berhasil Diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = Pemeriksaan::find($id);
        if(!empty($row->foto)) unlink('admin/img/'.$row->foto);
        //setelah itu baru hapus data obat
        Pemeriksaan::where('id',$id)->delete();
        return redirect()->route('pemeriksaan.index')
                        ->with('success','Data Periksa Berhasil Dihapus');
    }
}