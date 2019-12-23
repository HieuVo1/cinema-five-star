@extends('admin.layout.index')
@section('title')
    <title>Danh sách hóa đơn</title>
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

    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    <a href=""><i class="ti-home"></i></a>
                </li>
                <li class="active">
                    Danh sách hóa đơn
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
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Danh sách hóa đơn</b></h4>
                <table id="datatable-responsive"
                       class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID hóa đơn</th>
                        <th>Tổng tiền</th>
                        <th>Tổng tiền (USD)</th>
                        <th>Ngày mua</th>
                        <th>Khách hàng</th>
                        <th>Đã nhận vé</th>
                        <th>Chi tiết</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($invoices as $i => $detail)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{\App\Http\Controllers\AdminInvoiceController::convertIdInvoice($detail->id)}}</td>
                            <td>{{$detail->total}}</td>
                            <td>{{$detail->total_usd}}</td>
                            <td>{{date_format(date_create($detail->buy_date),"d-m-Y")}}</td>
                            <td>{{$detail->name}}</td>
                            <td>
                                <input name="status" type="checkbox" {{$detail->status==1?"checked disabled":""}} data-plugin="switchery" data-color="#81c868" onchange="checkStatus(this,{{$detail->id}})"/>
                            </td>
                            <td>
                                <a href="{{route('cms.invoice.detail.get',[$detail->id])}}"
                                   class="btn btn-icon waves-effect waves-light btn-success" title="Chi tiết"> Chi tiết</a>
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

    <script src="assets/plugins/switchery/js/switchery.min.js"></script>

    <script src="assets/plugins/notifyjs/js/notify.js"></script>
    <script src="assets/plugins/notifications/notify-metro.js"></script>

@endsection
@section('script')
    <script type="text/javascript">
        function checkStatus(obj, id) {
//            var checkedValue = null;
//            var inputElements = document.getElementsByClassName('messageCheckbox');
//            for(var i=0; inputElements[i]; ++i){
//                if(inputElements[i].checked){
//                    checkedValue = inputElements[i].value;
//                    break;
//                }
//            }
            if(obj.checked == true){
                var status = 1;
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{route('cms.invoice.ajaxstatus.post')}}",
                    type: "POST",
                    async: true,
                    data: {
//                        "_token": token,
                        "_token": CSRF_TOKEN,
                        "id": id,
                        "status": status
                    },
                    success: function (data) {
                        $.Notification.notify('success','top right', 'Thành công', 'Xác nhận đã nhận vé thành công.')
                    }
                });
            } else{
                $.Notification.notify('warning','top right', 'Cảnh báo', 'Không thể hoàn lại trạng thái chưa nhận vé.')
//                obj.attr('checked','checked');
//                console.log(obj);
            }
        }
    </script>
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