<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;

    protected $fillable = [
        'merek',
    ];

    public function product(){
        return $this->hasMany(Product::class, 'merek_id');
    }

    public function merek()
    {
        return $this->belongsTo(Product::class);
    }
}
