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
                    <div class="form-group">
                        <label>Giá thuê</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                               placeholder="1 000 000, 3 000 000...">
                    </div>
                    <div class="form-group">
                        <label>Thời gian thuê tối thiểu</label>
                        <input type="text" class="form-control" name="minRentTime"
                               placeholder="6 tháng, 12 tháng...">
                    </div>
                    <div class="form-group">
                        <label>Kinh độ</label>
                        <input type="text" class="form-control" name="lat"
                               placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Vĩ độ</label>
                        <input type="text" class="form-control" name="lng"
                               placeholder="">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Diện tích</label>
                        <input type="text" class="form-control" name="area" placeholder="20m2...">
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="bathRoom" value="option1">
                        <label class="form-check-label">Phòng tắm riêng</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="guest" value="option1">
                        <label class="form-check-label">Số người</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="parking" value="option1">
                        <label class="form-check-label">Chỗ đỗ xe</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="wifi" value="option1">
                        <label class="form-check-label">wifi</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="cooking" value="option1">
                        <label class="form-check-label">Được nấu ăn</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="airCondition" value="option1">
                        <label class="form-check-label">Điều hòa</label>
                    </div>

                </div>

            </div>
        </form>
    </div>


@endsection
