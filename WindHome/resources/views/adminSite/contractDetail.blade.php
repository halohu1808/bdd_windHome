@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection

@section('content')
    <div class="container p-3">
        <div class="bg-white pt-4 pb-5">
            <h2 class="text-center font-weight-bold"> HỢP ĐỒNG</h2>
            <hr>
            <div class="row pt-3 pl-5 pr-5">
                <div class="col-md-6">
                    <div class="bg-light p-3">
                        <div class="bg-white p-3">
                            <h4 class="text-success font-weight-bold"> Thông tin khách hàng</h4>
                            <hr>
                            <table class="table table-borderless">
                                <tr>
                                    <th scope="row"> Họ tên:</th>
                                    <td>{{$contract->user->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Địa chỉ:</th>
                                    <td>{{$contract->user->address}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email:</th>
                                    <td>{{$contract->user->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ngày tạo tài khoản:</th>
                                    <td>{{$contract->user->created_at}}</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <br>
                    <div class="bg-light p-3">
                        <div class="bg-white p-3">

                            <h4 class="text-success font-weight-bold"> Thông tin thời gian</h4>
                            <hr>
                            {{--Ngay bat dau, ket thuc thue nha--}}
                            <table class="table table-borderless">
                                <tr>
                                    <th scope="row"> Ngày bắt đầu thuê:</th>
                                    <td>{{$contract->startTime}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Thời gian thuê:</th>
                                    <td>{{$contract->rentTime}} tháng</td>
                                </tr>
                                <tr>
                                    <th scope="row">Thời gian kết thúc dự kiến:</th>
                                    <td>{{$endTime}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Thời gian còn lại:</th>
                                    <td>{{$timeLeft}} ngày</td>
                                </tr>
                                <tr>
                                    <th scope="row">Thời gian kết thúc thực tế:</th>
                                    @if(isset($contract->endTime))
                                        <td>{{$contract->endTime}}</td>
                                    @else
                                        <td class="text-danger"> Chưa kết thúc</td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-3">
                    <div class="bg-light p-3">

                        <div class="bg-white p-3">
                            <div>
                                <h2 class="card-title text-success font-weight-bold pl-2"> {{$room->name}}</h2>
                                <label class="pl-3"> {{$room->address}}, {{ $room->city->name }} - <a
                                        class="text-primary " href="{{$room->linkmap}}">Xem trên bản đồ</a></label>

                                @if($contract->statusId == 6)
                                    <p class="blockquote-footer text-primary font-weight-bold pl-2">
                                        {{$contract->status->name}} <i class="fas fa-times-circle"></i>
                                    </p>
                                @elseif($contract->statusId == 5)
                                    <p class="blockquote-footer text-danger font-weight-bold pl-2">
                                        {{$contract->status->name}} <i class="fas fa-check-circle"></i>
                                    </p>
                                @else
                                    <p class="blockquote-footer text-secondary font-weight-bold pl-2">
                                        {{$contract->status->name}} <i class="fas fa-exclamation-circle"></i>
                                    </p>
                                @endif
                                <hr>

                                <label
                                    class="font-weight-bold text-success pl-3">Giá
                                    phòng: {{number_format($room->pricePerMonth) }}
                                    vnđ/ tháng </label>
                                <hr>
                                <div class="row pl-3">
                                    <div class="wrapper col-md-12">
                                        <div class=""><i class="fas fa-user"></i></div>
                                        <div class="pl-2">Số khách: {{$room->guest}} người</div> {{--Số người--}}
                                    </div>
                                    <div class="wrapper col-md-12">
                                        <div><i class="fas fa-clock"></i></div>
                                        <div class="pl-2">Thuê tối thiểu: {{$room->minRentTime}}tháng
                                        </div> {{--rating--}}
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
                                            <i class="fas fa-check-circle"></i> <i class="fas fa-bath fa-1x"></i> Phòng
                                            tắm riêng
                                        @else
                                            <i class="fas fa-times-circle"></i> <i class="fas fa-bath fa-1x"></i> Phòng
                                            tắm riêng
                                        @endif
                                    </div>
                                </div>
                                <div class="wrapper col-md-6">


                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="wrapper col-md-6">

                                    <div class="pl-2">
                                        @if (isset($room->wifi))<i class="fas fa-check-circle"></i> <i
                                            class="fas fa-wifi"></i> Wifi
                                        @else <i class="fas fa-times-circle"></i> <i class="fas fa-wifi"></i> Wifi
                                        @endif
                                    </div>
                                </div>

                                <div class="wrapper col-md-6">

                                    <div class="pl-2">
                                        @if (isset($room->cooking)) <i class="fas fa-check-circle"></i> <i
                                            class="fas fa-utensil-spoon"></i> Nấu ăn
                                        @else  <i class="fas fa-times-circle"></i> <i class="fas fa-utensil-spoon"></i>
                                        Nấu ăn
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <div class="row pt-2">

                                <div class="wrapper col-md-6">

                                    <div class="pl-2">
                                        @if (isset($room->airCondition)) <i class="fas fa-check-circle"></i> <i
                                            class="fas fa-snowflake"></i> Điều hòa
                                        @else <i class="fas fa-times-circle"></i> <i class="fas fa-snowflake"></i> Điều
                                        hòa
                                        @endif
                                    </div>
                                </div>

                                <div class="wrapper col-md-6">
                                    <div class="pl-2">
                                        @if (isset($room->parking)) <i class="fas fa-check-circle"></i> <i
                                            class="fas fa-parking"></i></i> Chỗ gửi xe
                                        @else <i class="fas fa-times-circle"></i> <i class="fas fa-parking"></i></i> Chỗ
                                        gửi xe
                                        @endif
                                    </div>
                                </div>
                            </div>


                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="pl-4 pr-4">
                <div class="p-3">
                    <div class="bg-light p-3">
                        {{--FEED BACK--}}
                        <div class="bg-white p-3">
                            <h4 class="text-success font-weight-bold"> Góp ý của khách</h4>
                            <table class="table table-borderless">
                                @foreach($feedbacks as $key=>$feedback)
                                    <tr>
                                        <th scope="row"> {{$feedback->contract->user->name}} :</th>
                                        <td>{{$feedback->content}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    {{--    <div class="container">--}}
    {{--        <h2 class="pt-4">HỢP ĐỒNG</h2>--}}
    {{--        <div class="row pt-2">--}}
    {{--            <div class="col-md-7">--}}

    {{--                <div class="carousel-item active">--}}
    {{--                    <img src={{asset("storage/img/home/". $images[0]->images)}} class="d-block w-100" alt="...">--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-5">--}}

    {{--                <form class="bg-white p-3">--}}
    {{--                    <div>--}}
    {{--                        <h2 class="font-weight-bold text-success"> {{$room->name}}</h2>--}}
    {{--                        <label> {{$room->address}}, {{ $room->city->name }}</label>--}}
    {{--                        <hr>--}}
    {{--                    </div>--}}
    {{--                    <div>--}}
    {{--                        <label> Giá phòng: {{$room->pricePerMonth}} VNĐ/tháng </label><br>--}}
    {{--                        <label> Diện tích: {{$room->area}} m2 </label><br>--}}
    {{--                        <label> Thời gian thuê tối thiểu: {{$room->minRentTime}} tháng </label><br>--}}
    {{--                        <label> Trạng thái:--}}
    {{--                            {{$room->status->name}}--}}
    {{--                        </label><br>--}}

    {{--                        <hr>--}}
    {{--                    </div>--}}

    {{--                    <div class="row pt-2">--}}
    {{--                        <div class="wrapper col-md-4">--}}
    {{--                            <i class="fas fa-bath fa-1x"></i>--}}
    {{--                            <div class="pl-2">--}}
    {{--                                @if (isset($room->bathRoom)) Có--}}
    {{--                                @else Không--}}
    {{--                                @endif--}}
    {{--                            </div> --}}{{--bathRoom--}}
    {{--                        </div>--}}
    {{--                        <div class="wrapper col-md-4">--}}
    {{--                            <div class=""><i class="fas fa-user"></i></div>--}}
    {{--                            <div class="pl-2">{{$room->guest}}</div> --}}{{--guest--}}
    {{--                        </div>--}}
    {{--                        <div class="wrapper col-md-4">--}}
    {{--                            <i class="fas fa-parking"></i>--}}
    {{--                            <div class="pl-2">--}}
    {{--                                @if (isset($room->parking)) Có--}}
    {{--                                @else Không--}}
    {{--                                @endif--}}
    {{--                            </div> --}}{{--parking--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="row pt-2">--}}
    {{--                        <div class="wrapper col-md-4">--}}
    {{--                            <i class="fas fa-wifi"></i>--}}
    {{--                            <div class="pl-2">--}}
    {{--                                @if (isset($room->wifi)) Có--}}
    {{--                                @else Không--}}
    {{--                                @endif--}}
    {{--                            </div> --}}{{--wifi--}}
    {{--                        </div>--}}
    {{--                        <div class="wrapper col-md-4">--}}
    {{--                            <i class="fas fa-utensil-spoon"></i>--}}
    {{--                            <div class="pl-2">--}}
    {{--                                @if (isset($room->cooking)) Có--}}
    {{--                                @else Không--}}
    {{--                                @endif--}}
    {{--                            </div> --}}{{--cooking--}}
    {{--                        </div>--}}


    {{--                        <div class="wrapper col-md-4">--}}
    {{--                            <i class="fas fa-snowflake"></i>--}}
    {{--                            <div class="pl-2">--}}
    {{--                                @if (isset($room->airCondition)) Có--}}
    {{--                                @else Không--}}
    {{--                                @endif--}}
    {{--                            </div> --}}{{--airCondition--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <hr>--}}


    {{--                                            trường hợp các nút ẩn hiện--}}
    {{--    @if($contract->statusId==7)--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-6">--}}
    {{--                Hủy giữ phòng--}}

    {{--                <a href="{{route('UserAction.cancelBookingRequest',['roomId'=> $room->id,'contractId'=>$contract->id] )}}"--}}
    {{--                   class="btn btn-primary">Hủy Giữ Phòng</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    @elseif($contract->statusId==5)--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-6">--}}
    {{--                Hủy hợp đồng request--}}
    {{--                <a href="{{route('UserAction.cancelRoom',['roomId'=> $room->id,'contractId'=>$contract->id] )}}"--}}
    {{--                   class="btn btn-primary">Huỷ Hợp--}}
    {{--                    Đồng</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    @elseif($contract->statusId==8)--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-6">--}}
    {{--                Hủy yêu cầu hủy hợp đồng--}}
    {{--                <a href="{{route('contract.cancelEnd',$room->id)}}" class="btn btn-primary">Hủy Yêu--}}
    {{--                    Cầu Hủy Hợp Đồng</a>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--        @elseif($room->statusId==6)--}}
    {{--        @endif--}}
    {{--        </form>--}}
    {{--        </div>--}}

    {{--        </div>--}}
    {{--        <br>--}}
    {{--        <br>--}}
    {{--        <div class="row pt-5">--}}
    {{--            --}}{{--            Ngay bat dau, ket thuc thue nha--}}
    {{--            <table class="table">--}}
    {{--                <thead>--}}
    {{--                <tr>--}}
    {{--                    <th scope="col">#</th>--}}
    {{--                    <th scope="col">Ngày bắt đầu thuê</th>--}}
    {{--                    <th scope="col">Thời gian thuê</th>--}}
    {{--                    <th scope="col">Thời gian kết thúc dự kiến</th>--}}
    {{--                    <th scope="col">Thời gian còn lại</th>--}}
    {{--                    <th scope="col">Thời gian kết thúc Thực tế</th>--}}
    {{--                </tr>--}}
    {{--                </thead>--}}
    {{--                <tbody>--}}
    {{--                <tr>--}}
    {{--                    <th scope="row"></th>--}}
    {{--                    <td>{{$contract->startTime}}</td>--}}
    {{--                    <td>{{$contract->rentTime}} tháng</td>--}}
    {{--                    <td>{{$endTime}}</td>--}}
    {{--                    <td>{{$timeLeft}} ngày</td>--}}
    {{--                    <td>{{$contract->endTime}}</td>--}}
    {{--                </tr>--}}

    {{--                </tbody>--}}
    {{--            </table>--}}


    {{--        </div>--}}

    {{--        <div>Ý Kiền phản hổi của khách hàng:<br/>--}}

    {{--            @foreach($feedbacks as $key=>$feedback)--}}
    {{--                {{$feedback->contract->user->name}} có ý kiến : {{$feedback->content}}<br/>--}}

    {{--            @endforeach--}}
    {{--        </div>--}}


    {{--    </div>--}}

@endsection
