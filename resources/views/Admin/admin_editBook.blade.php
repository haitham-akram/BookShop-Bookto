@extends('layout.AdminLayout')
@section('nav')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">
            Edit Book
        </h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('index')}}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Book</li>
            </ul>
        </nav>
    </div>
@stop
@section('admin list')
    <li  class="active active-menu">
        <a href="#admin" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Admin</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
        <ul id="admin" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
            <li class="active"><a href="{{url('admin_books')}}"> <i class="ri-file-pdf-line"></i>Books</a></li>
            <li ><a href="{{url('admin_category')}}"><i class="ri-function-line"></i>Books Category</a></li>
            <li ><a href="{{url('admin_author')}}"><i class="ri-book-line"></i>Author</a></li>
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
                                <h4 class="card-title">Edit Books</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form action="{{url('admin_update_book/'.$book->id)}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label>Book Name:</label>
                                    <input type="text"  id="Book_name" name="Book_name" class="form-control" value="{{$book->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Book Category:</label>
                                    <select class="form-control" id="Book_category" name="Book_category" >
                                        <option selected="" disabled="">Book Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->name}}"
                                                    @if ($category->id == $info->category_id)selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Book Author:</label>
                                    <select class="form-control" id="Book_author" name="Book_author">
                                        <option selected="" disabled="">Book Author</option>
                                        @foreach($authors as $author)
                                            <option value="{{$author->name}}"
                                                    @if ($author->id == $info->writer_id)selected @endif>{{$author->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Publishing Place:</label>
                                    <select class="form-control" id="Publishing_place" name="Publishing_place">
                                        <option selected="" disabled="">Publishing Place</option>
                                        @foreach($places as $place)
                                            <option value="{{$place->shop_name}}"
                                                    @if ($place->id == $info->place_id)selected @endif> {{$place->shop_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Book Image:</label>
                                    <input type="text" class="form-control"id="img" name="img" value="{{$book->img_URL}}">
                                </div>
                                <div class="form-group">
                                    <label>Issue Number:</label>
                                    <input type="text"  id="Issue_Number" name="Issue_Number" class="form-control" value="{{$book->issus_number}}">
                                </div>
                                <div class="form-group">
                                    <label>Release year:</label>
                                    <input type="text" id="Release_year" name="Release_year" class="form-control" value="{{$book->release_year}}">
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Wrapper END -->
@stop
