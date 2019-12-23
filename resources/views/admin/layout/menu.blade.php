<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="has_sub">
                    <a href="/cms/trangchu" class="waves-effect"><i class="ti-home active"></i><span> Trang chủ </span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-package"></i>
                        <span> Quản lý rạp chiếu </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                       <li  ><a href="{{route('cms.cinema.list.get')}}"> Danh sách rạp chiếu </a></li>
                       <li><a href="/cms/cinema/form/0"> Thêm rạp chiếu </a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-layers-alt"></i>
                        <span> Quản lý phòng chiếu</span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                       <li><a href="{{route('cms.room.list.get')}}"> Danh sách phòng chiếu </a></li>
                       <li><a href="/cms/room/form/0"> Thêm phiếu phòng chiếu </a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-view-list"></i>
                        <span> Quản lí phim </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                       <li><a href="{{route('cms.movie.list.get')}}"> Danh sách phim </a></li>
                       <li><a href="/cms/form/0"> Thêm phim </a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-layers-alt"></i>
                        <span> Quản lí suất chiếu </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                       <li><a href="{{route('cms.showtime.list.get')}}"> Danh sách xuất chiếu </a></li>
                       <li><a href="/cms/showtime/form/0"> Thêm suất chiếu </a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu"></i>
                        <span> Quản lí sản phẩm </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
{{--                        <li><a href="{{route('ds-loaibenh.get')}}"> Quản lý loại bệnh </a></li>--}}
{{--                        <li><a href="{{route('ds-thuoc.get')}}"> Quản lý thuốc </a></li>--}}
{{--                        <li><a href="{{route('ds-donvi.get')}}"> Quản lý đơn vị </a></li>--}}
{{--                        <li><a href="{{route('ds-cachdung.get')}}"> Quản lý cách dùng </a></li>--}}
                        {{--<li><a href="{{route('ds-pnt.get')}}"> Nhập thuốc </a></li>--}}
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="{{route('cms.invoice.list.get')}}" class="waves-effect"><i class="ti-comments"></i><span> Quản lí hóa đơn </span></a>
                 </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i>
                        <span> Quản lí tài khoản </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
{{--                        <li><a href="{{route('ds-loaibenh.get')}}"> Quản lý loại bệnh </a></li>--}}
{{--                        <li><a href="{{route('ds-thuoc.get')}}"> Quản lý thuốc </a></li>--}}
{{--                        <li><a href="{{route('ds-donvi.get')}}"> Quản lý đơn vị </a></li>--}}
{{--                        <li><a href="{{route('ds-cachdung.get')}}"> Quản lý cách dùng </a></li>--}}
                        {{--<li><a href="{{route('ds-pnt.get')}}"> Nhập thuốc </a></li>--}}
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-id-badge"></i>
                        <span> Quản lí banner </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
{{--                        <li><a href="{{route('ds-loaibenh.get')}}"> Quản lý loại bệnh </a></li>--}}
{{--                        <li><a href="{{route('ds-thuoc.get')}}"> Quản lý thuốc </a></li>--}}
{{--                        <li><a href="{{route('ds-donvi.get')}}"> Quản lý đơn vị </a></li>--}}
{{--                        <li><a href="{{route('ds-cachdung.get')}}"> Quản lý cách dùng </a></li>--}}
                        {{--<li><a href="{{route('ds-pnt.get')}}"> Nhập thuốc </a></li>--}}
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar"></i>
                        <span> Quản lí sơ đồ ghế </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                       <li><a href="{{route('cms.viewroom.list.get')}}"> Danh sách sơ đồ ghế </a></li>
                       <li><a href="/cms/viewroom/form/0"> Thêm sơ đồ ghế </a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-wallet"></i>
                        <span> Quản lí lọai ghế </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
{{--                        <li><a href="{{route('ds-loaibenh.get')}}"> Quản lý loại bệnh </a></li>--}}
{{--                        <li><a href="{{route('ds-thuoc.get')}}"> Quản lý thuốc </a></li>--}}
{{--                        <li><a href="{{route('ds-donvi.get')}}"> Quản lý đơn vị </a></li>--}}
{{--                        <li><a href="{{route('ds-cachdung.get')}}"> Quản lý cách dùng </a></li>--}}
                        {{--<li><a href="{{route('ds-pnt.get')}}"> Nhập thuốc </a></li>--}}
                    </ul>
                </li>

                <li class="has_sub">
                   <a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i><span> Quy định </span></a>
                </li>

                {{--<li class="has_sub">--}}
                    {{--<a href="{{route('ttpk.get')}}" class="waves-effect"><i class="ti-info"></i><span> Thông tin phòng khám </span></a>--}}
                {{--</li>--}}

                <li class="has_sub">
{{--                    <a href="{{route('dangxuat.get')}}" class="waves-effect"><i class="ti-power-off"></i><span> Đăng xuất </span></a>--}}
                </li>

                <li class="text-muted menu-title">Tác giả</li>

                <li class="has_sub">
{{--                    <a href="{{route('aboutus.get')}}" class="waves-effect"><i class="ti-window"></i><span> Về chúng tôi </span></a>--}}
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>