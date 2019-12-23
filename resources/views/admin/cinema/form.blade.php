@extends("admin.layout.index")
@section('title')
    <title>Thêm cinema</title>
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
                    <a href="#">Danh sách cinema</a>
                </li>
                <li class="active">
                    Thêm cinema
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
                <h4 class="m-t-0 header-title"><b>Thêm cinema</b></h4>
                <p class="text-muted m-b-10 font-13">
                    <b>Bắt buộc</b> <code>Tên rạp</code> <code>Tỉnh/TP</code> <code>Địa chỉ</code> <code>Số điện thoại</code>
                </p>
                <?php
                    if (isset($cinema))
                        $id = $cinema->id;
                    else
                        $id = 0;
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route('cms.cinema.form.post',[$id])}}"
                                  method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" @if (isset($cinema)) value="{{$cinema->id}}" @else value="0" @endif>

                                <div class="form-group">
                                    <label class="control-label">Tên rạp phim</label>
                                    <input name="name" type="text" class="form-control" value="{{old('name',isset($cinema)?$cinema->name:"")}}"
                                           placeholder="Nhập tên rạp phim..." required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Tỉnh/TP</label>
                                    <select class="selectpicker" data-style="btn-default btn-custom" id="province"
                                            name="province">
                                        <option value="" selected>--- Chọn tỉnh/TP ---</option>
                                        @foreach ($provinces as $detail)
                                        <option value="{{$detail->id}}" @if ($detail->id == isset($cinema)?$cinema->address:"") selected @endif>{{$detail->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Địa chỉ</label>
                                    <input name="address" type="text" class="form-control" value="{{old('address',isset($cinema)?$cinema->address:"")}}"
                                           placeholder="Nhập địa chỉ..." required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Số điện thoại</label>
                                    <input name="phone" type="text" class="form-control" value="{{old('phone',isset($cinema)?$cinema->phone:"")}}"
                                           placeholder="Nhập điện thoại..." required>
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