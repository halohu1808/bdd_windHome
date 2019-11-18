@extends('layout.home')

{{--@section('sideBar')--}}
{{--    @include('listSite.filterSideBar')--}}
{{--@endsection--}}

@section('content')

    <div class="container-fluid p-5">



        <div class="row">

            <div class="col-md-2">

            </div>
            <div class="col-md-8">

                <div class="row " >
{{--                    <div class="col-12">--}}
{{--                        @if (Session::has('message'))--}}
{{--                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>--}}
{{--                        @endif--}}

{{--                    </div>--}}
                    <div class="col-md-12 p-5" style="background: white">

                        <form method="post" action="{{route('user.update',$user->id)}}">
                            @csrf

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <p>{{$user -> email}}</p>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="inputname" class="col-sm-2 col-form-label">Họ tên</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputName"
                                           value="{{$user -> name}}">
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    @error('name')
                                    <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input type="number" name="phone" class="form-control" id="inputPassword"
                                           value="{{$user -> phone}}">
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    @error('phone')
                                    <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" id="inputPassword"
                                           value="{{$user -> address}}">
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    @error('address')
                                    <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" type="button" class="btn btn-outline-primary">Đồng ý</button>
                                    <a class="btn btn-outline-secondary" href="{{route('user.detail', $user->id)}}">Hủy bỏ</a>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>

@endsection
