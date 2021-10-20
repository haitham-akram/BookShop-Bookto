@extends('layout.UserLayout')
@section('Page Content')
    <div class="iq-card">
        <div class="iq-card-body">
            <div class="row">
                @foreach($books_category->BookInfo as $info)
                    @if(!empty($info->book))
                        <div class="col-lg-4 col-md-3 col-lg-3">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height search-bookcontent">
                                <div class="iq-card-body p-0">
                                    <div class="d-flex align-items-center">

                                        <div class="col-6 p-0 position-relative image-overlap-shadow">
                                            <a href=""><img class="img-fluid rounded w-100" src=" {{asset('images/books/'.$info->book->img_URL)}}" alt=""></a>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <h6 class="mb-3">{{$info->book->name}}</h6>
                                                <p class="font-size-16 line-height mb-3">
                                                    {{$info->Writer->name}}
                                                </p>
                                                <p class="font-size-16 line-height mb-3">
                                                    {{$books_category->name}}
                                                </p>
                                                <p class="font-size-16 line-height mb-3">
                                                    {{$info->Place->shop_name}} At {{$info->Place->name}}
                                                <p class="font-size-16 line-height mb-3">{{$info->book->issus_number}} </p>
                                                <p class="font-size-16 line-height mb-3">{{$info->book->release_year}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@stop
