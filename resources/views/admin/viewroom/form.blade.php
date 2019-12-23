@extends("admin.layout.index")
@section('title')
    <title>Mẫu phòng chiếu</title>
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
                    <a href="#">Danh sách mẫu phòng chiếu</a>
                </li>
                <li class="active">
                    Mẫu phòng chiếu
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

    <div class="alert alert-success">
        <strong>Quy tắc thêm phòng chiếu</strong>
        {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
        <br/>
        Mỗi hàng phân cách bởi dấu ","(có thể enter xuống dòng sau dấu phẩy).<br/>
        Các ký tự quy định ghế tương ứng như sau:<br/>
        kí tự "_" là chỗ trống,<br/>
        @foreach($type_seats as $detail)
            kí tự "{{$detail->symbol}}" là ghế {{$detail->name}},<br/>
        @endforeach
    </div>
    <!--end duong dan nho-->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Mẫu phòng chiếu</b></h4>
                <p class="text-muted m-b-10 font-13">
                    {{--<b>Bắt buộc</b> <code>Tên phòng chiếu</code> <code>Tỉnh/TP</code> <code>Địa chỉ</code> <code>Số điện thoại</code>--}}
                </p>
                <?php
                if (isset($viewroom))
                    $id = $viewroom->id;
                else
                    $id = 0;
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-l-r-10">
                            <form class="form-horizontal" role="form" action="{{route("cms.viewroom.form.post",[$id])}}"
                                  method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$id}}">
                                <div class="form-group">
                                    <label class="control-label">Mẫu phòng chiếu</label>
                                    <?php
                                    $view = "";
                                    if (isset($viewroom)) {
                                        $view_arr = explode(",", $viewroom->view);
                                        foreach ($view_arr as $i => $detail) {
                                            if ($i < count($view_arr)-1)
                                                $view .= $detail . ",\r";
                                            else $view .= $detail;
                                        }
                                    }
                                    ?>
                                    <textarea name="view" required rows="10"
                                              cols="120">{{old("view",$view)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Số ghế tối đa</label>
                                    <input type="number" readonly
                                           value="{{old("view",isset($viewroom)?$viewroom->max_seat:"")}}"
                                           class="form-control">
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