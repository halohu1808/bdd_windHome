@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection
@section('content')
    <div id="content">
        <div class="row pl-5">
            <h2>Gia hạn hợp đồng</h2>
        </div>
        <hr>
        <div style="background:#fefefe">
            {{--        ERROR MESSENGER--}}

            <form method="POST" action="{{route('contract.extensionUpdate',$contract[0]->id)}}">
                @csrf
                <div class="row pl-5 pr-5 pt-3">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Thời gian bắt đầu</label>
                            <input type="text" class="form-control" name="startTime" value="{{$contract[0]->startTime}}"
                                   hidden>
                            <h5>{{$contract[0]->startTime}}</h5>
                        </div>
                        {{--                    <div class="form-group">--}}
                        {{--                        <label>Ngày kết thúc</label>--}}
                        {{--                        <input type="date" class="form-control" name="endTime" placeholder="Ngày kết thúc">--}}
                        {{--                    </div>--}}

                        <div class="form-group">
                            <label>Giá phòng</label>
                            <input type="text" class="form-control" name="price"
                                   value='{{$contract[0]->room->pricePerMonth}}' hidden/>
                            <h5>{{$contract[0]->room->pricePerMonth}}</h5>
                        </div>

                        <div class="form-group">
                            <label>Thời gian thuê</label>
                            <input type="text" class="form-control" name="rentTime" placeholder="Tháng"
                                   value="{{$contract[0]->rentTime}}" hidden>
                            <h5>{{$contract[0]->rentTime}}</h5>
                        </div>
                        <div class="form-group">
                            <label>Thời gian còn lại(ngày)</label>
                            <h5>{{$timeLeft}}</h5>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="form-group col-md-6">
                            <label>Tình Trạng Phòng</label>
                            <input type="number" class="form-control" name="statusId" placeholder="1,2..." --}}
                                   value="5" hidden>
                            <h5>{{$contract[0]->status->name}}</h5>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Người Thuê</label>
                            <input type="number" class="form-control" name="userId"
                                   placeholder="..." value="{{$contract[0]->userId}}" hidden>
                            <h5>{{$contract[0]->user->name}}</h5>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tên</label>
                            <input type="number" class="form-control" name="roomId"
                                   placeholder="..." value="{{$room->id}}" hidden>
                            <h5>{{$room->name}}</h5>
                        </div>
                        <div class="form-group">
                            <label>Thời gian thuê thêm(tháng)</label>
                            <input type="text" class="form-control" name="extensionTime" placeholder="Tháng"
                                   required>
                            @if ($errors->has('extensionTime'))
                                <div class="alert alert-danger">
                                    <strong>{{$errors->first('extensionTime')}}</strong>
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="">
                        <button type="submit" class="btn btn-outline-primary">Gia Hạn</button>
                    </div>
                </div>
            </form>
        </div>



@endsection
