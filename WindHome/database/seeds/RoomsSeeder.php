<?php

use App\Room;
use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = new Room();
        $room->name = 'WindHome1';
        $room->address = 'Thanh Xuân';
        $room->cityId = 2;
        $room->pricePerMonth = 3000000;
        $room->minRentTime = 6;
        $room->electricFee = 4000;
        $room->waterFee = 10000;
        $room->trashFee = 50000;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->thumbnail="nha1.jpg";
        $room->linkmap="https://www.google.com/maps/place/B%E1%BA%A3o+t%C3%A0ng+D%C3%A2n+t%E1%BB%99c+h%E1%BB%8Dc+Vi%E1%BB%87t+Nam/@21.022736,105.801944,13z/data=!4m13!1m7!3m6!1s0x3135ab9bd9861ca1:0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!3b1!8m2!3d21.0277644!4d105.8341598!3m4!1s0x3135ab394353b821:0x47c950bb0f081a1c!8m2!3d21.0406474!4d105.7985115?hl=vi-VN";
        $room->statusId = 1;
        $room->description = "Trải nghiệm dịch vụ đẳng cấp thế giới ở Flamingo Dai Lai Resort
Flamingo Dai Lai Resort có các biệt thự sang trọng nằm giữa một phong cảnh yên bình ở thị trấn Phúc Yên. Nằm trong bán kính chỉ 1,5 km từ Sân Gôn Đại Lải, nơi nghỉ này có hồ bơi ngoài trời và nhà hàng ngay trong khuôn viên. Khách có thể truy cập Wi-Fi miễn phí tại đây.

Cung cấp một nơi trú ẩn, các biệt thự hiện đại có sàn lát gạch và những tấm ốp tường bằng gỗ. Các biệt thự được trang bị cả máy lạnh lẫn máy sưởi, truyền hình cáp màn hình phẳng và minibar. Ngoài ra còn có khu vực tiếp khách. Phòng tắm riêng rộng rãi đi kèm với vòi sen, bồn tắm và đồ vệ sinh cá nhân miễn phí. Mỗi biệt thự còn được cung cấp 2 xe đạp miễn phí để khách có thể khám phá khu vực.

Du khách có thể đi bộ xung quanh khu vườn kiểng xinh đẹp. Tiện nghi nướng thịt ngoài trời, spa và bida được cung cấp với một khoản phí. Dai Lai Resor cũng có sân chơi cho trẻ em. Nhà hàng Bamboo Wings phục vụ các món ăn Việt Nam và quốc tế suốt cả ngày. Dịch vụ ăn uống tại phòng cũng được cung cấp cho khách.

Chùa Tây Thiên nằm cách chỗ ở này 15 km. Resort nằm trong bán kính 20 km từ Sân bay Quốc tế Nội Bài và 45 km từ trung tâm thành phố Hà Nội.

Các cặp đôi đặc biệt thích địa điểm này — họ cho điểm 8,1 cho kỳ nghỉ dành cho 2 người.

Chúng tôi sử dụng ngôn ngữ của bạn!

Flamingo Dai Lai Resort đã chào đón khách Booking.com từ Ngày 25 Tháng 2 Năm 2013.";
        $room->save();

        $room = new Room();
        $room->name = 'WindHome2';
        $room->address = 'Cầu Giấy';
        $room->cityId = 2;
        $room->pricePerMonth = 2000000;
        $room->minRentTime = 6;
        $room->electricFee = 4000;
        $room->waterFee = 10000;
        $room->trashFee = 50000;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->thumbnail="nha2.jpg";
        $room->linkmap="https://www.google.com/maps/place/B%E1%BA%A3o+t%C3%A0ng+D%C3%A2n+t%E1%BB%99c+h%E1%BB%8Dc+Vi%E1%BB%87t+Nam/@21.022736,105.801944,13z/data=!4m13!1m7!3m6!1s0x3135ab9bd9861ca1:0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!3b1!8m2!3d21.0277644!4d105.8341598!3m4!1s0x3135ab394353b821:0x47c950bb0f081a1c!8m2!3d21.0406474!4d105.7985115?hl=vi-VN";
        $room->statusId = 1;
        $room->description = "Trải nghiệm dịch vụ đẳng cấp thế giới ở Flamingo Dai Lai - Forest In The Sky
Flamingo Dai Lai - Forest In The Sky có nhà hàng, bể bơi ngoài trời, trung tâm thể dục và quán bar ở Ngọc Quang. Resort 5 sao này có vườn và phòng nghỉ gắn máy điều hòa với Wi-Fi miễn phí cùng phòng tắm riêng. Chỗ nghỉ có thể sắp xếp chỗ đỗ xe riêng kèm phụ phí.

