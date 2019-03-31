<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Request;
use App\cate;
use App\product;
use App\Http\Requests\productrequest;

use App\product_image;
use Illuminate\Support\Facades\Input,File;
class productcontroller extends Controller
{
    public function getlist(){
        $data = product::select('id','name','price','cate_id','created_at')->orderBy('id','DESC')->get()->toArray();
        return view('admin.product.list',compact('data'));
    }
    public function getadd(){
    	$cate = cate::select('name','id','parent_id')->get()->toArray();
    	return view('admin.product.add',compact('cate'));
    }
    public function postadd(productrequest $product_request){
    	$file_name=$product_request->file('fImages')->getClientOriginalName();
    	$product=new product();
    	$product->name=$product_request->txtName;
    	$product->alias=$product_request->txtName;
    	$product->price=$product_request->txtPrice;
    	$product->intro=$product_request->txtIntro;
    	$product->content=$product_request->txtContent;
    	$product->image=$file_name;
    	$product_request->file('fImages')->move('resources/upload/',$file_name);
    	$product->keywods=$product_request->txtkeywords;
    	$product->description=$product_request->txtdescription;
    	$product->user_id=1;
    	$product->cate_id=$product_request->sltparent;
    	$product->save();

    	$product_id = $product -> id;
    	if ($product_request->hasFile('productdetail')) {
    		foreach ($product_request->file('productdetail') as $file) {
    			$product_img =new product_image();
    			if (isset($file) ) {
    				$product_img->image= $file->getClientOriginalName();
    				$product_img->product_id=$product_id;
    				$file->move('resources/upload/hinhphu/',$file->getClientOriginalName());
    				$product_img->save();
    				
    			}
    		}
    	}
        return redirect()->route('admin.product.list')->With(['flas_level'=>'success','flas_messager'=>'thêm product thành công...!']);
    }
    public function getdelete($id){
        $productdetail=product::find($id)->pimages;
        foreach ($productdetail as $value) {
            File::delete('resources/upload/hinhphu/'.$value["image"]);
        }
        $product=product::find($id);
        File::delete('resources/upload/'.$product->image);
        $product->delete($id);
        return redirect()->route('admin.product.list')->With(['flas_level'=>'success','flas_messager'=>'xóa product thành công...!']);
    }
    public function getedit($id){
        $cate =cate::select('id','name','parent_id')->get()->toArray();
        $product=product::find($id);
        $productimg=product::find($id)->pimages;
        return view('admin.product.edit',compact('cate','product','productimg'));
    }
    public function postedit($id, Request $request){
        $product=product::find($id);
        $product->name=Request::input('txtName');
        $product->alias=Request::input('txtName');
        $product->price=Request::input('txtPrice');
        $product->intro=Request::input('txtIntro');
        $product->content=Request::input('txtContent');
        $product->keywods=Request::input('txtKeywords');
        $product->description=Request::input('txtdescription');
        $product->user_id=1;
        $product->cate_id=Request::input('sltparent');
        $img_curent='resources/upload/'.Request::input('img_curent');
        if (!empty(Request::file('fImages'))) {
            $file_name=Request::file('fImages')->getClientOriginalName();
            $product->image=$file_name;
            Request::file('fImages')->move('resources/upload/',$file_name);
            if (File::exists($img_curent)) {
                File::delete($img_curent);
            }
        }
        else{
            echo "khong co file";
        }

        $product->save();


         if (!empty(Request::file('feditimage'))) {
            foreach (Request::file('feditimage') as $file) {
                $product_img=new product_image();
                if (isset($file)) {
                    $product_img->image=$file->getClientOriginalName();
                    $product_img->product_id=$id;
                    $file->move('resources/upload/hinhphu/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
            
        }

        return redirect()->route('admin.product.list')->With(['flas_level'=>'success','flas_messager'=>'sửa sản phẩm product thành công...!']);
    }
    public function getdelimg($id){
        if (Request::ajax()) {
            $idhinh=(int)Request::get('idhinh');
            $image_detalll=product_image::find($idhinh);
            if (!empty($image_detalll)) {
                $img= 'resources/upload/hinhphu/'.$image_detalll->image;
                if (File::exists($img)) {
                    File::delete($img);
                }
                $image_detalll->delete();
            }
            return "oke";
        }
    }
}
