<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','alias','price','intro','content','image','keywords','description','user_id','cate_id'];
    //public $timestamps = false;
    public function cate (){
    	return $this->belongTo('App\cate');
    }
    public function user (){
    	return $this->belongTo('App\user');
    }
    public function pimages (){
    	return $this->hasMany('App\product_image');
    }
}
