<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use DB;
use PDF;


class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        
        $pasien = Pasien::orderBy('id', 'DESC')->get();
        return view('pasien.index',compact('pasien'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_pasien = Pasien::all();
        $ar_gender = ['L','P'];
       
       
       
        //arahkan ke form input data
        return view('pasien.form',compact('ar_pasien','ar_gender'));
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
            'nama' => 'required|unique:pasien|max:45',
            'gender' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required',
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
        DB::table('pasien')->insert(
            [
                'nama'=>$request->nama,
                'gender'=>$request->gender,
                'tmpt_lahir'=>$request->tmpt_lahir,
                'tgl_lahir'=>$request->tgl_lahir,
                'email'=>$request->email,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
                'foto'=>$fileName,
                
            ]);
       
        return redirect()->route('pasien.index')
                        ->with('success','Data Pasien Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Pasien::find($id);
        return view('pasien.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Pasien::find($id);
        return view('pasien.edit',compact('row'));
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
            'gender' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        //------------foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('pasien')->select('foto')->where('id',$id)->get();
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
        DB::table('pasien')->where('id',$id)->update(
            [
               
                'nama'=>$request->nama,
                'gender'=>$request->gender,
                'tmpt_lahir'=>$request->tmpt_lahir,
                'tgl_lahir'=>$request->tgl_lahir,
                'email'=>$request->email,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
                'foto'=>$fileName,
            ]);
       
        return redirect('/pasien'.'/'.$id)
                        ->with('success','Data Pasien Berhasil Diubah');
        
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
        $row = Pasien::find($id);
        if(!empty($row->foto)) unlink('admin/img/'.$row->foto);
        Pasien::where('id',$id)->delete();
        return redirect()->route('pasien.index')
                        ->with('success','Data Pasien Berhasil Dihapus');
    }

    public function pasienPDF()
    {
        $pasien = Pasien::all(); 
        //dd($pasien);
        $pdf = PDF::loadView('pasien.pasienPDF',['pasien'=>$pasien]);
        return $pdf->download('data_pasien.pdf');
    }
}