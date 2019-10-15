@extends('layout.home')

@section('sideBar')
    @include('listSite.filterSideBar')
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 ">
            <h1 class="card-title">{{$room->name}}</h1>
            <img class="card-img-top" src={{asset("storage/img/home/". $room->image)}} alt="Card image cap>
        </div>
        <div class="col-md-6">
            <div class="card-body bg-white">

                <p class="blockquote-footer"> @if(isset($room->status))
                        Còn Phòng @else
                        Đã Cho Thuê
                </p>
                @endif
                    <div class="wrapper col-md-2">
                        <div class=""><i class="fas fa-user"></i></div>
                        <div class="pl-2">{{$room->guest}}</div> {{--Số người--}}
                    </div>
                    <div class="wrapper col-md-2">
                        <div class=""><i class="fas fa-star"></i></div>
                        <div class="pl-2">4</div> {{--rating--}}
                    </div>
                </div>
            <div class="card-footer ">
            </div>
        </div>
    </div>
</div>
@endsection
