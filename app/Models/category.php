<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    public function prd()
    {
        return $this->hasMany('App\Models\product', 'category_id', 'id');
    }
    public $timestamps = false;
}
