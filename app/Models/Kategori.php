<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori_obat';

    protected $fillable = ['nama_kategoriobat','keterangan'];

    public function obat() {
        return $this->hasMany(Obat::class);
    }

    
}