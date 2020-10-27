<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable=[
        'inv_no',
        'customer_id',
        'date',
        'num_of_category',
        'total_discount',
        'total_amount',
        'status',
        'action_by'
    ];
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    public function sale_items(){
        return $this->hasMany('App\SaleItem');
    }
}
