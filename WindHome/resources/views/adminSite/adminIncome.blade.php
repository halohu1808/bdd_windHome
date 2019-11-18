<?php $sum = 0 ?>
@extends('layout.home')
@section('sideBar')
    @include('adminSite.sideBarAdmin')
@endsection

@section('content')
    <div class="container">
        <h2 class="pt-4">Doanh Thu Thuê Phòng</h2>
        <div class="row pt-3">
            <table class="table table-hover">
                <thead class="thead-light">
                <tr>
                    <th>STT</th>
                    <th>Tên phòng</th>
                    <th>Người Thuê</th>
                    <th>Giá Tiền/tháng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contracts as $key=>$contract)

                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$contract->room->name}}</td>
                        <td>{{$contract->user->name}}</td>
                        <td>{{number_format($contract->room->pricePerMonth)}} VNĐ</td>
                        <?php $sum += (int)($contract->room->pricePerMonth)?>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="3" class="text-danger font-weight-bold" style="text-align: right" >Tổng tiền :</td>
                    <td class="text-danger font-weight-bold" >{{number_format($sum)}} VNĐ</td>
                </tr>
                </tbody>


            </table>
        </div>

    </div>

@endsection
