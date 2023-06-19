<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplai extends Model
{
    use HasFactory;
    protected $table = 'suplai_obat';

    protected $fillable = ['kode','tgl','suplier_id','keterangan','obat_id'];

    public function suplier() {
        return $this->belongsTo(Suplier::class);
    }
    public function obat() {
        return $this->belongsTo(Obat::class);
    }

    
}