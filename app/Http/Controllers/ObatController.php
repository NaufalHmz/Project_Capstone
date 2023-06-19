<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use App\Models\Obat;
use App\Models\Kategori;
use PDF;
use DB;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
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
        $obat = Obat::orderBy('id', 'DESC')->get();
        return view('obat.index',compact('obat'));
    }

    public function apiObat()
    {

        $obat = Obat::join('kategori_obat', 'kategori_obat.id', '=', 'obat.kategori_obat_id')
                ->select('obat.kode_obat','obat.nama_obat','kategori_obat.nama_kategoriobat AS kategori',)
                ->get();
        return response()->json(
            [
                'success'=>true,
                'message'=>'Data Obat',
                'data'=>$obat,
            ],200);
    }

    public function apiObatDetail($id)
    {

        $obat = Obat::join('kategori_obat', 'kategori_obat.id', '=', 'obat.kategori_obat_id')
        ->select('obat.kode_obat','obat.nama_obat','kategori_obat.nama_kategoriobat AS kategori',)
        ->where('obat.id', '=', $id)
        ->get();

        if($obat){ //jika data pegawai ditemukan
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Detail Obat',
                    'data'=>$obat,
                ],200);
        }
        else{ //jika data pegawai tidak ditemukan
            return response()->json(
                [
                    'success'=>false,
                    'message'=>'Detail Obat Tidak ditemukan',
                ],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil master untuk dilooping di select option
        $ar_obat = Obat::all();
        $ar_kategori_obat = Kategori::all();


        //arahkan ke form input data
        return view('obat.form',compact('ar_obat','ar_kategori_obat'));
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
            'kode_obat' => 'required|unique:obat',
            'nama_obat' => 'required',
            'kategori_obat_id' => 'required',
            'penyimpanan' => 'required',
            'stock' => 'required|integer',
            'unit' => 'required',
            'kadaluwarsa' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
        ]);

        $input = $request->all();

        if ($request->has('foto')) {
            $foto = $request->file('foto')->store('obat/img', 'public');
            $input['foto'] = $foto;
        } else {
            unset($input['foto']);
        }

        Obat::create($input);
        session()->flash('success', 'Data Obat baru berhasil disimpan');
        return redirect(route('obat.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Obat::find($id);
        return view('obat.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Obat::find($id);
        return view('obat.edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        //proses input obat
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required|max:45',
            'kategori_obat_id' => 'required|integer',
            'penyimpanan' => 'required',
            'stock' => 'required|integer',
            'unit' => 'required',
            'kadaluwarsa' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
        ]);

        $input = $request->all();

        if ($request->has('foto')) {
            if ($obat->foto != null && Storage::disk('public')->exists($obat->foto)) {
                Storage::disk('public')->delete($obat->foto);
            }
            $foto = $request->file('foto')->store('obat/img', 'public');
            $input['foto'] = $foto;
        } else {
            unset($input['foto']);
        }

        $obat->update($input);
        session()->flash('success', 'Data berhasil diperbarui');
        return redirect(route('obat.index'));


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
        $row = Obat::find($id);
        if(!empty($row->foto)) unlink('admin/img/'.$row->foto);
        //setelah itu baru hapus data obat
        Obat::where('id',$id)->delete();
        return redirect()->route('obat.index')
                        ->with('success','Data Obat Berhasil Dihapus');
    }

    // export to PDF
    public function obatPDF()
    {
        $obat = Obat::all();
        //dd($obat);
        $pdf = PDF::loadView('obat.obatPDF',['obat'=>$obat]);
        return $pdf->download('data_obat.pdf');
    }

}
