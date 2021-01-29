<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_distributor', 'alamat', 'no_telepon',
    ]; 

    public function product(){
        return $this->hasMany(Product::class, 'distributor_id');
    }

    public function distributor()
    {
        return $this->belongsTo(Product::class);
    }
}
