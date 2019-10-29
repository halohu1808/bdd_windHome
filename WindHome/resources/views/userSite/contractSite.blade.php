@extends('layout.home')
@section('sideBar')
    @include('userSite.sideBarUser')
@endsection

@section('content')
    <!-- Page Content  -->
    <div id="content">

        <div class="row">
            <div class="col-md-6">
                <h2>HỢP ĐỒNG</h2>
            </div>
            <div class="col-md-6">
                <form id="test" class="form-inline" style="float: right">
                    <input class="form-control mr-sm-2" type="search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm Kiếm</button>
                </form>
            </div>
        </div>


        <div class="row pt-5">
            <table class="table table-hover">
                <thead class="thead-light">
                <tr>
                    <th>Mã số</th>
                    <th>Phòng</th>
                    <th>Khách</th>
                    <th>Giá/thang</th>
                    <th>Thời Gian Thuê</th>
                    <th>Trạng Thái</th>
                </tr>
                </thead>
                @foreach($contracts as $contract)
                    <tr>
                        <td>{{$contract->id}} </td>
                        <td><a href="{{route('userRoute.contractDetail',$contract->id)}}">{{$contract->room->name}}</a></td>
                        <td>{{$contract->user->name }}</td>
                        <td>{{$contract->room->pricePerMonth}}</td>
                        <td>{{$contract->rentTime}}</td>
                        <td>{{$contract->status->name}}</td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>


    </div>
@endsection
