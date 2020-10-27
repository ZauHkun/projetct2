<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $fillable=[
        'sale_id',
        'product_id',
        'qty',
        'foc',
        'discount',
        'amount'
    ];
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
