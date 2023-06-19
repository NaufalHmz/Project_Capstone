<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Dokter;
use App\Models\Periksa;
use DB;
use PDF;



class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        //$Dokter = Dokter::all();
        $dokter = Dokter::orderBy('id', 'DESC')->get();
        return view('dokter.index',compact('dokter'));
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
       
       
        //arahkan ke form input data
        return view('dokter.form',compact('ar_dokter'));
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
            'nama' => 'required|unique:dokter|max:45',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        //Obat::create($request->all());
        //------------apakah user  ingin upload foto-----------
        if(!empty($request->foto)){
            $fileName = 'foto-'.$request->nama.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/img'),$fileName);
        }
        else{
            $fileName = '';
        }
        //lakukan insert data dari request form
        DB::table('dokter')->insert(
            [
                'nama'=>$request->nama,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
                'foto'=>$fileName,
                
            ]);
       
        return redirect()->route('dokter.index')
                        ->with('success','Data Dokter Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Dokter::find($id);
        return view('dokter.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Dokter::find($id);
        return view('dokter.edit',compact('row'));
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
            'no_hp' => 'required',          
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        //------------foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('dokter')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user ingin ganti foto lama-----------
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($row->foto)) unlink('admin/img/'.$row->foto);
            //proses foto lama ganti foto baru
            $fileName = 'foto-'.$request->nama.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/img'),$fileName);
        }
        //------------tidak berniat ganti ganti foto lama-----------
        else{
            $fileName = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('dokter')->where('id',$id)->update(
            [
               
                'nama'=>$request->nama,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
                'foto'=>$fileName,
            
            ]);
       
        return redirect('/dokter'.'/'.$id)
                        ->with('success','Data Dokter Berhasil Diubah');
        
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
        $row = Dokter::find($id);
        if(!empty($row->foto)) unlink('admin/img/'.$row->foto);
        Dokter::where('id',$id)->delete();
        return redirect()->route('dokter.index')
                        ->with('success','Data Dokter Berhasil Dihapus');
    }

    // Dokter PDF
    public function dokterPDF()
    {
        $dokter = Dokter::all(); 
        //dd($dokter);
        $pdf = PDF::loadView('dokter.dokterPDF',['dokter'=>$dokter]);
        return $pdf->download('data_dokter.pdf');
    }
}