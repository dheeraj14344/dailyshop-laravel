@extends('admin/layout');
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')

@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <span class="badge badge-pill badge-success">Success</span>
        {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
</div>
@endif

<h1 class="text-info text-center">Product</h1>
<a href="{{url('admin/product/manage_product')}}">
	<button class="btn btn-success">Add Product</button>
</a>
                        
<div class="row m-t-30">
    <div class="col-md-12">
    <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->slug}}</td>
                        <td> 
                            @if($list->image != "")
                            <img src="{{asset('storage/media/'.$list->image)}}" width="100"> 
                            @endif
                        </td>
                        <td> 
                            <a href="{{url('admin/product/manage_product/')}}/{{$list->id}}">
                                <button class="btn btn-outline-success">
                                    Edit
                                </button>
                            </a>
                            @if($list->status == 1)
                                <a href="{{url('admin/product/status/0')}}/{{$list->id}}">
                                    <button class="btn btn-outline-primary">
                                        Activate
                                    </button>
                                </a>

                                @elseif($list->status == 0)
                                <a href="{{url('admin/product/status/1')}}/{{$list->id}}">
                                    <button class="btn btn-outline-warning">
                                        Deactivate
                                    </button>
                                </a>
                            @endif
                            <a href="{{url('admin/product/delete')}}/{{$list->id}}">
                                <button class="btn btn-outline-danger">
                                    Delete
                                </button>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>

@endsection