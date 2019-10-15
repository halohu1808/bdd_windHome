@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection
@section('content')
    <div id="content">
        <div class="row pl-5">
            <h2>Tạo phòng mới</h2>
        </div>

        <hr>
        <form>
            <div class="row pl-5 pr-5 pt-3">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên phòng</label>
                        <input type="text" class="form-control" name="name" placeholder="Tên phòng...">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Đường,quận,thành phố...">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Số người</label>
                            <input type="text" class="form-control" name="guest" placeholder="1,2...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Thời gian thuê tối thiểu</label>
                            <input type="text" class="form-control" name="minRentTime"
                                   placeholder="...tháng">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Giá thuê</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                               placeholder="1 000 000, 3 000 000...">
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" class="form-control" name="#" placeholder="20m2...">
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Diện tích</label>
                        <input type="text" class="form-control" name="area" placeholder="20m2...">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Kinh độ</label>
                            <input type="text" class="form-control" name="lat"
                                   placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Vĩ độ</label>
                            <input type="text" class="form-control" name="lng"
                                   placeholder="">
                        </div>
                    </div>
                    <label>Thông tin thêm</label>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="wifi" value="option1">
                                <label class="form-check-label">wifi</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="parking" value="option1">
                                <label class="form-check-label">Đỗ xe</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="bathRoom" value="option1">
                                <label class="form-check-label">Phòng tắm</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="cooking" value="option1">
                                <label class="form-check-label">Nấu ăn</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="airCondition" value="option1">
                                <label class="form-check-label">Điều hòa</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="pl-5">
                <button type="button" class="btn btn-outline-secondary">Thêm mới</button>
            </div>

        </form>
    </div>


@endsection
