<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Suplier;
use DB;



class SuplierController extends Controller
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
        $suplier = Suplier::orderBy('id', 'DESC')->get();
        return view('suplier.index',compact('suplier'));
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
       
        //arahkan ke form input data
        return view('suplier.form',compact('ar_suplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nama' => 'required|unique:suplier|max:45',
            'telp' => 'required',
            'email' => 'required',
            
        ]);
       
        //lakukan insert data dari request form
        DB::table('suplier')->insert(
            [
                'nama'=>$request->nama,
                'telp'=>$request->telp,
                'email'=>$request->email,

               
            ]);
       
        return redirect()->route('suplier.index')
                        ->with('success','Data Suplier Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Suplier::find($id);
        return view('suplier.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Suplier::find($id);
        return view('suplier.edit',compact('row'));
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
          
            'nama' => 'required|max:45',
            'telp' => 'required',
            'email' => 'required',
            
        ]);
        
        //lakukan update data dari request form edit
        DB::table('suplier')->where('id',$id)->update(
            [
                //'kode_obat'=>$request->kode_obat,
                'nama'=>$request->nama,
                'telp'=>$request->telp,
                'email'=>$request->email,
                
            ]);
       
        return redirect()->route('suplier.index')
                        ->with('success','Data Suplier Berhasil Diubah');
        
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
        $row = Suplier::find($id);
        if(!empty($row->foto)) unlink('admin/img/'.$row->foto);
        //setelah itu baru hapus data obat
        Suplier::where('id',$id)->delete();
        return redirect()->route('suplier.index')
                        ->with('success','Data Suplier Berhasil Dihapus');
    }
}