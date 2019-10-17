<nav id="sidebar">
    <div class="sidebar-header">
        <a href="https://www.google.com"><h3>Wind Home</h3></a>
    </div>

    <ul class="list-unstyled components">
        <p>Admin Site</p>
        {{--            Phòng--}}
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Phòng</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{route('room.index')}}">Tất cả</a>
                </li>
                <li>
                    <a href="#">Đang cho thuê</a>
                </li>
                <li>
                    <a href="{{route('room.create')}}">Thêm phòng mới</a>
                </li>
            </ul>
        </li>
        {{-- quản lí user--}}
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Khách
                hàng</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Tất cả</a>
                </li>
                <li>
                    <a href="#">Đang thuê nhà</a>
                </li>
            </ul>
        </li>
        {{--Comment--}}
        <li>
            <a href="#">Comment</a>
        </li>


    </ul>
</nav>
