@extends('layout.home')
@section('sideBar')
    @include('userSite.sideBarUser')
@endsection
@section('content')
    <div class="container">

        <div class="row pt-5">
            <div class="col-md-7">

                <div class="carousel-item active">
                    <img src={{asset("storage/img/home/". $images[0]->images)}} class="d-block w-100" alt="...">
                </div>
            </div>
            <div class="col-md-5">


                <div>
                    <h2 class="font-weight-bold text-success"> {{$room->name}}</h2>
                    <label> {{$room->address}}, {{ $room->city->name }}</label>
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


                {{--                    trường hợp các nút ẩn hiện--}}
                @if($contract->statusId==7)
                    <div class="row">
                        <div class="col-md-6">
                            {{--                                Hủy giữ phòng--}}

                            <a href="{{route('UserAction.cancelBookingRequest',['roomId'=> $room->id,'contractId'=>$contract->id] )}}"
                               class="btn btn-primary">Hủy Giữ Phòng</a>
                        </div>
                    </div>
                @elseif($contract->statusId==5)
                    <div class="row">
                        <div class="col-md-6">
                            {{--                                Hủy hợp đồng request--}}
                            <a href="{{route('UserAction.cancelRoom',['roomId'=> $room->id,'contractId'=>$contract->id] )}}"
                               class="btn btn-primary">Huỷ Hợp
                                Đồng</a>
                        </div>
                        <div class="col-md-6">
                            {{--                                Hủy hợp đồng request--}}
                            <button type="button" class="btn btn-primary"
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
                                                <textarea name="contentt" class="form-control" rows="5" required></textarea>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                    Đóng
                                                </button>
                                                <button type="submit" class="btn btn-primary">Gửi góp ý</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


            </div>
            @elseif($contract->statusId==8)
                <div class="row">
                    <div class="col-md-6">
                        {{--                                Hủy yêu cầu hủy hợp đồng--}}
                        <a href="{{route('contract.cancelEnd',$room->id)}}" class="btn btn-primary">Hủy Yêu
                            Cầu Hủy Hợp Đồng</a>
                    </div>

                </div>
            @elseif($room->statusId==6)
            @endif
        </div>

    </div>
    <br>
    <br>
    <div class="row pt-5">
        {{--            Ngay bat dau, ket thuc thue nha--}}
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ngày bắt đầu thuê</th>
                <th scope="col">Thời gian thuê</th>
                <th scope="col">Thời gian kết thúc dự kiến</th>
                <th scope="col">Thời gian còn lại</th>
                <th scope="col">Thời gian kết thúc Thực tế</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row"></th>
                <td>{{$contract->startTime}}</td>
                <td>{{$contract->rentTime}} tháng</td>
                <td>{{$endTime}}</td>
                <td>{{$timeLeft}} ngày</td>
                <td>{{$contract->endTime}}</td>
            </tr>

            </tbody>
        </table>


    </div>
    </div>


@endsection
