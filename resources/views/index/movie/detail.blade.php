@extends('index.layout.index')
@section("jquery")
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
@endsection
@section("style")
    <style>
        .booking-date {
            padding-left: 15px;
            margin-top: 20px;
        }

        .booking-date > label > span {
            font-size: 35px;
        }

        .booking-date > label {
            font-weight: 400;
            /*width: 50%;*/
            height: 70px;
            border-radius: 4px;
            padding: 10px;
            color: #FFFFFF;
            line-height: 50px;
            background-color: #ff8d1b;
            margin: 0 5px;
            box-sizing: border-box;
            cursor: pointer;
        }

        .booking-date input[type=radio] {
            display: none;
            visibility: hidden;
        }

        .booking-date input[type=radio]:checked + label {
            background-color: #FFFFFF;
            color: #C1C1C1;
            /*border: none;*/
            border: 1px solid #C1C1C1;
        }

        /*booking projector*/
        .booking-projector {
            padding-left: 15px;
            margin-top: 20px;
        }

        .booking-projector > label > span {
            font-size: 35px;
        }

        .booking-projector > label {
            font-weight: 400;
            /*width: 50%;*/
            height: 40px;
            border-radius: 4px;
            padding: 5px 10px;
            color: #FFFFFF;
            line-height: 30px;
            background-color: #ff8d1b;
            margin: 0 5px;
            box-sizing: border-box;
            cursor: pointer;
            /*font-size: 15px;*/
        }

        .booking-projector input[type=radio] {
            display: none;
            visibility: hidden;
        }

        .booking-projector input[type=radio]:checked + label {
            background-color: #FFFFFF;
            color: #C1C1C1;
            /*border: none;*/
            border: 1px solid #C1C1C1;
        }

        /*plan*/
        /*#exTab3 .tab-content {*/
        /*color: black;*/
        /*!*background-color: #428bca;*!*/
        /*padding: 5px 0 5px 5px;*/
        /*}*/
        .booking-plan {
            margin: 15px 5px;
        }

        .booking-plan a {
            width: 100px;
            height: 40px;
            padding: 10px;
            margin-bottom: 5px;
            color: #333333;
            background-color: #C1C1C1;
            line-height: 20px;
            font-size: 16px;
            font-weight: bold;
        }

        .booking-plan li {
            list-style-type: none;
            float: left;
            text-align: center;
            margin: 0 15px;
        }

        .booking-plan li:first-child {
            margin-left: 0;
        }

        .booking-plan a:hover {
            background-color: #FF8D1B;
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="single-page-agile-main">
        <div class="container">
            <div class="agileits-single-top">
                <ol class="breadcrumb">
                    <li><a href="{{route('index.home.get')}}">Home</a></li>
                    <li class="active">{{$movie->name}}</li>
                </ol>
            </div>
            <input type="hidden" value="{{$movie->id}}" name="movie" id="movie">
            <div class="single-page-agile-info">
                <!-- /movie-browse-agile -->
                <div class="show-top-grids-w3lagile">
                    <div class="col-sm-12 single-left">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="pi-img-wrapper">
                                    <img class="img-rounded img-thumbnail img-responsive" style="width: 100%;" alt=""
                                         src="{{$movie->image}}">
                                    <span style="position: absolute; top: 10px; left: 10px;"></span>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <h1 class="" style="margin-bottom: 15px; font-weight: bold">{{$movie->name}}

                                </h1>

                                <p class="" style="margin-bottom: 15px; text-align: justify">
                                    {{$movie->content}}
                                </p>

                                <div class="">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                <span class=""
                                      style="font-weight: 700; text-transform: uppercase !important;">Đạo diễn: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">{{$movie->director}}</div>
                                </div>
                                <div class="">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                        <span class="" style="font-weight: 700; text-transform: uppercase !important;">Diễn viên: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">{{$movie->cast}}
                                    </div>
                                </div>
                                <div class="">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                <span class=""
                                      style="font-weight: 700; text-transform: uppercase !important;">Thể loại: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">{{$movie->genre}}</div>
                                </div>

                                <div class="">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                        <span class="" style="font-weight: 700; text-transform: uppercase !important;">Thời lượng: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">{{$movie->duration}} phút</div>
                                </div>
                                <div class="">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                <span class=""
                                      style="font-weight: 700; text-transform: uppercase !important;">Ngôn ngữ: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">{{$movie->language}}</div>
                                </div>
                                <div class="">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                        <span class="" style="font-weight: 700; text-transform: uppercase !important;">Ngày khởi chiếu: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">{{date_format(date_create($movie->release_date),"d/m/Y")}}</div>
                                </div>
                                <div class="">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6"
                                         style="padding-left: 0; padding-top: 20px">
                                        <a class="w3_play_icon trailer" href="#small-dialog"
                                           style="width: 200px; background: #ff8d1b; color: #fff; font-weight: bold; height: 50px; padding: 10px;">
                                            Trailer
                                        </a>
                                        <!--<span class="" style="font-weight: 700; text-transform: uppercase !important;">Ngày khởi chiếu: </span>-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 booking-date">
                            </div>
                            <div class="col-md-12 booking-projector">

                            </div>
                            <div class="col-md-12 ">
                                <div class="row booking-plan">

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <script src="asset/index/other/js/jquery.magnific-popup.js" type="text/javascript"></script>
    <!--//pop-up-box -->
    <div id="small-dialog" class="mfp-hide">
        {{--https://www.youtube.com/embed/goh-FbUbSA0?rel=0&showinfo=0&autoplay=1--}}
        <iframe src="{{$movie->link_trailer}}" frameborder="0" allow="autoplay; encrypted-media"
                allowfullscreen></iframe>
    </div>
@endsection
@section("script")
    <script>
        $(document).ready(function () {
            $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

        });
    </script>
    <script>
        $(document).ready(function () {
            $("#movie").change(function () {
                loadDate();
            });
            $("input[name=date]:radio").change(function () {
                alert("ahihi");
            });
            $("input[name=projector]").change(function () {
                loadPlan();
            });
            loadDate();
        });

        function randloading() {
            var rand;
            var myArray = ['giphy.gif', 'loading.gif', 'loading1.gif', 'loading2.gif', 'loading3.gif'];
            return rand = myArray[Math.floor(Math.random() * myArray.length)];
        }

        function loadProjector() {
            var movie = $("#movie").val();
            var date = $('input[name=date]:checked').val();
            console.log(date);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('index.ajax.loadprojector.post')}}",
                type: "POST",
                async: true,
                data: {
//                        "_token": token,
                    "_token": CSRF_TOKEN,
                    "movie": movie,
                    "date": date
                },
                beforeSend: function () {
                    $(".booking-projector").html("<img src='asset/index/images/" + randloading() + "' width='150' height='150'>");
                },
                success: function (data) {
                    $(".booking-projector").html(data);
//                    alert(value);
                    loadPlan();
                }
            });
            loadPlan();
//            setTimeout(loadPlan, 100);
        }

        function loadDate() {
            var movie = $("#movie").val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.post("{{route("index.ajax.loaddate.post")}}", {_token: CSRF_TOKEN, movie: movie}, function (data) {
                if (data.split("<-!->")[1] != "0") {
                    $(".booking-date").html(data);
                    loadProjector();
                } else {
                    $(".booking-date").html("<h3>Hiện không có suất chiếu cho phim này</h3>");
                }
//        setTimeout(loadProjector, 100);
            })
        }

        function loadPlan() {
            var movie = $("#movie").val();
            var date = $('input[name=date]:checked').val();
            var proj = $('input[name=projector]:checked').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('index.ajax.loadplan.post')}}",
                type: "POST",
                async: true,
                data: {
                    "_token": CSRF_TOKEN,
                    "movie": movie,
                    "date": date,
                    "projector": proj
                },
                beforeSend: function () {
                    $(".booking-plan").html("<img src='asset/index/images/" + randloading() + "' width='150' height='150'>");
                },
                success: function (data) {
                    $(".booking-plan").html(data);
                    console.log(data);
                }
            });
        }
    </script>
@endsection