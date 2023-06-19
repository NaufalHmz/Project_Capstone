<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Kategori;
use DB;



class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        
        $kategori_obat = Kategori::orderBy('id', 'DESC')->get();
        return view('kategori.index',compact('kategori_obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_kategori_obat = Kategori::all();
       
        //arahkan ke form input data
        return view('kategori.form',compact('ar_kategori_obat'));
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
            'nama_kategoriobat' => 'required|unique:kategori_obat|max:20',
            'keterangan' => 'required',
            
        ]);
       
        //lakukan insert data dari request form
        DB::table('kategori_obat')->insert(
            [
                'nama_kategoriobat'=>$request->nama_kategoriobat,
                'keterangan'=>$request->keterangan,

               
            ]);
       
        return redirect()->route('kategori_obat.index')
                        ->with('success','Data Kategori Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Kategori::find($id);
        return view('kategori.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Kategori::find($id);
        return view('kategori.edit',compact('row'));
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
          
            'nama_kategoriobat' => 'required|max:45',
            'keterangan' => 'required',
            
        ]);
        
        //lakukan update data dari request form edit
        DB::table('kategori_obat')->where('id',$id)->update(
            [
                //'kode_obat'=>$request->kode_obat,
                'nama_kategoriobat'=>$request->nama_kategoriobat,
                'keterangan'=>$request->keterangan,
                
            ]);
       
        return redirect()->route('kategori_obat.index')
                        ->with('success','Data Kategori Berhasil Diubah');
        
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
        $row = Kategori::find($id);
        if(!empty($row->foto)) unlink('admin/img/'.$row->foto);
        //setelah itu baru hapus data obat
        Kategori::where('id',$id)->delete();
        return redirect()->route('kategori_obat.index')
                        ->with('success','Data Kategori Berhasil Dihapus');
    }
}