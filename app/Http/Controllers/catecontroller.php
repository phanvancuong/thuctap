<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\caterequest;
use App\cate;
class catecontroller extends Controller
{
	public function getlist(){
		
		$data=cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
		return view('admin.cate.list',compact('data'));
	}
    public function getAdd(){
    	$parent=cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.cate.add',compact('parent'));
    }
    public function postAdd(caterequest $request){
    	$cate = new cate;
    	$cate->name = $request->txtCateName;
    	$cate->alias =$request->txtCateName;
    	$cate->order = $request->txtOrder;
    	$cate->parent_id =$request->sltparent;
    	$cate->keywords =$request->txtkeywords;
    	$cate->description =$request->txtdescription;
    	$cate->save();
    	return redirect()->route('admin.cate.list')->With(['flas_level'=>'success','flas_messager'=>'thêm sản phẩm thành công...!']);
    }
    public function getdelete($id){
    	$parent=cate::Where('parent_id',$id)->count();
    	if ($parent==0) {
    	$cate = cate::find($id);
    	$cate->delete($id);
    	return redirect()->route('admin.cate.list')->With(['flas_level'=>'success','flas_messager'=>'xoa thành công...!']);
    	}
    	else{
    		echo "<script type='text/javascript'>
				alert('xin loi...! khong xoa duoc...!');
				window.location = '";
				echo route('admin.cate.list');
				echo"'
    		</script>";
    	}

    }
    public function getedit($id){
    	$data=cate::findOrFail($id)->toArray();
    	$parent=cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.cate.edit',compact('parent','data','parent_id'));
    }
    public function postedit(Request $request,$id){
    	$this->validate($request,
    		["txtCateName"=>"required"],
    		["txtCateName.required"=>"ban chua nhap ten...!"]
    	);
    	$cate=cate::find($id);
    	$cate->name = $request->txtCateName;
    	$cate->alias = $request->txtCateName;
    	$cate->order = $request->txtOrder;
    	$cate->parent_id =$request->sltparent;
    	$cate->keywords =$request->txtkeywords;
    	$cate->description =$request->txtdescription;
    	$cate->save();
    	return redirect()->route('admin.cate.list')->With(['flas_level'=>'success','flas_messager'=>'sửa sản phẩm thành công...!']);
    }

}
