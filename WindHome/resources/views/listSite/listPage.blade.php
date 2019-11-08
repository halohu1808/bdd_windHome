@extends('layout.home')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div>
            @if(\Illuminate\Support\Facades\Session::has('unknowCity'))
                <p class="alert alert-danger"> {{\Illuminate\Support\Facades\Session::get('unknowCity')}} </p>
            @endif
        </div>


        <div class="card-deck row">

            @foreach($roomsSort as $key => $room)
                <div class="col-md-3 pt-5">
                    <img class="card-img-top" src="{{asset("storage/img/home/" .$room->thumbnail)}}">
                    <div class="card-body alert bg-white">
                        <a href="{{route('room.detail', $room->id)}}"><h5 style="text-transform: uppercase" class="card-title text-success font-weight-bold">{{$room->name}}</h5></a>
                       <div>
                           <p class="text-sm-left font-weight-lighter">{{$room->address}} , {{$room->city->name}}</p>
                       </div>
                        <hr>

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
                        <div class="row">
                            <div class="wrapper col-md-12">
                                <div class=""><i class="fas fa-user"></i></div>
                                <div class="pl-2">Số khách: {{$room->guest}}</div> {{--Số người--}}
                            </div>
                            <div class="wrapper col-md-12">
                                <div> <i class="fas fa-clock"></i></div>
                                <div class="pl-2">Thuê tối thiểu: {{$room->minRentTime}} tháng</div> {{--rating--}}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <a href="{{route('room.detail', $room->id)}}" class="btn btn-outline-primary btn-sm">Chi
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
