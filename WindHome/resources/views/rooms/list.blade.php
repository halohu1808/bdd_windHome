<h1> List Phòng Cho Thuê </h1>
<table style="border: 1px">
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Price</th>
        <th>Bathroom</th>
        <th>Area</th>
        <th>Guest</th>
        <th>Parking</th>
        <th>Wifi</th>
        <th></th>
        <th></th>
    </tr>
    @foreach($rooms as $room)
        <tr>
            <td>{{$room->name}}</td>
            <td>{{$room->address}}</td>
            <td>{{$room->pricePerMonth}}</td>
            <td>{{$room->bathRoom}}</td>
            <td>{{$room->area}}</td>
            <td>{{$room->guest}}</td>
            <td>{{$room->parking}}</td>
            <td>{{$room->wifi}}</td>

            <td><a href="{{route('room.edit',$room->id)}}" >Update</a></td>
            <td><a href="{{route('room.destroy',$room->id)}}" >Delete</a></td>
        </tr>
    @endforeach
</table>
