<nav id="sidebar">
    <div class="sidebar-header">
        <a href="#"><h3>Wind Home</h3></a>
    </div>

    <ul class="list-unstyled components">
        <p>TRANG KHÁCH HÀNG</p>

        {{--Phòng--}}
        <li class="active">
            <a href="#roomSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Hợp Đồng</a>
            <ul class="collapse list-unstyled" id="roomSubmenu">
                <li>
                    <a href="{{route('userRoute.allContract')}}">Tất cả</a>
                </li>
                <li>
                    <a href="{{route('userRoute.contractRun')}}">Phòng Đang Thuê</a>
                </li>
                <li>
                    <a href="{{route('userRoute.contractKeepRequest')}}">Phòng đang giữ chỗ </a>
                </li>
                <li>
                    <a href="{{route('userRoute.contractEndRequest')}}">Phòng muốn hủy </a>
                </li>
                <li>
                    <a href="{{route('userRoute.contractEnd')}}">Lịch sử thuê phòng </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
