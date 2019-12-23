@extends("admin.layout.index")
@section('title')
    <title>Thêm phim</title>
@endsection
@section('style')
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet"/>
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    <a href=""><i class="ti-home"></i></a>
                </li>
                <li>
                    <a href="#">Danh sách phim</a>
                </li>
                <li class="active">
                    Thêm phim
                </li>
            </ol>
        </div>
    </div>

    @if (count($errors) > 0 || session('error'))
        <div class="alert alert-danger" role="alert">
            <strong>Cảnh báo!</strong><br>
            @foreach($errors->all() as $err)
                {{$err}}<br/>
            @endforeach
            {{session('error')}}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            <strong>Thành công!</strong>
            <button type="button" class="close" data-dismiss="alert">×</button>
            <br/>
            {!! session('success')!!}
        </div>
    @endif

    <!--end duong dan nho-->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Thêm phim</b></h4>
                <p class="text-muted m-b-10 font-13">
                    {{--<b>Bắt buộc</b> <code>Tên rạp</code> <code>Tỉnh/TP</code> <code>Địa chỉ</code> <code>Số điện thoại</code>--}}
                </p>
                <?php
                    if (isset($movie))
                        $id = $movie->id;
                    else
                        $id = 0;
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route("cms.movie.form.post",[$id])}}"
                                  method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" @if (isset($movie)) value="{{$movie->id}}" @else value="0" @endif>

                                <div class="form-group">
                                    <label class="control-label">Tên phim</label>
                                    <input name="name" type="text" class="form-control" value="{{old('name',isset($movie)?$movie->name:"")}}"
                                           placeholder="Nhập tên phim..." required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Image</label>
                                    <input name="image" type="text" class="form-control" value="{{old('name',isset($movie)?$movie->image:"")}}"
                                            required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Thời lượng (phút)</label>
                                    <input name="duration" type="number" class="form-control" value="{{old('address',isset($movie)?$movie->duration:"")}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Link trailer (YouTube)</label>
                                    <input name="link_trailer" type="text" class="form-control" value="{{old('phone',isset($movie)?$movie->link_trailer:"")}}"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Đạo diễn</label>
                                    <input name="director" type="text" class="form-control" value="{{old('phone',isset($movie)?$movie->director:"")}}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Diễn viên</label>
                                    <input name="cast" type="text" class="form-control" value="{{old('phone',isset($movie)?$movie->cast:"")}}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Thể loại</label>
                                    <input name="genre" type="text" class="form-control" value="{{old('phone',isset($movie)?$movie->genre:"")}}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Ngôn ngữ</label>
                                    <input name="language" type="text" class="form-control" value="{{old('phone',isset($movie)?$movie->language:"")}}"
                                            required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Ngày khởi chiếu</label>
                                    <br/>
                                    <input class="input-small datepicker hasDatepicker" id="release_date" type="date"
                                           name="release_date" value="{{old('phone',isset($movie)?$movie->release_date:"")}}" required>
                                </div>
                                <?php
                                    if (isset($movie) && $movie->rated != "")
                                        $rated = $movie->rated;
                                    else $rated = "";
                                ?>

                                <div class="form-group">
                                    <label class="control-label">Độ tuổi quy định</label>
                                    <select class="selectpicker" data-style="btn-default btn-custom" id="rated"
                                            name="rated">
                                        <option value="" {{$rated == ""?"selected":""}}>--- Chọn độ tuổi quy định ---</option>
                                        <option value="0" {{$rated == 0?"selected":""}}>P</option>
                                        <option value="13" {{$rated == 13?"selected":""}}>C13</option>
                                        <option value="16" {{$rated == 16?"selected":""}}>C16</option>
                                        <option value="18" {{$rated == 18?"selected":""}}>C18</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Nội dung tóm tắt</label>
                                    <textarea name="content_movie" id="content" cols="70" rows="10">{!!old('phone',isset($movie)?$movie->content:"")!!}</textarea>
                                </div>

                                <div class="form-group">
                                    <button class="ladda-button btn btn-default" data-style="expand-right">Lưu lại
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script-ori')
    <script src="assets/plugins/switchery/js/switchery.min.js"></script>
@endsection
@section('script')

@endsection