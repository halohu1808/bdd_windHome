@extends('layout.home')
@section('content')
    <style></style>
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-7">

{{--                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
{{--                    <ol class="carousel-indicators">--}}
{{--                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
{{--                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
{{--                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
{{--                    </ol>--}}
                    <div class="carousel-inner">

                            <ul id="lightSlider">
                                @foreach ($images as $image)
                                    <li data-thumb={{asset("storage/img/home/". $image->images)}}>
                                        <img src={{asset("storage/img/home/". $image->images)}}>
                                    </li>
                                @endforeach
                            </ul>
                    </div>
{{--                </div>--}}
            </div>

            <div class="col-md-5">

                <form class="bg-white p-3" method="POST" action="{{route('room.booking')}}">
                    @csrf
                    <div>
                        <h1 class="font-weight-bold text-danger"> {{$room->name}}</h1>
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
                        <label>Tiền điện: {{$room->electricFee}} VNĐ/Số</label><br>
                        <label>Tiền nước: {{$room->waterFee}} VNĐ/Khối</label><br>
                        <label>Tiền vệ sinh: {{$room->trashFee}} VNĐ/tháng</label><br>

                    </div>
                    <div>
                        <a href="{{$room->linkmap}}">Chỉ Đường</a>
                    </div>

                    <div class="row pt-2">
                        <div class="wrapper col-md-6">
                            <i class="fas fa-bath fa-1x"></i>
                            <div class="pl-2">
                                @if (isset($room->bathRoom)) Có
                                @else Không
                                @endif
                            </div>
                        </div>
                        <div class="wrapper col-md-6">
                            <div class=""><i class="fas fa-user"></i></div>
                            <div class="pl-2">{{$room->guest}}</div>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="wrapper col-md-6">
                            <i class="fas fa-wifi"></i>
                            <div class="pl-2">
                                @if (isset($room->wifi)) Có
                                @else Không
                                @endif
                            </div>
                        </div>

                        <div class="wrapper col-md-6">
                            <i class="fas fa-utensil-spoon"></i>
                            <div class="pl-2">
                                @if (isset($room->cooking)) Có
                                @else Không
                                @endif
                            </div>
                        </div>


                    </div>
                    <div class="row pt-2">

                        <div class="wrapper col-md-6">
                            <i class="fas fa-snowflake"></i>
                            <div class="pl-2">
                                @if (isset($room->airCondition)) Có
                                @else Không
                                @endif
                            </div>
                        </div>

                        <div class="wrapper col-md-6">
                            <i class="fas fa-parking"></i>
                            <div class="pl-2">
                                @if (isset($room->parking)) Có
                                @else Không
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="pt-2">
                        @if($room->statusId==1)
                            <label>Thời Gian Thuê (Tháng)</label>
                            <div class="input-group input-group-sm mb-3">
                                <input type="number" name="rentTime" class="form-control"
                                       aria-describedby="inputGroup-sizing-sm"
                                       placeholder="{{$room->minRentTime}} tháng"
                                       required>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input type="text" name="roomId" value="{{$room->id}}" style="visibility: hidden">
                    </div>
                    <div class="pt-2">
                        @if($room->status->id == 1)
                            <button class="btn btn-success btn-lg btn-block" type="submit"> ĐẶT PHÒNG</button>

                            {{--                        <a class="btn btn-success btn-lg btn-block" href="{{route('room.booking',$room->id )}}"></a>--}}
                        @else {{$room->status->name}}
                        @endif

                    </div>
                </form>
            </div>

        </div>
        <hr>

        <div class="row pt-5">

        </div>
        <br>
        <br>
        <br>
        <br>


    </div>

@endsection
