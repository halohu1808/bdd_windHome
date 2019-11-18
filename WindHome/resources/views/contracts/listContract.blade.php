
@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection

@section('content')
    <!-- Page Content  -->
    <div id="content">

        <div class="row">
            <div class="col-md-6">
                <h2>Tất cả các hợp đồng</h2>
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
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>Giá</th>
                    <th>Thời gian thuê</th>
                    <th>Trạng thái</th>
                    <th>Người thuê</th>
                    <th>Mã Số Phòng</th>
                    <th></th>
                </tr>
                </thead>
                @foreach($contracts as $contract)
                    <tr>
                        <td>{{$contract->startTime}}</td>
                        <td>{{$contract->endTime}}</td>
                        <td>{{$contract->price}}</td>
                        <td>{{$contract->rentTime}}</td>
                        <td>{{$contract->statusId}}</td>
                        <td></td>
                        <td>{{$contract->room->name}}</td>

                        <td><a class="btn btn-outline-secondary" href="{{route('room.edit',$room->id)}}">Update</a></td>
                        <td><a class="btn btn-outline-secondary" href="{{route('room.destroy',$room->id)}}">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>

            </table>
        </div>
        <a class="btn btn-outline-secondary" href="{{route('room.create')}}">Create</a>


    </div>
@endsection
