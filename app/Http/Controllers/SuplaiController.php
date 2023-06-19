<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Suplai;
use App\Models\Suplier;
use App\Models\Obat;
use DB;



class SuplaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        //$obat = obat::all();
        $suplai = Suplai::orderBy('id', 'DESC')->get();
        return view('suplai_obat.index',compact('suplai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        
        $ar_suplier = Suplier::all();
        $ar_obat = Obat::all();
       
        //arahkan ke form input data
        return view('suplai_obat.form',compact('ar_suplier','ar_obat'));
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
            'kode' => 'required|unique:suplai_obat|max:5',
            'tgl' => 'required',
            'suplier_id' => 'required',
            'keterangan' => 'required',
            'obat_id' => 'required',
            
        ]);
       
        //lakukan insert data dari request form
        DB::table('suplai_obat')->insert(
            [
                'kode'=>$request->kode,
                'tgl'=>$request->tgl,
                'suplier_id'=>$request->suplier_id,
                'keterangan'=>$request->keterangan,
                'obat_id'=>$request->obat_id,

               
            ]);
       
        return redirect()->route('suplai_obat.index')
                        ->with('success','Data Suplai Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Suplai::find($id);
        return view('suplai_obat.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Suplai::find($id);
        return view('suplai_obat.edit',compact('row'));
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
          
            'kode' => 'required|max:45',
            'tgl' => 'required',
            'suplier_id' => 'required',
            'keterangan' => 'required',
            'obat_id' => 'required',
            
        ]);
        
        //lakukan update data dari request form edit
        DB::table('suplai_obat')->where('id',$id)->update(
            [
                //'kode_obat'=>$request->kode_obat,
                'kode'=>$request->kode,
                'tgl'=>$request->tgl,
                'suplier_id'=>$request->suplier_id,
                'keterangan'=>$request->keterangan,
                'obat_id'=>$request->obat_id,

                
            ]);
       
        return redirect()->route('suplai_obat.index')
                        ->with('success','Data Suplai Berhasil Diubah');
        
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
        $row = Suplai::find($id);
        if(!empty($row->foto)) unlink('admin/img/'.$row->foto);
        //setelah itu baru hapus data obat
        Suplai::where('id',$id)->delete();
        return redirect()->route('suplai_obat.index')
                        ->with('success','Data Suplai Berhasil Dihapus');
    }
}