Tất cả phòng nghỉ tại resort đều có khu vực ghế ngồi và TV màn hình phẳng.

Flamingo Dai Lai - Forest In The Sky phục vụ bữa sáng tự chọn hàng ngày.

Nhân viên thông thạo tiếng Anh và tiếng Việt tại lễ tân 24 giờ có thể hỗ trợ quý khách lên kế hoạch cho kỳ nghỉ.

Sân bay gần nhất là sân bay quốc tế Nội Bài, cách đó 35 km.

Chúng tôi sử dụng ngôn ngữ của bạn!

Flamingo Dai Lai - Forest In The Sky đã chào đón khách Booking.com từ Ngày 14 Tháng 6 Năm 2018.";
        $room->save();

        $room = new Room();
        $room->name = 'WindHome3';
        $room->address = 'Ba Đình';
        $room->cityId = 2;
        $room->pricePerMonth = 1500000;
        $room->minRentTime = 6;
        $room->electricFee = 4000;
        $room->waterFee = 10000;
        $room->trashFee = 50000;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->thumbnail="nha3.jpg";
        $room->linkmap="https://www.google.com/maps/place/B%E1%BA%A3o+t%C3%A0ng+D%C3%A2n+t%E1%BB%99c+h%E1%BB%8Dc+Vi%E1%BB%87t+Nam/@21.022736,105.801944,13z/data=!4m13!1m7!3m6!1s0x3135ab9bd9861ca1:0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!3b1!8m2!3d21.0277644!4d105.8341598!3m4!1s0x3135ab394353b821:0x47c950bb0f081a1c!8m2!3d21.0406474!4d105.7985115?hl=vi-VN";
        $room->statusId = 1;
        $room->description = "Happy Villa Royal Bird by Flamingo Villa Owner ở thôn Ngọc Quang này cung cấp chỗ nghỉ, xe đạp/xe máy miễn phí, hồ bơi ngoài trời theo mùa, trung tâm thể dục, quán bar và khu vườn. Biệt thự cũng có tầm nhìn ra vườn và Wi-Fi miễn phí trong toàn khuôn viên.

Tất cả phòng nghỉ tại đây đều có khu vực ghế ngồi, truyền hình cáp màn hình phẳng và phòng tắm riêng với máy sấy tóc, chậu rửa vệ sinh (bidet), vòi sen cùng bồn tắm.

Biệt thự có tiện nghi BBQ.

Trong khuôn viên có công viên nước và du khách có thể đạp xe cũng như câu cá trong khu vực.

Sân bay gần nhất là sân bay quốc tế Nội Bài, cách đó 35 km.

Happy Villa Royal Bird by Flamingo Villa Owner đã chào đón khách Booking.com từ Ngày 24 Tháng 2 Năm 2017.";
        $room->save();

        $room = new Room();
        $room->name = 'WindHome4';
        $room->address = 'Đống Đa';
        $room->cityId = 2;
        $room->pricePerMonth = 1500000;
        $room->minRentTime = 6;
        $room->electricFee = 4000;
        $room->waterFee = 10000;
        $room->trashFee = 50000;
        $room->bathRoom = True;
        $room->area = 50;
        $room->guest = 3;
        $room->parking = True;
        $room->wifi = True;
        $room->cooking = True;
        $room->airCondition = True;
        $room->thumbnail="nha4.jpg";
        $room->linkmap="https://www.google.com/maps/place/B%E1%BA%A3o+t%C3%A0ng+D%C3%A2n+t%E1%BB%99c+h%E1%BB%8Dc+Vi%E1%BB%87t+Nam/@21.022736,105.801944,13z/data=!4m13!1m7!3m6!1s0x3135ab9bd9861ca1:0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!3b1!8m2!3d21.0277644!4d105.8341598!3m4!1s0x3135ab394353b821:0x47c950bb0f081a1c!8m2!3d21.0406474!4d105.7985115?hl=vi-VN";
        $room->statusId = 1;
        $room->description = " Một trong những chỗ nghỉ bán chạy nhất ở Ngọc Quang của chúng tôi!
Nằm ở thôn Ngọc Quang, Biệt thự ven hồ Lake side Forest cung cấp chỗ nghỉ với nhà hàng.

Biệt thự có sân chơi cho trẻ em.

Khách tại biệt thự có thể đi câu cá gần đó hoặc thư giãn trong khu vườn.

Chỗ nghỉ nằm cách thành phố Hà Nội 49 km. Sân bay gần nhất là Sân bay Quốc tế Nội Bài, cách đó 24 km.

Chúng tôi sử dụng ngôn ngữ của bạn!

Biệt thự ven hồ Lake side Forest đã chào đón khách Booking.com từ Ngày 17 Tháng 4 Năm 2019.";
        $room->save();
    }
}
