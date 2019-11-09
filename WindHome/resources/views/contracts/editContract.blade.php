@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection
@section('content')
    <div class="container pt-5">
        <div class="col pt-5 md-12" style="background: white">
            {{--            <div id="" >--}}
            <div class="row pl-5 md-10">
                <h2>Tạo hợp đồng</h2>
            </div>
            <hr>
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

            <form method="POST" action="{{route('contract.store',$contract[0]->id)}}">
                @csrf
                <div class="row pl-5 pr-5 pt-3">

                    <div class="col-md-4">

                        <div class="form-group">
                            <label>Tên phòng: </label>
                            <input type="number" class="form-control" name="roomId"
                                   placeholder="..." value="{{$room->id}}" hidden>
                            {{--                            <p>{{$room->name}}</p>--}}
                        </div>
                        <div class="form-group">
                            <label>Tình Trạng Phòng: </label>
                            <input type="number" class="form-control" name="statusId" placeholder="1,2..." --}}
                                   value="5" hidden>
                            {{--                            <p>{{$contract[0]->status->name}}</p>--}}
                        </div>
                        <div class="form-group">
                            <label>Người Thuê: </label>
                            <input type="number" class="form-control" name="userId"
                                   placeholder="..." value="{{$contract[0]->userId}}" hidden>
                            {{--                            <p>{{$contract[0]->user->name}}</p>--}}
                        </div>
                        <div class="form-group">
                            <label>Giá phòng:  vnđ</label>
                            <input type="text" class="form-control " name="price"
                                   value='{{$contract[0]->room->pricePerMonth}}' hidden/>
                            {{--                            <p>{{number_format($contract[0]->room->pricePerMonth)}} vnđ</p>--}}
                        </div>
                    </div>
                    <div class="col md-4">
                        <div class="form-group">
                            <label>{{$room->name}}</label>
                            <input type="number" class="form-control" name="roomId"
                                   placeholder="..." value="{{$room->id}}" hidden>
                            {{--                            <p>{{$room->name}}</p>--}}
                        </div>
                        <div class="form-group">
                            <label>{{$contract[0]->status->name}}</label>
                            <input type="number" class="form-control" name="statusId" placeholder="1,2..." --}}
                                   value="5" hidden>
                            {{--                            <p>{{$contract[0]->status->name}}</p>--}}
                        </div>
                        <div class="form-group">
                            <label>{{$contract[0]->user->name}}</label>
                            <input type="number" class="form-control" name="userId"
                                   placeholder="..." value="{{$contract[0]->userId}}" hidden>
                            {{--                            <p>{{$contract[0]->user->name}}</p>--}}
                        </div>
                        <div class="form-group">
                            <label>{{number_format($contract[0]->room->pricePerMonth)}} vnđ</label>
                            <input type="text" class="form-control " name="price"
                                   value='{{$contract[0]->room->pricePerMonth}}' hidden/>
                            {{--                            <p>{{number_format($contract[0]->room->pricePerMonth)}} vnđ</p>--}}
                        </div>
                    </div>
                    <div class="col md-4">
                        <div class="form-group">
                            <label>Thời gian bắt đầu</label>
                            <input type="date" class="form-control" name="startTime" placeholder="Ngày bắt đầu">
                        </div>
                        {{--                    <div class="form-group">--}}
                        {{--                        <label>Ngày kết thúc</label>--}}
                        {{--                        <input type="date" class="form-control" name="endTime" placeholder="Ngày kết thúc">--}}
                        {{--                    </div>--}}

                        <div class="form-group">
                            <label>Thời gian thuê</label>
                            <input type="text" class="form-control" name="rentTime" placeholder="Tháng"
                                   value="{{$contract[0]->rentTime}}" required>
                        </div>
                    </div>

                </div>
                <div class="pl-5 pb-5">
                    <button type="submit" class="btn btn-outline-primary">Tạo hợp đồng</button>
                </div>
            </form>
            {{--            </div>--}}
        </div>
    </div>
@endsection
