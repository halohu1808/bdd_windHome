@extends('layout.home')
@section('content')
    <style></style>
    <div class="container">

        <div class="col-12">
            @if (Session::has('booking'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('booking') }}</p>
            @endif

        </div>

        <div class="row pt-5">
            <div class="col-md-7">

                <div class="carousel-inner">

                    <ul id="lightSlider">
                        @foreach ($images as $image)
                            <li data-thumb={{asset("storage/img/home/". $image->images)}}>
                                <img src={{asset("storage/img/home/". $image->images)}}>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-5">

                <form class="bg-white p-3" method="POST" action="{{route('room.booking')}}">
                    @csrf
                    <div>
                        <h1 class="card-title text-success font-weight-bold"> {{$room->name}}</h1>
                        <label> {{$room->address}}, {{ $room->city->name }} - <a class="il" href="{{$room->linkmap}}">Chỉ
                                Đường</a></label>

                        @if($room->statusId == 1)
                            <p class="blockquote-footer text-primary font-weight-bold">
                                {{$room->status->name}} <i class="fas fa-check-circle"></i>
                            </p>
                        @elseif($room->statusId == 2)
                            <p class="blockquote-footer text-danger font-weight-bold">
                                {{$room->status->name}} <i class="fas fa-times-circle"></i>
                            </p>
                        @else
                            <p class="blockquote-footer text-secondary font-weight-bold">
                                {{$room->status->name}} <i class="fas fa-exclamation-circle"></i>
                            </p>
                        @endif
                        <hr>
                        <label
                            class="font-weight-bold text-success"> {{number_format($room->pricePerMonth) }}
                            VND/ tháng </label>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-md-12"> Diện tích: </label><br>
                            <label class="col-md-12"> Thuê tối thiểu: </label><br>
                            <label class="col-md-12"> Tiền điện: </label><br>
                            <label class="col-md-12"> Tiền nước: </label><br>
                            <label class="col-md-12"> Tiền vệ sinh: </label>
                        </div>
                        <div class="col-md-6">
                            <label class=" ">{{$room->area}} m2</label><br>
                            <label class=" ">{{$room->minRentTime}} tháng</label><br>
                            <label class=" ">{{$room->electricFee}} VNĐ/kw</label><br>
                            <label class=" ">{{$room->waterFee}} VNĐ/m3</label><br>
                            <label class=" ">{{$room->trashFee}} VNĐ/tháng</label>

                        </div>

                    </div>
                    <hr>


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

    </div>

@endsection
