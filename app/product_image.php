<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['name','product_id'];
    public $timestamps = false;
    public function product (){
    	return $this->belongTo('App\product');
    }
}
