@extends('layout.home')
@section('content')

    <div class="container">
        <div class="col-12">
            @if (Session::has('booking'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('booking') }}</p>
            @endif

        </div>

        <div class="row pt-5">
            <div class="col-md-7">
                {{--                {{$imgLength = count($imagesSeeder) }}--}}

                {{--                <img src={{asset("storage/img/home/". $room->image)}} class="img-fluid" alt="Responsive image">--}}
                {{--                --}}{{--thông tin thêm--}}

                {{-- Hiển thị nhiều ảnh trong trang detail               --}}
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src={{asset("storage/img/home/". $images[0]->images)}} class="d-block w-100" alt="...">
                        </div>

                        @foreach($images as $key => $image)
                            <div class="carousel-item">
                                <img src={{asset("storage/img/home/". $images[$key]->images)}} class="d-block w-100"
                                alt="...">
                                {{--                            {{count($imagesSeeder)}}--}}
                            </div>

                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                {{--                <div class="row pt-2">--}}
                {{--                    <table class="table table-borderless">--}}
                {{--                        <tr>--}}
                {{--                            <td class="align-self-md-center">--}}
                {{--                                <i class="fas fa-bath fa-1x"></i><br>--}}
                {{--                                <label>Phòng Tắm</label><br>--}}
                {{--                                <div class="pl-2">--}}
                {{--                                    @if (isset($room->bathRoom)) Có--}}
                {{--                                    @else Không--}}
                {{--                                    @endif--}}
                {{--                                </div>--}}
                {{--                            </td>--}}
                {{--                            <td>--}}

                {{--                            </td>--}}
                {{--                            <td>--}}
                {{--                                <i class="fas fa-user"></i>--}}
                {{--                                <label>Số người</label>--}}
                {{--                            </td>--}}
                {{--                            <td>--}}
                {{--                                <div class="pl-2">{{$room->guest}}</div>--}}
                {{--                            </td>--}}
                {{--                        </tr>--}}
                {{--                    </table>--}}
                {{--                </div>--}}
                {{--                kết thông tin thêm--}}
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
        {{--        <div class="row">--}}
        {{--            <div class="col-md-7">--}}
        {{--                <h2 class="text-danger">Mô tả</h2>--}}
        {{--                <p class="text-justify">--}}
        {{--                    Nằm ở vị trí thuận lợi thuộc Eindhoven, Campanile Eindhoven là một nơi nghỉ chân tuyệt vời để tiếp--}}
        {{--                    tục--}}
        {{--                    khám phá thành phố sôi động. Từ đây, khách có thể dễ dàng tiếp cận được nét đẹp sống động của thành--}}
        {{--                    phố--}}
        {{--                    ở mọi góc cạnh. Như một thiên đường nghỉ dưỡng và thư giãn, khách sạn mang lại sự đổi mới hoàn toàn,--}}
        {{--                    chỉ--}}
        {{--                    cách nhiều điểm tham quan trong thành phố vài bước, như Mitra Slijterij Van Bergen, Sân gôn--}}
        {{--                    Welschap,--}}
        {{--                    Bảo tàng khoa học kỹ thuật Evoluon.--}}
        {{--                    <br>--}}
        {{--                    Tất cả các dịch vụ và tiện nghi khi đến trải nghiệm tại Louvre Hôtels mang lại cho khách hàng cảm--}}
        {{--                    giác--}}
        {{--                    thoải mái như đang ở nhà mình. Những tiện nghi hàng đầu của khách sạn bao gồm miễn phí wifi tất cả--}}
        {{--                    các--}}
        {{--                    phòng, quầy lễ tân 24 giờ, tiện nghi cho người khuyết tật, wifi công cộng, bãi đậu xe.--}}
        {{--                    <br>--}}
        {{--                    Khách sạn rất chú ý đến việc trang bị đầy đủ tiện nghi để đạt được sự thoải mái và tiện lợi nhất.--}}
        {{--                    Trong--}}
        {{--                    một số phòng, khách hàng có thể thấy tivi màn hình phẳng, thảm, internet không dây, internet không--}}
        {{--                    dây--}}
        {{--                    (miễn phí), máy điều hòa. Khách sạn còn gợi ý cho bạn những hoạt động vui chơi giải trí bảo đảm bạn--}}
        {{--                    luôn--}}
        {{--                    thấy hứng thú trong suốt kỳ nghỉ. Khi bạn đang tìm chỗ ở thoải mái và thuận tiện ở Eindhoven,--}}
        {{--                    Campanile--}}
        {{--                    Eindhoven mang đến cho bạn cảm giác như đang ở nhà.</p>--}}
        {{--            </div>--}}
        {{--            <div class="col-md-5 p3 ">--}}
        {{--                <div class="bg-white p-3">--}}
        {{--                    <h2 class="text-danger">Phòng tương tự</h2>--}}

        {{--                    <div class="p-3">--}}
        {{--                        <div class="row border">--}}
        {{--                            <div class="col-md-4 p-3">--}}
        {{--                                Phòng ABC--}}
        {{--                                <br>--}}
        {{--                                Giá: $1000--}}
        {{--                                <div class="">--}}
        {{--                                    <a class="btn btn-outline-secondary"> Chi tiết </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-md-8 p-3">--}}
        {{--                                <img class="img-fluid" alt="Responsive image"--}}
        {{--                                     src="https://image.thanhnien.vn/660/uploaded/tuyenth/2019_01_09/lisa-1_mwvm.jpg">--}}
        {{--                            </div>--}}

        {{--                        </div>--}}
        {{--                        <div class="row border">--}}
        {{--                            <div class="col-md-4 p-3">--}}
        {{--                                Phòng ABC--}}
        {{--                                <br>--}}
        {{--                                Giá: $1000--}}
        {{--                                <div class="">--}}
        {{--                                    <a class="btn btn-outline-secondary"> Chi tiết </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-md-8 p-3">--}}
        {{--                                <img class="img-fluid" alt="Responsive image"--}}
        {{--                                     src="https://image.thanhnien.vn/660/uploaded/tuyenth/2019_01_09/lisa-1_mwvm.jpg">--}}
        {{--                            </div>--}}

        {{--                        </div>--}}
        {{--                        <div class="row border">--}}
        {{--                            <div class="col-md-4 p-3">--}}
        {{--                                Phòng ABC--}}
        {{--                                <br>--}}
        {{--                                Giá: $1000--}}
        {{--                                <div class="">--}}
        {{--                                    <a class="btn btn-outline-secondary"> Chi tiết </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-md-8 p-3">--}}
        {{--                                <img class="img-fluid" alt="Responsive image"--}}
        {{--                                     src="https://image.thanhnien.vn/660/uploaded/tuyenth/2019_01_09/lisa-1_mwvm.jpg">--}}
        {{--                            </div>--}}

        {{--                        </div>--}}
        {{--                    </div>--}}


        {{--                </div>--}}

        {{--            </div>--}}
        {{--        </div>--}}

    </div>

@endsection
