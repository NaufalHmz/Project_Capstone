<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';

    protected $fillable = ['nama','gender','tmpt_lahir','tgl_lahir','email','no_hp','alamat','foto'];

    public function pemeriksaan() {
        return $this->hasMany(pemeriksaan::class);
    }

    
}