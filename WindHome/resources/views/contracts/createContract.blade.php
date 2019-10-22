@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection
@section('content')
    <div id="content">
        <div class="row pl-5">
            <h2>Tạo hợp đồng</h2>
        </div>

        <hr>
        <form method="POST" action="{{route('contract.store')}}">
            @csrf
            <div class="row pl-5 pr-5 pt-3">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Thời gian bắt đầu</label>
                        <input type="date" class="form-control" name="startTime" placeholder="Ngày bắt đầu">
                    </div>
                    <div class="form-group">
                        <label>Ngày kết thúc</label>
                        <input type="date" class="form-control" name="endTime" placeholder="Ngày kết thúc">
                    </div>
                    <div class="form-group">
                        <label>Giá phòng</label>
                        <input type="number" class="form-control" name="price" placeholder=".VNĐ">
                    </div>
                    <div class="form-group">
                        <label>Thời gian thuê</label>
                        <input type="number" class="form-control" name="rentTime" placeholder="Tháng">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Tình Trạng Phòng</label>
                            <input type="number" class="form-control" name="statusId" placeholder="1,2...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Người Thuê</label>
                            <input type="number" class="form-control" name="userId"
                                   placeholder="..." value="{{Auth::user()->id}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Mã số phòng</label>
                            <input type="number" class="form-control" name="roomId"
                                   placeholder="...">
                        </div>
                    </div>


                    <div class="pl-5">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
