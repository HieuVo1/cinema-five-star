@extends('index.layout.index')
@section('content')
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
            margin: 15px 5px ;
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
    <div class="agileits-single-top">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Single</li>
        </ol>
    </div>
    <input type="hidden" value="1" name="movie" id="movie">
    <div class="single-page-agile-info">
        <!-- /movie-browse-agile -->
        <div class="show-top-grids-w3lagile">
            <div class="col-sm-12 single-left">
                <!--<div class="song">-->
                <!--<div class="song-info">-->
                <!--<h3>THE LEGEND OF TARZAN - Official Trailer 2</h3>-->
                <!--</div>-->
                <!--&lt;!&ndash;<div class="video-grid-single-page-agileits">&ndash;&gt;-->
                <!--&lt;!&ndash;<div data-video="dLmKio67pVQ" id="video"><img src="images/5.jpg" alt=""&ndash;&gt;-->
                <!--&lt;!&ndash;class="img-responsive"/></div>&ndash;&gt;-->
                <!--&lt;!&ndash;</div>&ndash;&gt;-->
                <!--</div>-->
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="pi-img-wrapper">
                            <img class="img-rounded img-thumbnail img-responsive" style="width: 100%;" alt=""
                                 src="https://files.betacorp.vn/files/media/images/2018/10/04/400x633-103744-041018-96.jpg">
                            <span style="position: absolute; top: 10px; left: 10px;">
                        <!--<img src="./Chi tiết phim_files/c-16.png" class="img-responsive">-->
                                </span>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <h1 class="" style="margin-bottom: 15px; font-weight: bold">Venom (2D Phụ đề)

                        </h1>

                        <p class="" style="margin-bottom: 15px; text-align: justify">
                            Là một phóng viên lành nghề, Eddie Brook bắt đầu bí mật điều tra những hành vi tội phạm
                            của Drake. Anh dần tìm cách cận và dần khám phá ra một bí mật khủng khiếp. Song, anh
                            chàng đã vô tình nhiễm phải Symbiote vào cơ thể. Từ đây, Eddie bắt đầu sở hữu những siêu
                            năng lực và nhân cách tàn bạo của Venom. Eddie phải trải qua sự biến đổi kinh hoàng cả
                            về thể chất lẫn tinh thần và cùng lúc đó phải chiến đấu với sự truy đuổi gắt gao của
                            Life Foundation.
                        </p>

                        <div class="">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                <span class="" style="font-weight: 700; text-transform: uppercase !important;">Đạo diễn: </span>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">Ruben Fleischer</div>
                        </div>
                        <div class="">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                <span class="" style="font-weight: 700; text-transform: uppercase !important;">Diễn viên: </span>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">Tom Hardy, Michelle Williams, Riz
                                Ahmed ...
                            </div>
                        </div>
                        <div class="">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                <span class="" style="font-weight: 700; text-transform: uppercase !important;">Thể loại: </span>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">Hành động.</div>
                        </div>

                        <div class="">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                <span class="" style="font-weight: 700; text-transform: uppercase !important;">Thời lượng: </span>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">115 phút</div>
                        </div>
                        <div class="">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                <span class="" style="font-weight: 700; text-transform: uppercase !important;">Ngôn ngữ: </span>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">Tiếng anh với phụ đề tiếng Việt</div>
                        </div>
                        <div class="">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0">
                                <span class="" style="font-weight: 700; text-transform: uppercase !important;">Ngày khởi chiếu: </span>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">12/10/2018</div>
                        </div>
                        <div class="">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-left: 0; padding-top: 20px">
                                <a class="w3_play_icon trailer" href="#small-dialog" style="width: 200px; background: #ff8d1b; color: #fff; font-weight: bold; height: 50px; padding: 10px;">
                                    Trailer
                                </a>
                                <!--<span class="" style="font-weight: 700; text-transform: uppercase !important;">Ngày khởi chiếu: </span>-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 booking-date">
                        {{--<input type="radio" name="date" id="date1" value="2018-10-05" checked>--}}
                        {{--<label for="date1" class="choose-date"><span>04</span>/10 - Thu</label>--}}
                        {{--<input type="radio" name="date" id="date2" value="2018-10-05">--}}
                        {{--<label for="date2" class="choose-date"><span>05</span>/10 - Thu</label>--}}
                        {{--<input type="radio" name="date" id="date3" value="2018-10-05">--}}
                        {{--<label for="date3" class="choose-date"><span>06</span>/10 - Thu</label>--}}
                        {{--<input type="radio" name="date" id="date4" value="2018-10-05">--}}
                        {{--<label for="date4" class="choose-date"><span>07</span>/10 - Thu</label>--}}
                    </div>
                    <div class="col-md-12 booking-projector">
                        {{--<input type="radio" name="projector" id="projector1" value="2018-10-05" checked>--}}
                        {{--<label for="projector1" class="">2D phu de</label>--}}
                        {{--<input type="radio" name="projector" id="projector2" value="2018-10-05">--}}
                        {{--<label for="projector2" class="">3D phu de</label>--}}
                        {{--<input type="radio" name="projector" id="projector3" value="2018-10-05">--}}
                        {{--<label for="projector3" class="">2D long tieng</label>--}}
                        {{--<input type="radio" name="projector" id="projector4" value="2018-10-05">--}}
                        {{--<label for="projector4" class="">4D</label>--}}
                    </div>
                    <div class="col-md-12 ">
                        <div class="row booking-plan">
                            {{--<div class="col-md-12" style="margin-bottom: 20px">--}}
                                {{--<p style="color: #333333; font-size: 20px; font-weight: 400">CGV Bien Hoa</p>--}}
                                {{--<ul>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a>--}}
                                        {{--<br/>--}}
                                        {{--<span style="font-size: 13px">145 ghe trong</span>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a>--}}
                                        {{--<br/>--}}
                                        {{--<span>145 ghe trong</span>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a><br/>--}}
                                        {{--<span>145 ghe trong</span>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a><br/>--}}
                                        {{--<span>145 ghe trong</span>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a><br/>--}}
                                        {{--<span>145 ghe trong</span>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a><br/>--}}
                                        {{--<span>145 ghe trong</span>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-12">--}}
                                {{--<p>CGV Dong Nai</p>--}}
                                {{--<ul>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a>--}}
                                        {{--<br/>--}}
                                        {{--<span style="font-size: 13px">145 ghe trong</span>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a>--}}
                                        {{--<br/>--}}
                                        {{--<span>145 ghe trong</span>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a><br/>--}}
                                        {{--<span>145 ghe trong</span>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a><br/>--}}
                                        {{--<span>145 ghe trong</span>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a><br/>--}}
                                        {{--<span>145 ghe trong</span>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn">16:00</a><br/>--}}
                                        {{--<span>145 ghe trong</span>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="all-comments">
                    <div class="all-comments-info">
                        <a href="#">Comments</a>
                        <div class="agile-info-wthree-box">
                            <form>
                                <input type="text" placeholder="Name" required="">
                                <input type="text" placeholder="Email" required="">
                                <input type="text" placeholder="Phone" required="">
                                <textarea placeholder="Message" required=""></textarea>
                                <input type="submit" value="SEND">
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                    <div class="media-grids">
                        <div class="media">
                            <h5>TOM BROWN</h5>
                            <div class="media-left">
                                <a href="#">
                                    <img src="images/user.jpg" title="One movies" alt=" "/>
                                </a>
                            </div>
                            <div class="media-body">
                                <p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium
                                    hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>
                                <span>View all posts by :<a href="#"> Admin </a></span>
                            </div>
                        </div>
                        <div class="media">
                            <h5>MARK JOHNSON</h5>
                            <div class="media-left">
                                <a href="#">
                                    <img src="images/user.jpg" title="One movies" alt=" "/>
                                </a>
                            </div>
                            <div class="media-body">
                                <p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium
                                    hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>
                                <span>View all posts by :<a href="#"> Admin </a></span>
                            </div>
                        </div>
                        <div class="media">
                            <h5>STEVEN SMITH</h5>
                            <div class="media-left">
                                <a href="#">
                                    <img src="images/user.jpg" title="One movies" alt=" "/>
                                </a>
                            </div>
                            <div class="media-body">
                                <p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium
                                    hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>
                                <span>View all posts by :<a href="#"> Admin </a></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        {{--<select name="projector" id="projector">--}}
            {{--<option>-- chon loai suat chieu --</option>--}}
            {{--@foreach($plan_proj as $detail)--}}
            {{--<option value="{{$detail->type_projector_id}}">{{$detail->type_projector->name}}</option>--}}
            {{--@endforeach--}}
        {{--</select>--}}
        {{--<br/>--}}
        {{--<input type="date" name="date">--}}
        {{--<div id="result"></div>--}}
    </div>
    <script src="asset/index/other/js/jquery.magnific-popup.js" type="text/javascript"></script>
    <!--//pop-up-box -->
    <div id="small-dialog" class="mfp-hide">
        <iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>
    </div>
    <div id="small-dialog1" class="mfp-hide">
        <iframe src="https://player.vimeo.com/video/148284736"></iframe>
    </div>
    <div id="small-dialog2" class="mfp-hide">
        <iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
    </div>
    <script>
        $(document).ready(function() {
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
            $("input:radio[name=date]").change(function () {
//                alert($(this).value);
//                loadProjector();
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
                url: "{{route('loadprojector')}}",
                type: "POST",
                async: true,
                data: {
//                        "_token": token,
                    "_token": CSRF_TOKEN,
                    "movie": movie,
                    "date":date
                },
                beforeSend: function() {
                    $(".booking-projector").html("<img src='asset/index/images/"+randloading()+"' width='150' height='150'>");
                },
                success: function (data) {
                    $(".booking-projector").html(data);
//                    alert(value);
                    loadPlan();
                }
            });
            {{--$.post("{{route("loadprojector")}}",{_token: CSRF_TOKEN, movie: movie, date:date}, function (data) {--}}
                {{--$(".booking-projector").html(data);--}}
                {{--console.log(data);--}}
//                loadPlan();
                setTimeout(loadPlan, 100);
            {{--})--}}
        }

        function loadDate() {
            var movie = $("#movie").val();
//    var proj = $("#projector").val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.post("{{route("loaddate")}}",{_token: CSRF_TOKEN, movie: movie}, function (data) {
                $(".booking-date").html(data);
//                console.log(data);
                loadProjector();
//        setTimeout(loadProjector, 100);
            })
        }

        function loadPlan() {
            var movie = $("#movie").val();
            var date = $('input[name=date]:checked').val();
            var proj = $('input[name=projector]:checked').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('loadplan')}}",
                type: "POST",
                async: true,
                data: {
                    "_token": CSRF_TOKEN,
                    "movie": movie,
                    "date":date,
                    "projector": proj
                },
                beforeSend: function() {
                    $(".booking-plan").html("<img src='asset/index/images/"+randloading()+"' width='150' height='150'>");
                },
                success: function (data) {
                    $(".booking-plan").html(data);
//                    loadPlan();
                }
            });
            {{--$.post("{{route("loadplan")}}",{_token: CSRF_TOKEN, movie: movie, date:date, projector: proj}, function (data) {--}}
                {{--$(".booking-plan").html(data);--}}
                {{--console.log(data);--}}
            {{--})--}}
        }

        function abc() {
            console.log($('input[name=date]:checked').val());
        }
    </script>
@endsection