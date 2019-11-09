@extends('layout.home')

{{--@section('sideBar')--}}
{{--    @include('listSite.filterSideBar')--}}
{{--@endsection--}}

@section('content')

    <div class="container-fluid pt-5">

        <div class="row" >

            <div class='col-md-2'>
            </div>
            <div class='col-md-8'>
                <div class="col-md-12">
                    @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                </div>
                <div class="col-md-12">
                    @if (Session::has('facebook'))
                        <p class="alert alert-danger {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('facebook') }}</p>
                    @endif

                </div>

                <div class="col-md-12 p-5" style="background: white">

                        <div>
                            <h5 class="font-weight-bold text-success"> Họ tên: {{$user->name}}</h5>
                            <hr>
                            <p>Địa chỉ email: {{$user -> email}}</p>
                            <p>Số điện thoại: {{$user -> phone}}</p>
                            <p>Địa chỉ: {{$user -> address}}</p>
                            <a class="btn btn-outline-primary" href="{{route('user.edit', $user->id)}}"> Cập nhật hồ sơ</a>

                        </div>

                </div>
            </div>
            <div class='col-md-2'>
            </div>

        </div>

    </div>

@endsection
