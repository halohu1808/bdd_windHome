@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection

@section('content')
    <!-- Page Content  -->
    <div id="content">

        <div class="col-12">
            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

        </div>
        <div class="col-12">
            @if (Session::has('update'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('update') }}</p>
            @endif

        </div>
        <div class="col-12">
            @if (Session::has('create'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('create') }}</p>
            @endif

        </div>
        <div class="col-12">
            @if (Session::has('delete'))
                <p class="p-3 mb-2 bg-danger text-white {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('delete') }}</p>
            @endif

        </div>
        <div class="col-12">
            @if (Session::has('createContract'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('createContract') }}</p>
            @endif

        </div>
        <div class="col-12">
            @if (Session::has('contractCancel'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('contractCancel') }}</p>
            @endif

        </div>
        <div class="col-12">
            @if (Session::has('underContract'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('underContract') }}</p>
            @endif

        </div>
        <div class="col-12">
            @if (Session::has('hasRoom'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('hasRoom') }}</p>
            @endif

        </div>
        <div class="col-12">
            @if (Session::has('extensionUpdate'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('extensionUpdate') }}</p>
            @endif
        </div>
        <div class="col-12">
            @if (Session::has('endContract'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('endContract') }}</p>
            @endif
        </div>
        <div class="col-12">
            @if (Session::has('cancelEndByAdmin'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('cancelEndByAdmin') }}</p>
            @endif
        </div>
        <div class="col-12">
            @if (Session::has('end'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('end') }}</p>
            @endif
        </div>


        <div class="row">
            <div class="col-md-6">
                <h2>PHÒNG</h2>
            </div>
{{--            <div class="col-md-6">--}}
{{--                <form id="test" class="form-inline" style="float: right">--}}
{{--                    <input class="form-control mr-sm-2" type="search" aria-label="Search">--}}
{{--                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm Kiếm</button>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
        <div class="pt-4">
            <a class="btn btn-outline-secondary" href="{{route('room.create')}}">Tạo phòng mới</a>
        </div>
        <div class="row pt-4">

            <br>
            <table class="table table-hover pt-4">
                <thead class="thead-light">
                <tr>
                    <th>Tên phòng</th>
                    <th>Địa chỉ</th>
                    <th style = text-align:center>Giá phòng/tháng</th>
                    <th style = text-align:center>Diện tích</th>
                    <th style = text-align:center>Số người tối đa</th>
                    <th style = text-align:center>Trạng thái phòng</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                @foreach($rooms as $room)
                    <tr>
                        <td><a href="{{route('admin.detail',$room->id)}}">{{$room->name}}</a></td>
                        <td>{{$room->address}}</td>
                        <td style = text-align:center>{{number_format($room->pricePerMonth)}} vnđ</td>
                        <td style = text-align:center>{{$room->area}} m²</td>
                        <td style = text-align:center>{{$room->guest}}</td>
                        <td style = text-align:center>{{$room->status->name}}</td>
                        <td><a href="{{route('room.edit',$room->id)}}" class="btn btn-outline-primary">Cập nhật</a></td>
                        <td><a href="{{route('room.destroy',$room->id)}}" class="btn btn-outline-secondary"
                               onclick="return confirm('Bạn có muốn chắc chắn xóa không')">Xóa</a></td>
                    </tr>
                    @endforeach
                    </tbody>

            </table>
        </div>


    </div>
@endsection
