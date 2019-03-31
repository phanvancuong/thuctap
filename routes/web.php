<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
route::group(['prefix'=>'admin'],function(){
	route::group(['prefix'=>'cate'],function(){
		route::get('list',['as'=>'admin.cate.list','uses'=>'catecontroller@getlist']);
		route::get('add',['as'=>'admin.cate.getAdd','uses'=>'catecontroller@getAdd']);
		route::post('add',['as'=>'admin.cate.postAdd','uses'=>'catecontroller@postAdd']);
		route::get('delete/{id}',['as'=>'admin.cate.getdelete','uses'=>'catecontroller@getdelete']);
		route::get('edit/{id}',['as'=>'admin.cate.getedit','uses'=>'catecontroller@getedit']);
		route::post('edit/{id}',['as'=>'admin.cate.postedit','uses'=>'catecontroller@postedit']);
	});
	route::group(['prefix'=>'product'],function(){
		route::get('add',['as'=>'admin.product.getadd','uses'=>'productcontroller@getadd']);
		route::post('add',['as'=>'admin.product.postadd','uses'=>'productcontroller@postadd']);
		route::get('list',['as'=>'admin.product.list','uses'=>'productcontroller@getlist']);
		route::get('delete/{id}',['as'=>'admin.product.getdelete','uses'=>'productcontroller@getdelete']);
		route::get('edit/{id}',['as'=>'admin.product.getedit','uses'=>'productcontroller@getedit']);
		route::post('edit/{id}',['as'=>'admin.product.postedit','uses'=>'productcontroller@postedit']);
		route::get('delimg/{id}',['as'=>'admin.product.getdelimg','uses'=>'productcontroller@getdelimg']);
	});
});