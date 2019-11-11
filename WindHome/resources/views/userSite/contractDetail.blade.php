@extends('layout.home')
@section('sideBar')
    @include('userSite.sideBarUser')
@endsection
@section('content')
    <div class="container">

        <div class="row pt-5 pb-5">
            <div class="col-md-7">

                <div class="carousel-item active">
                    <img src={{asset("storage/img/home/". $images[0]->images)}} class="d-block w-100" alt="...">
                </div>
                <br>

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

            <div class="col-md-5">

                <div class="col-md-12">

                    <form class="bg-white p-3" method="POST" action="{{route('room.booking')}}">
                        @csrf
                        <div>
                            <h1 class="card-title text-success font-weight-bold pl-2"> {{$room->name}}</h1>
                            <label class="pl-3"> {{$room->address}}, {{ $room->city->name }} - <a class="text-primary "
                                                                                                  href="{{$room->linkmap}}">Xem
                                    trên bản đồ</a></label>

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
                                        <i class="fas fa-check-circle"></i> <i class="fas fa-bath fa-1x"></i> Phòng tắm
                                        riêng
                                    @else
                                        <i class="fas fa-times-circle"></i> <i class="fas fa-bath fa-1x"></i> Phòng tắm
                                        riêng
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
                                    @else  <i class="fas fa-times-circle"></i> <i class="fas fa-utensil-spoon"></i> Nấu
                                    ăn
                                    @endif
                                </div>
                            </div>


                        </div>
                        <div class="row pt-2">

                            <div class="wrapper col-md-6">

                                <div class="pl-2">
                                    @if (isset($room->airCondition)) <i class="fas fa-check-circle"></i> <i
                                        class="fas fa-snowflake"></i> Điều hòa
                                    @else <i class="fas fa-times-circle"></i> <i class="fas fa-snowflake"></i> Điều hòa
                                    @endif
                                </div>
                            </div>

                            <div class="wrapper col-md-6">
                                <div class="pl-2">
                                    @if (isset($room->parking)) <i class="fas fa-check-circle"></i> <i
                                        class="fas fa-parking"></i></i> Chỗ gửi xe
                                    @else <i class="fas fa-times-circle"></i> <i class="fas fa-parking"></i></i> Chỗ gửi
                                    xe
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{--                    trường hợp các nút ẩn hiện--}}
                        <br>
                        @if($contract->statusId==7)
                            <div class="row">
                                <div class="col-md-6">
                                    {{--                                Hủy giữ phòng--}}

                                    <a href="{{route('UserAction.cancelBookingRequest',['roomId'=> $room->id,'contractId'=>$contract->id] )}}"
                                       class="btn btn-outline-primary">Hủy Giữ Phòng</a>
                                </div>
                            </div>
                        @elseif($contract->statusId==5)
                            <div class="row">
                                <div class="col-md-6">
                                    {{--                                Hủy hợp đồng request--}}
                                    <a href="{{route('UserAction.cancelRoom',['roomId'=> $room->id,'contractId'=>$contract->id] )}}"
                                       class="btn btn-outline-primary"
                                       onclick="return confirm('Bạn có muốn chắc chắn muốn hủy không ?')">Huỷ Hợp
                                        Đồng</a>
                                </div>
                                <div class="col-md-6">
                                    {{--                                Hủy hợp đồng request--}}
                                    <button type="button" class="btn btn-outline-primary"
                                            data-toggle="modal" data-target="#exampleModal">Góp Ý
                                    </button>


                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Góp Ý</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('user.feedback',$contract->id)}}">
                                                    @csrf
                                                    <div class="modal-body">
                                                <textarea name="contentt" class="form-control" rows="5"
                                                          required></textarea>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">
                                                            Đóng
                                                        </button>
                                                        <button type="submit" class="btn btn-outline-primary">Gửi góp ý</button>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                    </form>
                </div>
                @elseif($contract->statusId==8)
                    <div class="row">
                        <div class="col-md-6">
                            {{--                                Hủy yêu cầu hủy hợp đồng--}}
                            <a href="{{route('contract.cancelEnd',$room->id)}}" class="btn btn-outline-primary"
                               onclick="return confirm('Bạn có chắc chắn muốn hủy')">Hủy Yêu
                                Cầu Hủy Hợp Đồng
                            </a>
                        </div>
                    </div>
                    @elseif($room->statusId==6)
                    @endif
                    </form>
            </div>
        </div>
    </div>

@endsection
