<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    // protected $guarded = [];
    protected $fillable = [
        'name','image','description','qty','price','purchase_price','tanggal_masuk',
    ];

    // ,'distributor_id','merek_id'
    use HasFactory;

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }

    public function distributorProduct(){
        return $this->hasMany(Distibutor::class, 'distributor_id');
    }

    public function merekProduct(){
        return $this->hasMany(Merek::class, 'merek_id');
    }
}
