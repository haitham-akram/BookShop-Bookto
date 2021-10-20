@extends('layout.AdminLayout')
@section('nav')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">
            Authors
        </h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin_author')}}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Authors</li>
            </ul>
        </nav>
    </div>
@stop
@section('admin list')
    <li  class="active active-menu">
        <a href="#admin" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Admin</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
        <ul id="admin" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
            <li ><a href="{{url('admin_books')}}"> <i class="ri-file-pdf-line"></i>Books</a></li>
            <li ><a href="{{url('admin_category')}}"><i class="ri-function-line"></i>Books Category</a></li>
            <li class="active"><a href="{{url('admin_author')}}"><i class="ri-book-line"></i>Author</a></li>
            <li ><a href="{{url('admin_place')}}"> <i class="ri-record-circle-line"></i>Publishing Place</a></li>
        </ul>
    </li>
@stop
@section('Page Content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Author Lists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="" data-toggle="modal" data-target="#Add_modal" class="btn btn-primary">Add New Author</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width: 3%;">No</th>
                                    <th style="width: 25%;">Author Name</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($authors as $author)
                                <tr>
                                    <td>{{$author->id}}</td>
                                    <td>{{$author->name}}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                        <a class="bg-primary ml-3" href="" data-toggle="modal" data-target="#Edit_modal{{$author->id}}" title="Edit"><i class="ri-pencil-line"></i></a>
                                            @include('includes.admin_editAuthor')
                                        <form action="{{url('delete_author/'.$author->id)}}" method="post" id="form">
                                         {{ method_field('DELETE') }}
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                                <button class="btn btn-sm btn-sm ml-1 pb-4 mb-2 bg-transparent "style="width: 25px; height: 25px " data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" type="submit">
                                                    <a class="bg-primary pl-1" href=""><i  class="pt-2 ri-delete-bin-line "></i> </a></button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                        </div>
@stop
@section('Add_title')
    Add Author
    @stop

@section('Add_model')
    <form action="{{url('add_author')}}" method="post" id="Add_form">
        <input type="hidden" name="_token" value="{{csrf_token()}}" >
        <div class="modal-body">
            <div class="form-group">
                <label>Author Name:</label>
                <input type="text" id="author_name" name="author_name" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@stop

