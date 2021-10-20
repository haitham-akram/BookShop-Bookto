<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Booksto Shop</title>
    @include('includes.AppStyle')
</head>
<body>
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper">
    <!-- Sidebar  -->
    <div class="iq-sidebar">
        <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="{{url('/')}}" class="header-logo">
                <img src="{{asset('images/logo.png')}}" class="img-fluid rounded-normal" alt="">
                <div class="logo-title">
                    <span class="text-primary text-uppercase">Booksto</span>
                </div>
            </a>
            <div class="iq-menu-bt-sidebar">
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li class="active active-menu">
                        <a href="#dashboard" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Shop</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="dashboard" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                            <li class="active" ><a href="{{url('/')}}"><i class="las la-house-damage"></i>Home Page</a></li>
                        </ul>
                    </li>
                    @guest
                        @else
                        <li  class="">
                            <a href="#admin" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Admin</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="admin" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class=""><a href="{{url('admin_books')}}"> <i class="ri-file-pdf-line"></i>Books</a></li>
                                <li ><a href="{{url('admin_category')}}"><i class="ri-function-line"></i>Books Category</a></li>
                                <li ><a href="{{url('admin_author')}}"><i class="ri-book-line"></i>Author</a></li>
                                <li ><a href="{{url('admin_place')}}"> <i class="ri-record-circle-line"></i>Publishing Place</a></li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </nav>
            <div id="sidebar-bottom" class="p-3 position-relative">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div class="sidebarbottom-content">
                            <div class="image"><img src="{{asset('images/side-bkg.png')}}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TOP Nav Bar -->
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="iq-menu-bt d-flex align-items-center">
                    <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                    </div>
                    <div class="iq-navbar-logo d-flex justify-content-between">
                        <a href="{{url('/')}}" class="header-logo">
                            <img src="{{asset('images/logo.png')}}" class="img-fluid rounded-normal" alt="">
                            <div class="logo-title">
                                <span class="text-primary text-uppercase">Booksto</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="navbar-breadcrumb">
                    <h5 class="mb-0">
                        Shop
                    </h5>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Home Page</li>
                        </ul>
                    </nav>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item nav-icon search-content">
                            <a  class="search-toggle iq-waves-effect text-gray rounded">
                                <i class="ri-search-line"></i>
                            </a>
                        </li>
                        @guest
                            <li class="line-height pt-3 pr-3">
                            <li class="nav-item">
                                <a  href="{{ route('login') }}"><button type="submit" class="btn btn-primary">{{ __('Login') }}</button></a>
                            </li>
                        </li>
                            @else
                                <li class="line-height pt-3 ">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <h6 class="mb-1 line-height">{{ Auth::user()->name }}</h6> <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- TOP Nav Bar END -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="iq-card-transparent mb-0">
                        <div class="d-block text-center">
                            <h2 class="mb-3">Home Page</h2>
                            <div class="w-100 iq-search-filter">
                                <form action="{{url('show')}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" id="">
                                    <ul class="list-inline p-0 m-0 row justify-content-center search-menu-options">
                                        <li class="search-menu-opt">
                                            <div class="iq-dropdown">
                                                <div class="form-group mb-0">
                                                    <select class="form-control form-search-control bg-white border-0" id="place" name="place">
                                                        <option value="" selected="" disabled="">Publishing place</option>
                                                        @foreach($places as $place)
                                                            <option value="{{$place->shop_name}}">{{$place->shop_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="search-menu-opt">
                                            <div class="iq-dropdown">
                                                <div class="form-group mb-0">
                                                    <select class="form-control form-search-control bg-white border-0" id="category" name="category">
                                                        <option value="" selected="" disabled="">Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->name}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="search-menu-opt">
                                            <div class="iq-dropdown">
                                                <div class="form-group mb-0">
                                                    <select class="form-control form-search-control bg-white border-0" id="author" name="author">
                                                        <option value="" selected="" disabled="">Author</option>
                                                        @foreach($authors as $author)
                                                            <option value="{{$author->name}}">{{$author->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <button type="submit" class="btn btn-primary search-data ml-2">Show</button>
                                  </form>
                                <li class="search-menu-opt">
                                    <form action="{{url('search')}}" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="iq-search-bar search-book d-flex align-items-center">
                                            <div class="searchbox ">
                                                <input type="text" class="text search-input" name="search" placeholder="search here...">
                                                <a class="search-link"  ><i class="ri-search-line"></i></a>
                                            </div>
                                            <button type="submit" class="btn btn-primary search-data ml-2">Search</button>
                                    </form>
                            </div>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
    @yield('Page Content')
                <div class="row">
                    <div class="col-12">
                        @foreach($errors->all() as $message)
                            <div class="alert alert-danger"> {{$message}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">Privacy Policy</li>
                    <li class="list-inline-item">Terms of Use</li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                Copyright 2020 Booksto All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
<!-- Footer END -->
@include('includes.AppJS')
</body>
</html>
