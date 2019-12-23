@extends('admin.layout.index')
@section('title')
    <title>Danh sách mẫu phòng chiếu</title>
@endsection
@section('style')
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    <a href=""><i class="ti-home"></i></a>
                </li>
                <li class="active">
                    Danh sách mẫu phòng chiếu
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
            {{session('success')}}
        </div>
    @endif
    <!--end duong dan nho-->

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{{route('cms.viewroom.form.get',['id'=>0])}}">
                    <button class="ladda-button btn btn-default waves-effect waves-light" data-style="expand-right">
                        <span class="btn-label"><i class="fa fa-plus"></i></span>Thêm mẫu phòng chiếu
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Danh sách mẫu phòng chiếu</b></h4>
                <table id="datatable-responsive"
                       class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Col</th>
                        <th>Row</th>
                        <th>Max seat</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($viewrooms as $detail)
                        <tr>
                            <td>{{$detail->id}}</td>
                            <td>{{$detail->col}}</td>
                            <td>{{$detail->row}}</td>
                            <td>{{$detail->max_seat}}</td>
                            <td>

                                <a href="{{route('cms.viewroom.form.get',[$detail->id])}}"
                                   class="btn btn-icon waves-effect waves-light btn-warning" title="Sửa"> <i class="fa fa-wrench"></i></a>
                                &nbsp;
                                &nbsp;
                                <a onclick="del(1)"
                                class="btn btn-icon waves-effect waves-light btn-danger" title="Xóa"> <i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('script-ori')

    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="assets/plugins/datatables/jszip.min.js"></script>
    <script src="assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>

@endsection
@section('script')
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function () {--}}
            {{--$('#datatable-responsive').DataTable(--}}
                {{--{--}}
                    {{--"columnDefs": [--}}
                        {{--{--}}
                            {{--"className": "text-center",--}}
                            {{--"targets": [0, 1, 2, 3, 4]--}}
                        {{--}--}}
                    {{--],--}}
{{--//                        "paging":   false,--}}
                    {{--"ordering": false,--}}
{{--//                        "info":     false,--}}
                    {{--"bFilter": false--}}
                {{--}--}}
            {{--);--}}
        {{--});--}}
    {{--</script>--}}
@endsection