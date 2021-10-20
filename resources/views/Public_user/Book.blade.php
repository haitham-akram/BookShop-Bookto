@extends('layout.UserLayout')
@section('Page Content')
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <div class="row">
                                @foreach($Books as $book)
                                <div class="col-lg-4 col-md-3 col-lg-3">
                                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height search-bookcontent">
                                        <div class="iq-card-body p-0">
                                            <div class="d-flex align-items-center">
                                                <div class="col-6 p-0 position-relative image-overlap-shadow">
                                                    <a href=""><img class="img-fluid rounded w-100" src=" {{asset('images/books/'.$book->img_URL)}}" alt=""></a>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-2">
                                                        <h6 class="mb-3">{{$book->name}}</h6>
                                                        @if(!empty($book->BookInfo))

                                                        <p class="font-size-16 line-height mb-3">
                                                            @foreach($book->BookInfo as $BookInfo)
                                                                {{$BookInfo->Writer->name}}
                                                            @endforeach</p>
                                                        <p class="font-size-16 line-height mb-3">
                                                            @foreach($book->BookInfo as $BookInfo)
                                                                {{$BookInfo->Category->name}}
                                                            @endforeach </p>
                                                        <p class="font-size-16 line-height mb-3">
                                                            @foreach($book->BookInfo as $BookInfo)
                                                                {{$BookInfo->Place->shop_name}}
                                                            @endforeach </p>
                                                            <p class="font-size-16 line-height mb-3">
                                                                @foreach($book->BookInfo as $BookInfo)
                                                                    At {{$BookInfo->Place->name}}
                                                                @endforeach </p>
                                                        @endif
                                                        <p class="font-size-16 line-height mb-3">{{$book->issus_number}} </p>
                                                        <p class="font-size-16 line-height mb-3">{{$book->release_year}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
    @stop
