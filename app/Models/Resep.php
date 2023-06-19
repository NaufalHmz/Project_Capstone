<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $table = 'resep_obat';
  

    protected $fillable = ['tgl','pemeriksaan_id','obat_id','jumlah_obat','harga_obat'];

    public function pemeriksaan() {
        return $this->belongsTo(Pemeriksaan::class);
    }
    public function obat() {
        return $this->belongsTo(Obat::class);
    }

    
}