<nav id="sidebar">
    <div class="sidebar-header">
        <a href="https://www.google.com"><h3>Wind Home</h3></a>
    </div>

    <ul class="list-unstyled components">
        <p>TRANG ADMIN</p>

        {{--Phòng--}}
        <li class="active">
            <a href="#roomSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Phòng</a>
            <ul class="collapse list-unstyled" id="roomSubmenu">
                <li>
                    <a href="{{route('room.index')}}">Tất cả</a>
                </li>
                <li>
                    <a href="{{route('adminRoute.roomAvailable')}}">Phòng còn</a>
                </li>
                <li>
                    <a href="{{route('adminRoute.roomRented')}}">Phòng đã thuê</a>
                </li>
                <li>
                    <a href="{{route('adminRoute.roomKeeping')}}">Đang giữ chỗ </a>
                </li>
                <li>
                    <a href="{{route('adminRoute.roomEndRequest')}}">Muốn hủy hợp đồng </a>

                    <a href="{{route('room.create')}}">Thêm phòng mới</a>
                </li>
            </ul>
        </li>

        {{-- quản lí user--}}
        <li>
            <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Khách
                Hàng</a>
            <ul class="collapse list-unstyled" id="userSubmenu">
                <li>
                    <a href="{{route('adminRoute.userAll')}}">Tất cả</a>
                </li>
            </ul>
        </li>

        {{-- contract--}}
        <li>
            <a href="#contractSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Hợp Đồng</a>
            <ul class="collapse list-unstyled" id="contractSubmenu">
                <li>
                    <a href="{{route('adminRoute.contractAll')}}">Tất cả</a>
                </li>
                <li>
                    <a href="{{route('adminRoute.contractRun')}}">Đang thực thi</a>
                </li>
                <li>
                    <a href="{{route('adminRoute.contractEnd')}}">Kết thúc</a>
                </li>
                <li>
                    <a href="{{route('adminRoute.contractKeepRequest')}}">Giữ chỗ</a>
                </li>
                <li>
                    <a href="{{route('adminRoute.contractEndRequest')}}">Muốn hủy hợp đồng</a>
                </li>
            </ul>
        </li>


    </ul>
</nav>
