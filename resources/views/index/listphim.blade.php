<?php
/**
 * Created by PhpStorm.
 * User: Loc Nguyen
 * Date: 9/26/2018 7:16 PM
 */
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Phim</title>
</head>
<body>
    @foreach($movies as $detail)
        <p><a href="{{route("phim",['slug'=>$detail->slug_name])}}">{{$detail->name}}</a></p><br/>
    @endforeach
</body>
</html>
