<?php
/**
 * Created by PhpStorm.
 * User: Loc Nguyen
 * Date: 9/26/2018 7:24 PM
 */
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phim
    </title>
</head>
<body>
    <input type="hidden" value="{{$movie->slug_name}}">
    <p>{{$movie->name}}</p>
    <p>{{$movie->duration}} minutes</p>
    <p>{{$movie->cast}}</p>
    <p>{{$movie->director}}</p>
    <p>{{$movie->rated}}</p>
    <p>{{$movie->genre}}</p>
    <p><a href="{{route('chonlich')}}">Booking</a></p>
</body>
</html>
