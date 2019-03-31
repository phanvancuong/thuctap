@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>category</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=0; ?>
                            @foreach($data as $item)
                            <?php $stt=$stt+1; ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
                                <td>{!! $item["name"] !!}</td>
                                <td>{!! number_format($item["price"],0,",",".")!!} VNĐ</td>
                                <td><?php 
                                    echo \carbon\carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans()
                                ?></td>
                                <td><?php $cate=DB::table('cates')->where('id',$item["cate_id"])->first(); ?>
                                    @if (!empty($cate->name))
                                        {!! $cate->name !!}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.product.getdelete',$item['id']) !!}" onclick="return xacnhanxoa ('bạn có muốn xóa không...!')"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getedit',$item['id']) !!}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection