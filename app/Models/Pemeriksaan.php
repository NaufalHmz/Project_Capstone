<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;
    protected $table = 'pemeriksaan';

    protected $fillable = ['tgl','diagnosa','solusi','dokter_id','pasien_id'];

    public function dokter() {
        return $this->belongsTo(Dokter::class);
    }
    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }
    public function resep_obat() {
        return $this->hasMany(Resep::class);
    }

    
}