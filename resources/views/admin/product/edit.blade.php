@extends('admin.master')
@section('content')
<style>
    .image_curent {
        width: 150px;
    }
    .img_hinhphu{
        width: 200px;
    }
    .icon_del{
        position: relative;
        top: -120px;
        left: -20px;
    }
    #insert{
        margin-top: 20px;
    }
</style>
<form action="" method="POST" name="frmeditproduct" enctype="multipart/form-data">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                        @include('admin.lock.error')
                        <form action="{!! route('admin.cate.getAdd') !!}" method="POST">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="sltparent">
                                    <option value="">Please Choose Category</option>
                                    <?php cate_parent($cate,0,"--",$product["cate_id"])  ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName',isset($product)?$product['name']:null) !!}" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice',isset($product)?$product['price']:null) !!}" />
                            </div>
                            <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro',isset($product)?$product['intro']:null) !!}</textarea>
                                <script type="text/javascript">ckeditor("txtIntro")</script>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent',isset($product)?$product['content']:null) !!}</textarea>
                                <script type="text/javascript">ckeditor("txtContent")</script>

                            </div>
                            <div class="form-group">
                                <label>Images curent</label>
                                <img src="{!! asset('resources/upload/'.$product['image']) !!}" alt="" class="image_curent">
                                <input type="hidden" name="img_curent" value="{!! $product['image'] !!}">
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages">
                            </div>
                            <div class="form-group">
                                <label>Product Keywords</label>
                                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords',isset($product)?$product['keywods']:null) !!}" />
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" name="txtdescription" >{!! old('txtdescription',isset($product)?$product['description']:null) !!} </textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Product Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                    </div>
                    <div class="col-md-1">
                        
                    </div>
                    <div class="col-md-4">
                    @foreach($productimg as $key => $item)
                    <div class="form-group" id="{!! $key !!}">
                        <img src="{!! asset('resources/upload/hinhphu/'.$item['image']) !!}" alt="" class="img_hinhphu" idhinh="{!!$item['id']!!}" id="{!! $key !!}">
                        <a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon_del" ><i class="fa fa-times"></i></a>     
                    </div>
                    @endforeach
                    <button type="button" class="btn btn-primary" id="addimagedetail">Add images</button>
                    <div id="insert">
                        
                    </div>
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
</form>
    @endsection