@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection

@section('content')
    <!-- Page Content  -->
    <div id="content">

        <div class="row">
            <div class="col-md-6">
                <h2>KHÁCH HÀNG</h2>
            </div>
{{--            <div class="col-md-6">--}}
{{--                <form id="test" class="form-inline" style="float: right">--}}
{{--                    <input class="form-control mr-sm-2" type="search" aria-label="Search">--}}
{{--                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm Kiếm</button>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
        <div class="row pt-5">
            <table class="table table-hover">
                <thead class="thead-light">
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                </tr>
                </thead>
                @foreach($users as $key => $user)
                    <tr>
                        <td> {{++$key}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>
@endsection
