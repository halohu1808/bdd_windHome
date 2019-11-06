@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection

@section('content')
    <!-- Page Content  -->
    <div id="content">
        <div class="row">
            <div class="col-md-10">

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
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('delete') }}</p>
                    @endif

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h2>PHÒNG</h2>
                    </div>
                    <div class="col-md-6">
                        <form id="test" class="form-inline" style="float: right">
                            <input class="form-control mr-sm-2" type="search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm Kiếm</button>
                        </form>
                    </div>
                </div>

                <div class="row pt-5">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Area</th>
                            <th>Guest</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        @foreach($rooms as $room)
                            <tr>
                                <td><a href="{{route('admin.detail',$room->id)}}">{{$room->name}}</a></td>
                                <td>{{$room->address}}</td>
                                <td>{{number_format($room->pricePerMonth)}}</td>
                                <td>{{$room->area}}</td>
                                <td>{{$room->guest}}</td>
                                <td>{{$room->status->name}}</td>
                                <td><a href="{{route('room.edit',$room->id)}}"
                                       class="btn btn-outline-primary">Update</a></td>
                                <td><a href="{{route('room.destroy',$room->id)}}" class="btn btn-outline-secondary"
                                       onclick="return confirm('Bạn có muốn chắc chắn xóa không')">Delete</a></td>
                            </tr>
                            @endforeach
                            </tbody>

                    </table>
                </div>
                <a class="btn btn-outline-secondary" href="{{route('room.create')}}">Create</a>
            </div>

            <div class="col-md-2">

            </div>
        </div>

    </div>
@endsection
