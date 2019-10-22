@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection
@section('content')
    <div class="container">

        <div class="row pt-5">
            <div class="col-md-7">


                <img src={{asset("storage/img/home/". $room->image)}} class="img-fluid" alt="Responsive image">
            </div>

            <div class="col-md-5">


                <form class="bg-white p-3">
                    <div>
                        <h2 class="font-weight-bold text-success"> {{$room->name}}</h2>
                        <label> {{$room->address}}, {{ $room->city }}</label>
                        <hr>
                    </div>
                    <div>
                        <label> Giá phòng: {{$room->pricePerMonth}} VNĐ/tháng </label><br>
                        <label> Diện tích: {{$room->area}} m2 </label><br>
                        <label> Thời gian thuê tối thiểu: {{$room->minRentTime}} tháng </label><br>
                        <label> Trạng thái:
                            {{$room->status->name}}
                        </label><br>

                        <hr>
                    </div>

                    <div class="row pt-2">
                        <div class="wrapper col-md-4">
                            <i class="fas fa-bath fa-1x"></i>
                            <div class="pl-2">
                                @if (isset($room->bathRoom)) Có
                                @else Không
                                @endif
                            </div> {{--bathRoom--}}
                        </div>
                        <div class="wrapper col-md-4">
                            <div class=""><i class="fas fa-user"></i></div>
                            <div class="pl-2">{{$room->guest}}</div> {{--guest--}}
                        </div>
                        <div class="wrapper col-md-4">
                            <i class="fas fa-parking"></i>
                            <div class="pl-2">
                                @if (isset($room->parking)) Có
                                @else Không
                                @endif
                            </div> {{--parking--}}
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="wrapper col-md-4">
                            <i class="fas fa-wifi"></i>
                            <div class="pl-2">
                                @if (isset($room->wifi)) Có
                                @else Không
                                @endif
                            </div> {{--wifi--}}
                        </div>
                        <div class="wrapper col-md-4">
                            <i class="fas fa-utensil-spoon"></i>
                            <div class="pl-2">
                                @if (isset($room->cooking)) Có
                                @else Không
                                @endif
                            </div> {{--cooking--}}
                        </div>


                        <div class="wrapper col-md-4">
                            <i class="fas fa-snowflake"></i>
                            <div class="pl-2">
                                @if (isset($room->airCondition)) Có
                                @else Không
                                @endif
                            </div> {{--airCondition--}}
                        </div>
                    </div>
                    <hr>
                    @if($room->statusId==3)
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Hủy Yêu Cầu</button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('contract.create')}}" type="submit" class="btn btn-primary">Tạo Hợp Đồng</a>
                            </div>
                        </div>
                    @elseif($room->statusId==2)
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Huỷ Hợp Đồng</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Sửa Hợp Đồng</button>
                            </div>
                        </div>
                    @elseif($room->statusId==4)
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Hủy Yêu Cầu</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Đồng Ý</button>
                            </div>
                        </div>
                    @elseif($room->statusId==1)
                    @endif

                </form>
            </div>

        </div>
        <br>
        <br>


@endsection
