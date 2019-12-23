@extends("index.layout.index")
@section("content")
    <div class="general-agileits-w3l">
        <div class="w3l-medile-movies-grids">

            <!-- /movie-browse-agile -->

            <div class="movie-browse-agile">
                <!--/browse-agile-w3ls -->
                <div class="browse-agile-w3ls general-w3ls">
                    <div class="tittle-head">
                        <div class="container">
                            <div class="agileits-single-top">
                                <ol class="breadcrumb">
                                    <li><a href="{{route("index.home.get")}}">Home</a></li>
                                    <li class="active">Phim đang chiếu</li>
                                </ol>
                            </div>
                        </div>
                        <h4 class="latest-text">Phim đang chiếu </h4>
                    </div>
                    <div class="container">
                        <div class="browse-inner">
                            @foreach($ns_movies as $detail)
                                <div class="col-md-3 w3l-movie-gride-agile">
                                    <a href="{{route("index.movie.detail.get",['id'=>$detail->id,'slug'=>$detail->slug_name])}}" class="hvr-shutter-out-horizontal"><img class="img-rounded img-thumbnail img-responsive"
                                                                                                  src="{{$detail->image}}"
                                                                                                  title="album-name" alt=" "/>
                                        <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1">
                                        <div class="w3l-movie-text">
                                            <h6><a href="{{route("index.movie.detail.get",['id'=>$detail->id,'slug'=>$detail->slug_name])}}">{{$detail->name}}</a></h6>
                                        </div>
                                        <div class="mid-2" style="text-align: left">
                                            <p><strong>Thể loại:</strong> {{$detail->genre}}</p>
                                            <p><strong>Thời lượng:</strong> {{$detail->duration}} phút</p>
                                            <p><strong>Khởi chiếu:</strong> {{date_format(date_create($detail->release_date),"d-m-Y")}}</p>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                    <div class="ribben">
                                        @if ($detail->rated == 0)
                                            <img src="https://betacineplex.vn/Assets/Common/icons/films/p.png">
                                        @elseif ($detail->rated == 13)
                                            <img src="https://betacineplex.vn/Assets/Common/icons/films/c-13.png">
                                        @elseif ($detail->rated == 16)
                                            <img src="https://betacineplex.vn/Assets/Common/icons/films/c-16.png">
                                        @elseif ($detail->rated == 18)
                                            <img src="https://betacineplex.vn/Assets/Common/icons/films/c-18.png">
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!--//browse-agile-w3ls -->
                {{--<div class="blog-pagenat-wthree">--}}
                    {{--<ul>--}}
                        {{--<li><a class="frist" href="#">Prev</a></li>--}}
                        {{--<li><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">4</a></li>--}}
                        {{--<li><a href="#">5</a></li>--}}
                        {{--<li><a class="last" href="#">Next</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
            <!-- //movie-browse-agile -->
            <!--body wrapper start-->
        </div>
        <!-- //w3l-medile-movies-grids -->
    </div>
@endsection