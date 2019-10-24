@extends('layout.home')

@section('sideBar')
    @include('listSite.filterSideBar')
@endsection

@section('content')

    <div class="container" xmlns="http://www.w3.org/1999/html">

        <div class="row pt-5">

            <div class="col-md-0">

            </div>

            <div class="col-md-10">

                <form method="post" action="{{route('user.update',$user->id)}}">
                    @csrf
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Họ tên</label>
                        <div class="col-sm-10">
                            <input type="text" name = "name" class="form-control" id="inputName" placeholder="{{$user -> name}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text"  name ="email" class="form-control-plaintext" id="staticEmail" value="{{$user -> email}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" name = "password" class="form-control" id="inputPassword" placeholder="Password" value = "{{$user-> password}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name = "phone" class="form-control" id="inputPassword" placeholder="{{$user -> phone}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name = "address" class="form-control" id="inputPassword" placeholder="{{$user -> address}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" type="button" class="btn btn-success">Đồng ý</button>
                            <a class="btn btn-danger" href="{{route('user.detail', $user->id)}}" >Hủy bỏ</a>
                        </div>
                    </div>

                </form>

{{--                <form class="bg-white p-3">--}}
{{--                    <div>--}}
{{--                        Địa chỉ email:<input type="text" class="form-control" value = '{{$user -> email}}'></input><br>--}}
{{--                        <hr>--}}
{{--                        Họ tên:<input type="text" class="form-control" value = '{{$user -> name}}'></input><br>--}}
{{--                        Mật khẩu<input type="text" class="form-control" type = 'password'></input><br>--}}
{{--                        Số điện thoại<input type="text" class="form-control" value = '{{$user -> phone}}'> </input><br>--}}
{{--                        Địa chỉ<input type="text" class="form-control" value = '{{$user -> address}}'>  </input><br>--}}
{{--                        <a class="btn btn-outline-secondary" href="{{route('user.update', $user->id)}}" > Đồng ý</a>--}}

{{--                        <hr>--}}
{{--                    </div>--}}
{{--                </form>--}}
            </div>

        </div>

    </div>

@endsection
