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
        $status=new Status();
        $status->status='Còn Phòng';
        $status->save();

        $status=new Status();
        $status->status='Đã Cho Thuê';
        $status->save();

        $status=new Status();
        $status->status='Đang Chờ Duyệt ';
        $status->save();

        $status=new Status();
        $status->status='Đang Chờ Hủy';
        $status->save();



    }
}
