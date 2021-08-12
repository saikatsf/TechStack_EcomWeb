<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function getProducts(){
        
        return $this->hasOne('App\Models\product','id','productid');
    }
}
