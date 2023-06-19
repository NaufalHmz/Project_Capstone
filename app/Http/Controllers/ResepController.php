<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Resep;
use App\Models\Pemeriksaan;
use App\Models\Obat;
use DB;



class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        
        $resep = Resep::orderBy('id', 'DESC')->get();
        return view('resep_obat.index',compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        
        $ar_pemeriksaan = Pemeriksaan::all();
        $ar_obat = Obat::all();
       
        //arahkan ke form input data
        return view('resep_obat.form',compact('ar_pemeriksaan','ar_obat'));
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
            'pemeriksaan_id' => 'required',
            'obat_id' => 'required',
            'jumlah_obat' => 'required',
            'harga_obat' => 'required',
            
        ]);
       
        //lakukan insert data dari request form
        DB::table('resep_obat')->insert(
            [
                
                'tgl'=>$request->tgl,
                'pemeriksaan_id'=>$request->pemeriksaan_id,
                'obat_id'=>$request->obat_id,
                'jumlah_obat'=>$request->jumlah_obat,
                'harga_obat'=>$request->harga_obat,

               
            ]);
       
        return redirect()->route('resep_obat.index')
                        ->with('success','Data Resep Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Resep::find($id);
        return view('resep_obat.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Resep::find($id);
        return view('resep_obat.edit',compact('row'));
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
            'pemeriksaan_id' => 'required',
            'obat_id' => 'required',
            'jumlah_obat' => 'required',
            'harga_obat' => 'required',
            
        ]);
        
        //lakukan update data dari request form edit
        DB::table('resep_obat')->where('id',$id)->update(
            [
                'tgl'=>$request->tgl,
                'pemeriksaan_id'=>$request->pemeriksaan_id,
                'obat_id'=>$request->obat_id,
                'jumlah_obat'=>$request->jumlah_obat,
                'harga_obat'=>$request->harga_obat,

                
            ]);
       
        return redirect()->route('resep_obat.index')
                        ->with('success','Data Resep Berhasil Diubah');
        
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
        $row = Resep::find($id);
        if(!empty($row->foto)) unlink('admin/img/'.$row->foto);
        //setelah itu baru hapus data obat
        Resep::where('id',$id)->delete();
        return redirect()->route('resep_obat.index')
                        ->with('success','Data Resep Berhasil Dihapus');
    }
}