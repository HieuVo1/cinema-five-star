@extends("admin.layout.index")
@section('title')
    <title>Thêm suất chiếu</title>
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
                    <a href="#">Danh sách suất chiếu</a>
                </li>
                <li class="active">
                    Thêm suất chiếu
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
                <h4 class="m-t-0 header-title"><b>Thêm suất chiếu</b></h4>
                <p class="text-muted m-b-10 font-13">
                    {{--<b>Bắt buộc</b> <code>Tên phòng chiếu</code> <code>Tỉnh/TP</code> <code>Địa chỉ</code> <code>Số điện thoại</code>--}}
                </p>
                <?php
                if (isset($showtime))
                    $id = $showtime->id;
                else
                    $id = 0;
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route("cms.showtime.form.post",[$id])}}"
                                  method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$id}}">
                                <div class="form-group">
                                    <label class="control-label">Phim</label>
                                    <select class="selectpicker" data-style="btn-default btn-custom" id="cinema_id"
                                            name="movie_id" required>
                                        <option value="">--- Chọn phim ---</option>
                                        @foreach($movies as $detail)
                                            <option value="{{$detail->id}}"
                                                    @if (old('movie_id',isset($showtime)?$showtime->movie_id:"") == $detail->id) selected @endif>{{$detail->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Loại suất chiếu</label>
                                    <select class="selectpicker" data-style="btn-default btn-custom" id="cinema_id"
                                            name="type_projector_id" required>
                                        <option value="">--- Chọn loại suất chiếu ---</option>
                                        @foreach($type_projectors as $detail)
                                            <option value="{{$detail->id}}"
                                                    @if (old('type_projector_id',isset($showtime)?$showtime->type_projector_id:"") == $detail->id) selected @endif>{{$detail->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Phòng chiếu</label>
                                    <select class="selectpicker" data-style="btn-default btn-custom" id="cinema_id"
                                            name="room_id" required>
                                        <option value="">--- Chọn phòng chiếu ---</option>
                                        @foreach($rooms as $detail)
                                            <option value="{{$detail->id}}"
                                                    @if (old('room_id',isset($showtime)?$showtime->room_id:"") == $detail->id) selected @endif>{{$detail->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Ngày chiếu</label>
                                    <input name="show_date" type="date" class="form-control" value="{{old('show_date',isset($showtime)?$showtime->show_date:"")}}"
                                           placeholder="Nhập ngày chiếu..." required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Thời gian chiếu</label>
                                    <input name="time_begin" type="text" class="form-control" value="{{old('time_begin',isset($showtime)?$showtime->time_begin:"")}}"
                                           placeholder="Nhập thời gian chiếu..." required>
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
    <script>
        function hello() {
            alert("cahsíađá");
        }
    </script>
@endsection