<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;
    protected $table = 'suplier';

    protected $fillable = ['nama','telp','email'];

    public function suplai() {
        return $this->hasMany(Suplai::class);
    }

    
}