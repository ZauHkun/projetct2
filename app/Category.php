<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'name',
        'form_id',    
    ];
    public function form(){
        return $this->belongsTo('App\Form');
    }
}
