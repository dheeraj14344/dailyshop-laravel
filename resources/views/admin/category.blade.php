@extends('admin/layout');
@section('page_title', 'Category')
@section('category_select', 'active')
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

<h1 class="text-info text-center">Category</h1>
<a href="{{url('admin/category/manage_category')}}">
	<button class="btn btn-success">Add Category</button>
</a>
                        
<div class="row m-t-30">
    <div class="col-md-12">
    <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                	<tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Category Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->category_name}}</td>
                        <td>{{$list->category_slug}}</td>
                        <td>@if($list->category_image != "")
                                <img src="{{asset('storage/media/category/'.$list->category_image)}}" width="100"> 
                            @endif
                        </td>
                        <td>
                            <a href="{{url('admin/category/manage_category/')}}/{{$list->id}}">
                                <button class="btn btn-outline-success">
                                    Edit
                                </button>
                            </a>
                            @if($list->status == 1)
                                <a href="{{url('admin/category/status/0')}}/{{$list->id}}">
                                    <button class="btn btn-outline-primary">
                                        Activate
                                    </button>
                                </a>

                                @elseif($list->status == 0)
                                <a href="{{url('admin/category/status/1')}}/{{$list->id}}">
                                    <button class="btn btn-outline-warning">
                                        Deactivate
                                    </button>
                                </a>
                            @endif
                            <a href="{{url('admin/category/delete')}}/{{$list->id}}">
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