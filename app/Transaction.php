<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'users_id', 
        'inscurance_price',
        'shipping_price',
        'total_price',
        'transaction_status',
        'code'
    ];

    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo( User::class, 'users_id', 'id');
    }

     public function product(){
        return $this->hasOne(Product::class, 'id', 'products_id' );
    }
      public function transaction(){
        return $this->hasOne(Transaction::class, 'id', 'transactions_id' );
    }
}
