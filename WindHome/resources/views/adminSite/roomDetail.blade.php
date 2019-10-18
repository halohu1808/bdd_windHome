@extends('layout.home')
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
                             {{$room->status}}
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
                </form>
            </div>

        </div>
        <div class="row pt-2">
            <h3 class="font-weight-bold text-success text-justify" >Thông tin hợp đồng</h3>
            <br>
            <table class="table table-bordered">
                <thead class="thead-dark">
                <th>#</th>
                <th>Tên người thuê</th>
                <th>Ngày thuê</th>
                <th>Ngày kết thúc</th>
                <th>Số thời gian còn lại</th>
                <th>Tình trạng</th>
                </thead>
                <tbody>
                <td></td>
                <td>Giáp Văn Sáng</td>
                <td>10-12-2018</td>
                <td>10-11-2019</td>
                <td>3 tháng</td>
                <td>{{$room->status}}</td>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row pt-2">
            <div class="pt-2">
                <a href="{{route('admin.editStatusOn',$room->id)}}" class="btn btn-outline-secondary btn-lg">Còn phòng</a>
            </div>
            <div class="pt-2">
                <a  href="{{route('admin.editStatusOff',$room->id)}}" class="btn btn-outline-secondary btn-lg  ml-lg-5">Hết Phòng</a>
            </div>
        </div>

    </div>

@endsection
