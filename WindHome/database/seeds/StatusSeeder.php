<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        $status->name = 'Còn Phòng';
        $status->save();

        $status = new Status();
        $status->name = 'Đã Cho Thuê';
        $status->save();

        $status = new Status();
        $status->name = 'Giữ Phòng';
        $status->save();

        $status = new Status();
        $status->name = 'Muốn Hủy Hợp Đồng';
        $status->save();

        $status = new Status();
        $status->name = 'Hợp Đồng Thực Thi';
        $status->save();

        $status = new Status();
        $status->name = 'Hợp Đồng Kết Thúc';
        $status->save();

        $status = new Status();
        $status->name = 'Khách Giữ Chỗ';
        $status->save();

        $status = new Status();
        $status->name = 'Khách Muốn Hủy Hợp Đồng';
        $status->save();

        $status = new Status();
        $status->name = "Sửa chữa";
        $status->save();


    }
}
