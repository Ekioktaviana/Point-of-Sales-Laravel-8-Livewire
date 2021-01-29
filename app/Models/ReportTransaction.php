<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportTransaction extends Model
{
    protected $table = 'transactions_user_product_view_kembalian';
    
    use HasFactory;
}
