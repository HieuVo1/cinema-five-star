<?php
/**
 * Created by PhpStorm.
 * User: Loc Nguyen
 * Date: 9/26/2018 8:45 AM
 */
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chon lich</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <form method="post" action="{{route('chonlich.post')}}">
        {{@csrf_field()}}
        <select name="movie" id="movie">
            <option value="0">-- Chon phim --</option>
            @foreach($movies as $detail)
            <option value="{{$detail->id}}">{{$detail->name}}</option>
            @endforeach
        </select>
        <br/>
        <select name="date" id="date">
            {{--<option>-- chon ngay --</option>--}}

        </select>
        <br/>
        <select name="projector" id="projector">
            {{--<option>-- chon loai suat chieu --</option>--}}
            {{--@foreach($plan_proj as $detail)--}}
                {{--<option value="{{$detail->type_projector_id}}">{{$detail->type_projector->name}}</option>--}}
            {{--@endforeach--}}
        </select>
        <br/>
        {{--<input type="date" name="date">--}}
        <div id="result"></div>
        <br/>
        <button type="submit">Go</button>
    </form>
<script>
$(document).ready(function () {
    $("#movie").change(function () {
        loadDate();
    });
    $("#date").change(function () {
        loadProjector();
    });
    $("#projector").change(function () {
        loadPlan();
    });
});

function loadProjector() {
    var movie = $("#movie").val();
    var date = $("#date").val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.post("{{route("loadprojector")}}",{_token: CSRF_TOKEN, movie: movie, date:date}, function (data) {
        $("#projector").html(data);
        console.log(data);
        loadPlan();
    })
}

function loadDate() {
    var movie = $("#movie").val();
//    var proj = $("#projector").val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.post("{{route("loaddate")}}",{_token: CSRF_TOKEN, movie: movie}, function (data) {
        $("#date").html(data);
        console.log(data);
        loadProjector();
//        setTimeout(loadProjector, 100);
    })
}

function loadPlan() {
    var movie = $("#movie").val();
    var date = $("#date").val();
    var proj = $("#projector").val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.post("{{route("loadplan")}}",{_token: CSRF_TOKEN, movie: movie, date:date, projector: proj}, function (data) {
        $("#result").html(data);
        console.log(data);
    })
}
</script>
</body>
</html>
