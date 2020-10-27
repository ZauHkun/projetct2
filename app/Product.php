<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name',
        'cat_id',
        'package_id',
        'price',
        'foc_id',
        'description',        
        'img',
        'status'
    ];
    public function cat(){
        return $this->belongsTo('App\Category');
    }
    public function package(){
        return $this->belongsTo('App\Package');
    }
    public function foc(){
        return $this->belongsTo('App\Foc');
    }
}

