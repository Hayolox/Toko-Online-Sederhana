<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionDetail;


class product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->hasOne( User::class, 'id', 'users_id');
    }
}
