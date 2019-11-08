@extends('layout.home')

@section('content')
{{--    <div class="container-fluid img-fluid"--}}
{{--         style="background-image: url('http://travelhdwallpapers.com/wp-content/uploads/2014/05/Sydney-Harbour-Bridge-11.jpg');background-repeat: no-repeat; max-width: 100% ; height: 800px ">--}}
{{--        --}}{{--    <div class="container-fluid img-fluid" style="background-image: url('http://travelhdwallpapers.com/wp-content/uploads/2014/05/Sydney-Harbour-Bridge-11.jpg');background-repeat: no-repeat; max-width: 100% ; height: 800px ">--}}
{{--        --}}{{--    <img src="https://wallpaperaccess.com/full/819798.jpg" class="img-fluid" alt="Responsive image">--}}

{{--        <div class="row pt-5 ">--}}
{{--            <div class="col-md-4">--}}

{{--            </div>--}}
{{--            <div class="col-md-4 bg-light border rounded">--}}

{{--                <form class="p-3 rounded">--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Địa điểm</label>--}}
{{--                        <input type="text" class="form-control" name="where" placeholder="">--}}
{{--                        <small class="form-text text-muted">Bạn muốn thuê nhà ở đâu?</small>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="exampleFormControlSelect1">Số người</label>--}}
{{--                        <select class="form-control" name="guest">--}}
{{--                            <option>1</option>--}}
{{--                            <option>2</option>--}}
{{--                            <option>3</option>--}}
{{--                            <option>4</option>--}}
{{--                            <option>5</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    --}}{{--                <button type="submit" class="btn btn-outline-secondary">Tìm</button>--}}
{{--                    <a class="btn btn-outline-secondary" href="{{route("room.list")}}"> Tìm Kiếm</a>--}}
{{--                </form>--}}

{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}



<video id="video_background" preload="auto" autoplay loop="loop"  volume="1">
    <source src={{asset("video/home.mp4")}} type="video/webm"/>
    <source src="{{asset("video/home.mp4")}}" type="video/ogg ogv"; codecs="theora, vorbis"/>
    <source src="{{asset("video/home.mp4")}}" type="video/mp4"/>
</video>
@endsection
