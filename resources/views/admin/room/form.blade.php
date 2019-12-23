@extends("admin.layout.index")
@section('title')
    <title>Thêm phòng chiếu</title>
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
                    <a href="#">Danh sách phòng chiếu</a>
                </li>
                <li class="active">
                    Thêm phòng chiếu
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
                <h4 class="m-t-0 header-title"><b>Thêm phòng chiếu</b></h4>
                <p class="text-muted m-b-10 font-13">
                    {{--<b>Bắt buộc</b> <code>Tên phòng chiếu</code> <code>Tỉnh/TP</code> <code>Địa chỉ</code> <code>Số điện thoại</code>--}}
                </p>
                <?php
                if (isset($room))
                    $id = $room->id;
                else
                    $id = 0;
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route("cms.room.form.post",[$id])}}"
                                  method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$id}}">
                                <div class="form-group">
                                    <label class="control-label">Tên phòng chiếu</label>
                                    <input name="name" type="text" class="form-control"
                                           value="{{old('name',isset($room)?$room->name:"")}}"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Rạp chiếu</label>
                                    <select class="selectpicker" data-style="btn-default btn-custom" id="cinema_id"
                                            name="cinema_id" required>
                                        <option value="">--- Chọn rạp chiếu ---</option>
                                        @foreach($cinemas as $detail)
                                            <option value="{{$detail->id}}"
                                                    @if (old('cinema_id',isset($room)?$room->cinema_id:"") == $detail->id) selected @endif>{{$detail->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Loại phòng chiếu</label>
                                    <select class="selectpicker" data-style="btn-default btn-custom" id="view_id"
                                            name="view_id" required
                                    @if ($id != 0)
                                        disabled
                                    @endif
                                    >
                                        <option value="">--- Chọn loại phòng chiếu ---</option>
                                        @foreach($view_rooms as $detail)
                                            <option value="{{$detail->id}}"
                                                    @if (old('view_id',isset($room)?$room->view_id:"") == $detail->id) selected @endif>{{$detail->id}}</option>
                                        @endforeach
                                    </select>
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