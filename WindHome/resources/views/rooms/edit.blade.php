@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection
@section('content')
    <div id="content">
        <div class="row pl-5">
            <h2>Cập nhật phòng</h2>
            {{--            {{config('const.ROLLADMIN')}}--}}

        </div>
        {{--        ERROR MESSENGER--}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{--        END MESSENGER--}}
        <hr>
        <form method="POST" class="form-horizontal" enctype="multipart/form-data"
              action="{{route('room.update',$room->id)}}">
            @csrf
            <div class="row pl-5 pr-5 pt-3">

                <div class="col-md-6 pr-5">
                    <div class="form-group">
                        <label>Tên phòng</label>
                        <input type="text" class="form-control" name="name" placeholder="Tên phòng..."
                               value="{{$room->name}}">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Đường,quận,thành phố..."
                               value="{{$room->address}}">
                    </div>
                    <div class="form-group ">
                        <label>Thời gian thuê tối thiểu(Tháng)</label>
                        <input type="text" class="form-control" name="minRentTime"
                               value="{{$room->minRentTime}}">
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Số người</label>
                            <input type="number" class="form-control" name="guest" placeholder="1,2..."
                                   value="{{$room->guest}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Thành Phố</label>
                            <select class="custom-select" name="cityId">
                                @foreach($cities as $key => $city)
                                    <option value="{{$city->id}}"> {{$city->name}} </option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                    <div class="form-group">

                        <label>Ảnh đại diện</label>
                        <input required type="file" class="form-control" name="thumbnail" placeholder="address"
                               multiple>
                    </div>
                    <div class="form-group">

                        <label>Ảnh khác</label>
                        <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group">
                            <label>Diện tích (m2)</label>
                            <input type="text" class="form-control" name="area" value="{{$room->area}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Giá Điện (VNĐ/kW)</label>
                            <input type="text" class="form-control" name="electricFee" value="{{$room->electricFee}}"
                                   requidred>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label>Giá Nước (VNĐ/m3)</label>
                            <input type="text" class="form-control" name="waterFee" value="{{$room->waterFee}}"
                                   required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Tiền Vệ Sinh (VNĐ/Tháng)</label>
                            <input type="text" class="form-control" name="trashFee" value="{{$room->trashFee}}"
                                   required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label>Giá thuê (VNĐ/Tháng)</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                               placeholder="1 000 000, 3 000 000..." name="pricePerMonth"
                               value="{{$room->pricePerMonth}}" required>
                    </div>
                    <div class="form-group row">
                        <label>Đường dẫn bản đồ</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                               name="linkmap" value="{{$room->linkmap}}" required>
                    </div>
                    <br>
                    <br>


                    <label>Thông tin thêm</label>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="wifi" value="1">
                                <label class="form-check-label">wifi</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="parking" value="1">
                                <label class="form-check-label">Đỗ xe</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="bathRoom" value="0">
                                <label class="form-check-label">Phòng tắm</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="cooking" value="0">
                                <label class="form-check-label">Nấu ăn</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="airCondition" value="0">
                                <label class="form-check-label">Điều hòa</label>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
            <hr>
            <div class="pl-5">
                <button type="submit" class="btn btn-outline-primary">Cập nhật</button>
                <button class="btn btn-outline-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </div>
        </form>
    </div>


@endsection
