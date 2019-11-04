<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    public function category()
        {
            return $this->belongsTo('App\Models\category', 'category_id', 'id');
        }    
    public $timestamps = false;
}
