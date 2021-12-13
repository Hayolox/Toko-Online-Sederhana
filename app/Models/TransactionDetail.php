<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\product;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product(){
        return $this->hasOne( Product::class, 'id', 'product_id' );
    }

    public function user(){
        return $this->belongsTo( User::class, 'user_id', 'id');
    }
}
