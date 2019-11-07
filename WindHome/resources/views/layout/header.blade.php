{{--Type Ahead--}}

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">

            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-home fa-2x"></i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                    <form action="{{route("room.findByCity")}}" method="post">
                        @csrf
                        <div class="wrapper">
                            <div class="pr-2">
                                <input type="text" required class="typeahead form-control" name="city"
                                       placeholder="Nhập địa điểm">
                            </div>
                            <div>
                                <a class="btn btn-outline-secondary" data-toggle="collapse" href="#collapseExample"
                                   role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Nâng Cao
                                </a>
                                <button type="submit" class="btn btn-outline-primary">Tìm Kiếm</button>

                                <div class="collapse pt-3" id="collapseExample">
                                    <div>
                                        <input type="text" name="minPrice" placeholder="giá tối thiểu(VNĐ)">
                                        <input type="text" name="maxPrice" placeholder="giá tối đa(VNĐ)">
                                        <input type="text" name="guest" placeholder="số lượng khách(ngừoi)">
                                        <input type="text" name="area" placeholder="diện tích tối thiểu(m2)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-bell"></i> <span class="caret"> {{count(\Illuminate\Support\Facades\Auth::user()->unreadNotifications)}}
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                @foreach(\Illuminate\Support\Facades\Auth::user()->unreadNotifications as $key=>$notification)
                                    @if($notification->type=='App\Notifications\Booking')

                                        <a class="pl-4"
                                           href="{{route('admin.detail',['id'=>$notification->data['room_id'],'key'=>$key++])}}"> {{$notification->data['user_name'] }}
                                            đã giữ phòng</a><br/>
                                    @elseif($notification->type=='App\Notifications\UserCancelRequest')
                                        <a class="pl-4"
                                           href="{{route('admin.detail',['id'=>$notification->data['room_id'],'key'=>$key++])}}">{{$notification->data['user_name'] }}
                                            muốn hủy thuê
                                            phòng</a>
                                    @elseif($notification->type=='App\Notifications\UserCancelBookingRequest')
                                        <a class="pl-4"
                                           href="{{route('admin.detail',['id'=>$notification->data['room_id'],'key'=>$key++])}}">{{$notification->data['user_name'] }}
                                            muốn hủy yêu cầu đặt phòng
                                        </a>
                                        {{--                                        Admin --}}
                                    @elseif($notification->type=='App\Notifications\AdminContractCancel')
                                        <a class="pl-4"
                                           href="#"> Admin vừa hủy yêu cầu giữ
                                            phòng {{$notification->data['room_name']}} của bạn.
                                        </a>
                                    @elseif($notification->type=='App\Notifications\AdminContractStore')
                                        <a class="pl-4"
                                           href="{{route('userRoute.contractDetail',['id'=>$notification->data['contract_id'],'key'=>$key++])}}">
                                            Hợp đồng nhà {{$notification->data['room_name']}} đã được tạo
                                        </a>

                                    @elseif($notification->type=='App\Notifications\AdminContractEndContract')
                                        <a class="pl-4"
                                           href="{{route('userRoute.contractDetail',['id'=>$notification->data['contract_id'],'key'=>$key++])}}">
                                            Hợp đồng nhà {{$notification->data['room_name']}} đã bị hủy
                                        </a>

                                    @elseif($notification->type=='App\Notifications\AdminExtensionContract')
                                        <a class="pl-4"
                                           href="{{route('userRoute.contractDetail',['id'=>$notification->data['contract_id'],'key'=>$key++])}}">
                                            {{$notification->data['room_name']}} đã được gia hạn
                                        </a>

                                    @elseif($notification->type=='App\Notifications\AdminCancelEnd')
                                        <a class="pl-4"
                                           href="{{route('userRoute.contractDetail',['id'=>$notification->data['contract_id'],'key'=>$key++])}}">
                                             Lệnh hủy phòng {{$notification->data['room_name']}} đã bị hủy
                                        </a>

                                    @elseif($notification->type=='App\Notifications\AdminContractEnd')
                                        <a class="pl-4"
                                           href="{{route('userRoute.contractDetail',['id'=>$notification->data['contract_id'],'key'=>$key++])}}">
                                             Phòng {{$notification->data['room_name']}} đã bị hủy
                                        </a>

                                    @endif

                                @endforeach

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->roll==1)
                                    <a class="pl-4" href="{{route('room.index')}}"> Trang quản
                                        lí</a> {{--Hải thêm để demo--}}
                                @else
                                    <a class="pl-4" href="{{route('userRoute.userSite')}}"> Trang quản
                                        lí</a> {{--Hải thêm để demo--}}
                                @endif

                                <a class="pl-4" href="{{route('user.detail', Auth::user()->id)}}"> Hồ sơ cá nhân</a>


                                <a class="pl-4" href="{{route('user.changePassword', Auth::user()->id)}}"> Thay đổi
                                    mật khẩu</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>
            </div>

        </div>
    </nav>
</div>



