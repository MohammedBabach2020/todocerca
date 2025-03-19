<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table = 'productImages';
    protected $primaryKey = 'id';
    protected $fillable = ['prod_id', 'image'];
    public $timestamps = false;
}
