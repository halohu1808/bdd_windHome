@extends('layout.home')
@section('sideBar')
    @include('userSite.sideBarUser')
@endsection

@section('content')
    <!-- Page Content  -->
    <div id="content">

        <div class="row">
            <div class="col-md-6">
                <h2></h2>
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
                        <td><a href="{{route('userSite.roomDetail',$room->id)}}" >{{$room->name}}</a></td>
                        <td>{{$room->address}}</td>
                        <td>{{number_format($room->pricePerMonth)}}</td>
                        <td>{{$room->area}}</td>
                        <td>{{$room->guest}}</td>
                        <td>{{$room->status->name}}</td>

                        <td><a class="btn btn-outline-secondary" href="{{route('room.edit',$room->id)}}">Update</a></td>
                        <td><a class="btn btn-outline-secondary" href="{{route('room.destroy',$room->id)}}">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>

            </table>
        </div>


    </div>



@endsection





