@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection
@section('content')
    <div class="container">
        <h2 class="pt-5">PHÒNG</h2>
        <div class="row pt-2">
            <div class="col-md-7">
                <div class="carousel-item active" style="max-height: 300px">
                    <img src={{asset("storage/img/home/". $images[0]->images)}} class="d-block w-100">
                    <div class="demo">
                        <ul id="lightSlider">
                            @foreach ($images as $image)
                                <li data-thumb="">
                                    <img src={{asset("storage/img/home/". $image->images)}}/>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-5">

                <form class="bg-white p-3" method="POST" action="{{route('room.booking')}}">
                    @csrf
                    <div>
                        <h1 class="card-title text-success font-weight-bold pl-2"> {{$room->name}}</h1>
                        <label class="pl-3"> {{$room->address}}, {{ $room->city->name }} - <a class="text-primary " href="{{$room->linkmap}}">Xem trên bản đồ</a></label>

                        @if($room->statusId == 1)
                            <p class="blockquote-footer text-primary font-weight-bold pl-2">
                                {{$room->status->name}} <i class="fas fa-check-circle"></i>
                            </p>
                        @elseif($room->statusId == 2)
                            <p class="blockquote-footer text-danger font-weight-bold pl-2">
                                {{$room->status->name}} <i class="fas fa-times-circle"></i>
                            </p>
                        @else
                            <p class="blockquote-footer text-secondary font-weight-bold pl-2">
                                {{$room->status->name}} <i class="fas fa-exclamation-circle"></i>
                            </p>
                        @endif
                        <hr>

                        <label
                            class="font-weight-bold text-success pl-3">Giá phòng: {{number_format($room->pricePerMonth) }}
                            vnđ/ tháng </label>
                        <hr>
                        <div class="row pl-3">
                            <div class="wrapper col-md-12">
                                <div class=""><i class="fas fa-user"></i></div>
                                <div class="pl-2">Số khách: {{$room->guest}} người</div> {{--Số người--}}
                            </div>
                            <div class="wrapper col-md-12">
                                <div> <i class="fas fa-clock"></i></div>
                                <div class="pl-2">Thuê tối thiểu: {{$room->minRentTime}} tháng</div> {{--rating--}}
                            </div>
                        </div>

                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-md-12"> Diện tích: </label><br>
                            <label class="col-md-12"> Tiền điện: </label><br>
                            <label class="col-md-12"> Tiền nước: </label><br>
                            <label class="col-md-12"> Tiền vệ sinh: </label>
                        </div>
                        <div class="col-md-6">
                            <label class=" ">{{number_format($room->area)}} m2</label><br>
                            <label class=" ">{{number_format($room->electricFee)}} vnđ/kw</label><br>
                            <label class=" ">{{number_format($room->waterFee)}} vnđ/m3</label><br>
                            <label class=" ">{{number_format($room->trashFee)}} vnđ/tháng</label>
                        </div>

                    </div>
                    <hr>
                    <div class="row pt-2">
                        <div class="wrapper col-md-6">
                            <div class="pl-2">
                                @if (isset($room->bathRoom))
                                    <i class="fas fa-check-circle"></i> <i class="fas fa-bath fa-1x"></i> Phòng tắm riêng
                                @else
                                    <i class="fas fa-times-circle"></i> <i class="fas fa-bath fa-1x"></i> Phòng tắm riêng
                                @endif
                            </div>
                        </div>
                        <div class="wrapper col-md-6">



                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="wrapper col-md-6">

                            <div class="pl-2">
                                @if (isset($room->wifi))<i class="fas fa-check-circle"></i> <i class="fas fa-wifi"></i> Wifi
                                @else <i class="fas fa-times-circle"></i> <i class="fas fa-wifi"></i> Wifi
                                @endif
                            </div>
                        </div>

                        <div class="wrapper col-md-6">

                            <div class="pl-2">
                                @if (isset($room->cooking)) <i class="fas fa-check-circle"></i> <i class="fas fa-utensil-spoon"></i> Nấu ăn
                                @else  <i class="fas fa-times-circle"></i> <i class="fas fa-utensil-spoon"></i> Nấu ăn
                                @endif
                            </div>
                        </div>


                    </div>
                    <div class="row pt-2">

                        <div class="wrapper col-md-6">

                            <div class="pl-2">
                                @if (isset($room->airCondition)) <i class="fas fa-check-circle"></i> <i class="fas fa-snowflake"></i> Điều hòa
                                @else <i class="fas fa-times-circle"></i> <i class="fas fa-snowflake"></i> Điều hòa
                                @endif
                            </div>
                        </div>

                        <div class="wrapper col-md-6">
                            <div class="pl-2">
                                @if (isset($room->parking)) <i class="fas fa-check-circle"></i> <i class="fas fa-parking"></i></i> Chỗ gửi xe
                                @else <i class="fas fa-times-circle"></i> <i class="fas fa-parking"></i></i> Chỗ gửi xe
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if($room->statusId==3)
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('contract.cancel',$room->id)}}" class="btn btn-outline-primary">Hủy Yêu Cầu</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('contract.run',$room->id)}}" class="btn btn-outline-primary">Tạo Hợp Đồng</a>
                            </div>
                        </div>
                    @elseif($room->statusId==2)
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('contract.endContract',$room->id)}}" class="btn btn-outline-primary">Huỷ Hợp
                                    Đồng</a>
                            </div>
                        </div>
                        {{--                        Hai code 2 truong hop--}}
                    @elseif($room->statusId==4)
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('contract.cancelEnd',$room->id)}}" class="btn btn-outline-primary">Hủy Yêu
                                    Cầu</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('contract.end',$room->id)}}" class="btn btn-outline-primary">Đồng Ý</a>
                            </div>
                        </div>
                    @elseif($room->statusId==1)
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('contract.underContruction',$room->id)}}" class="btn btn-outline-primary">Đang
                                    Sửa Chữa</a>
                            </div>
                        </div>
                    @elseif($room->statusId==9)
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('contract.hasRoom',$room->id)}}" class="btn btn-outline-primary">Còn Phòng</a>
                            </div>
                        </div>
                    @endif

                </form>
            </div>
        </div>
        <br>


@endsection
