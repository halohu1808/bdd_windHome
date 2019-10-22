@extends('layout.home')

@section('sideBar')
    @include('listSite.filterSideBar')
@endsection

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="row">
            <div class="col-md-4">
                <button type="button" id="sidebarCollapse" class="btn btn-outline-secondary">
                    <i class="fa fa-arrow-left"></i>
                    <span>Lọc</span>
                </button>
            </div>
        </div>

        <div class="card-deck row">

            {{--            bat dau FOR--}}
            @foreach($rooms as $room)
                <div class="col-md-3 pt-5">
                    <img class="card-img-top"
                         src={{asset("storage/img/home/". $room->image)}}>
                    <div class="card-body alert bg-white">
                        <a href="#"><h5 class="card-title">Phòng {{$room->name}}</h5></a>
                        <p class="blockquote-footer">
                           {{$room->status->name}}
                        </p>

                        <div class="row">
                            <div class="wrapper col-md-6">
                                <div class=""><i class="fas fa-user"></i></div>
                                <div class="pl-2">{{$room->guest}}</div> {{--Số người--}}
                            </div>
                            <div class="wrapper col-md-6">
                                <div class=""><i class="fas fa-star"></i></div>
                                <div class="pl-2">4</div> {{--rating--}}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <a href="{{route('room.detail', $room->id)}}" class="btn btn-outline-primary btn-sm" =>Chi
                        Tiết</a>
                        <label
                            class="float-right mt-1 font-weight-bold text-success"> {{number_format($room->pricePerMonth) }}
                            VND </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
