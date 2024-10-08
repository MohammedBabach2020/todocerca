<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=['name','category','stock','image','description','uni','trends','created_at','updated_at'];
}
