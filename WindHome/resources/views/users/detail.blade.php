@extends('layout.home')

@section('sideBar')
    @include('listSite.filterSideBar')
@endsection

@section('content')

    <div class="container">

        <div class="row pt-5">

            <div class="col-md-0">

            </div>

            <div class="col-md-10">

                <form method="post">
                    <div>
                        <h5 class="font-weight-bold text-success"> Họ tên: {{$user->name}}</h5>
                        <hr>
                        <p>Địa chỉ email: {{$user -> email}}</p>
                        <p>Mật khẩu: *************</p>
                        <p>Số điện thoại: {{$user -> phone}}</p>
                        <p>Địa chỉ: {{$user -> address}}</p>
                        <a class="btn btn-danger" href="{{route('user.edit', $user->id)}}" > Cập nhật hồ sơ</a>

                        <br>
                        <br>
                        <br>

                        <p class="font-weight-bold text-success">Lịch sử thuê phòng</p>
                        <p>Thời gian từ: 15/10/2019 Đến: 14/10/2020 </p>

                        <hr>
                    </div>
                </form>
            </div>

        </div>

    </div>

@endsection
