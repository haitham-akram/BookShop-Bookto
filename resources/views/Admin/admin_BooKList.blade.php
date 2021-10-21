@extends('layout.AdminLayout')
@section('nav')
    <div class="navbar-breadcrumb">
        <h5 class="mb-0">
            Books
        </h5>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('index')}}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Books</li>
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
                            <h4 class="card-title">book Lists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="{{url('admin_add_book')}}" class="btn btn-primary">Add New book</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width: 3%;">No</th>
                                    <th style="width: 12%;">Book Image</th>
                                    <th style="width: 15%;">Book Name</th>
                                    <th style="width: 15%;">Book Catrgory</th>
                                    <th style="width: 15%;">Book Author</th>
                                    <th style="width: 18%;">Publishing Place</th>
                                    <th style="width: 12%;">Issue Number</th>
                                    <th style="width: 12%;">Release year</th>
                                    <th style="width: 15%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Books as $book)
                                <tr>
                                    <td>{{$book->id}}</td>
                                    <td><img class="img-fluid rounded" src="{{asset('images/books/'.$book->img_URL)}}" alt=""></td>
                                    <td>{{$book->name}}</td>
                                    @if(!empty($book->BookInfo))
                                    <td>
                                        @foreach($book->BookInfo as $BookInfo)
                                           {{$BookInfo->Category->name}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($book->BookInfo as $BookInfo)
                                            {{$BookInfo->Writer->name}}
                                        @endforeach
                                        </td>
                                    <td>
                                        @foreach($book->BookInfo as $BookInfo)
                                            {{$BookInfo->Place->shop_name}} At {{$BookInfo->Place->name}}
                                        @endforeach
                                        </td>
                                    @endif
                                    <td>{{$book->issus_number}}</td>
                                    <td>{{$book->release_year}}</td>
                                    <td>
                                        <form action="{{url('delete_book/'.$book->id)}}" method="post" id="form">
                                        <div class="flex align-items-center list-user-action">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                            <a  class=" bg-primary ml-3"data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"  href="{{url('admin_edit_book/'.$book->id)}}"><i class="ri-pencil-line"></i> </a>
                                            <button class="btn btn-sm btn-sm ml-1 bg-transparent "style="width: 25px; height: 25px " data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" type="submit">
                                                 <a class="bg-primary pl-1" href=""><i  class="pt-2 ri-delete-bin-line "></i> </a></button>
                                        </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
<!-- Wrapper END -->
