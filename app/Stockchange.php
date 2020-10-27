<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockchange extends Model
{
    protected $fillable=[
        'product_id',
        'in',
        'out',
        'date'
    ];
}
