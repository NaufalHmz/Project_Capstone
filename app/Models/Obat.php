<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable = [

        'kode_obat',
        'nama_obat',
        'kategori_obat_id',
        'penyimpanan',
        'stock',
        'unit',
        'kadaluwarsa',
        'harga',
        'keterangan',
        'foto'
    ];

    public function kategori_obat() {
        return $this->belongsTo(Kategori::class);
    }
    public function suplai_obat() {
        return $this->hasMany(Suplai::class);
    }
    public function resep_obat() {
        return $this->hasMany(Resep::class);
    }


}
