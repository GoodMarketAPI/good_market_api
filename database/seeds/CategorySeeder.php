<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('categories')->insert([

            // Level 1
            ['category' => 'Thực Phẩm', 'parent_id' => NULL],
            ['category' => 'Hàng Tiêu Dùng', 'parent_id' => NULL],

            // Level 2
            ['category' => 'Thực Phẩm Tươi', 'parent_id' => 1],
            ['category' => 'Thực Phẩm Khô', 'parent_id' => 1],
            ['category' => 'Trái Cây/Ăn Vặt', 'parent_id' => 1],
            ['category' => 'Thực Phẩm Nhập', 'parent_id' => 1],

            ['category' => 'Chăm Sóc Cơ Thể', 'parent_id' => 2],
            ['category' => 'Chất Tẩy Rửa', 'parent_id' => 2],

            // Level 3
            ['category' => 'Thịt', 'parent_id' => 3],
            ['category' => 'Cá', 'parent_id' => 3],
            ['category' => 'Hải Sản', 'parent_id' => 3],
            ['category' => 'Chế Biến Sẵn', 'parent_id' => 3],
            ['category' => 'Rau Củ Quả Tươi', 'parent_id' => 3],
            ['category' => 'Nấm/Gia vị Tươi', 'parent_id' => 3],

            ['category' => 'Ngũ Cốc', 'parent_id' => 4],
            ['category' => 'Mì/Miến/Bún Khô', 'parent_id' => 4],
            ['category' => 'Hàng Khô', 'parent_id' => 4],

            ['category' => 'Trái Cây', 'parent_id' => 5],
            ['category' => 'Ăn Vặt', 'parent_id' => 5],

            ['category' => 'Thực Phẩm Nhật Bản', 'parent_id' => 6],
            ['category' => 'Thực Phẩm Mỹ', 'parent_id' => 6],

            ['category' => 'Dân Gian', 'parent_id' => 7],
            ['category' => 'Theo Công Nghệ', 'parent_id' => 7],

            // Level 4
            ['category' => 'Thịt Heo', 'parent_id' => 9],
            ['category' => 'Thịt Bò', 'parent_id' => 9],
            ['category' => 'Gà/Vịt', 'parent_id' => 9],

            ['category' => 'Cá Đồng', 'parent_id' => 10],
            ['category' => 'Cá Sông', 'parent_id' => 10],
            ['category' => 'Cá Biển', 'parent_id' => 10],

            ['category' => 'Tôm', 'parent_id' => 11],
            ['category' => 'Mực', 'parent_id' => 11],
            ['category' => 'Khô/Mắm', 'parent_id' => 11],

            ['category' => 'Hàng Đông Lạnh', 'parent_id' => 12],
            ['category' => 'Thịt Nguội', 'parent_id' => 12],

            ['category' => 'Rau Ăn Lá', 'parent_id' => 13],
            ['category' => 'Củ Quả', 'parent_id' => 13],

            ['category' => 'Nấm', 'parent_id' => 14],
            ['category' => 'Gia Vị Tươi', 'parent_id' => 14],

            ['category' => 'Gạo Nếp', 'parent_id' => 15],
            ['category' => 'Đậu', 'parent_id' => 15],

            ['category' => 'Mì Gói', 'parent_id' => 16],
            ['category' => 'Miến', 'parent_id' => 16],
            ['category' => 'Bún', 'parent_id' => 16],

            ['category' => 'Nấm Khô', 'parent_id' => 17],
            ['category' => 'Gia Vị Khô', 'parent_id' => 17],
            ['category' => 'Bột', 'parent_id' => 17],

            ['category' => 'Trái Cây Nhập', 'parent_id' => 18],
            ['category' => 'Trái VN Theo Mùa', 'parent_id' => 18],

            ['category' => 'Ăn Vặt Khô', 'parent_id' => 19],
            ['category' => 'Ăn Vặt Tươi', 'parent_id' => 19],
            ['category' => 'Ăn Liền Trong Ngày', 'parent_id' => 19],

            ['category' => 'Bánh Kẹo', 'parent_id' => 20],
            ['category' => 'Sữa/Tã', 'parent_id' => 20],
            ['category' => 'Hải Sản', 'parent_id' => 20],

            ['category' => 'Thịt Bò', 'parent_id' => 21],
            ['category' => 'Gà', 'parent_id' => 21],

            ['category' => 'Tóc', 'parent_id' => 22],
            ['category' => 'Da Mặt', 'parent_id' => 22],
            ['category' => 'Cơ Thể', 'parent_id' => 22],

            ['category' => 'Tóc', 'parent_id' => 23],
            ['category' => 'Da Mặt', 'parent_id' => 23],
            ['category' => 'Cơ Thể', 'parent_id' => 23],

            // Level 5
            ['category' => 'Ba Chỉ', 'parent_id' => 24],
            ['category' => 'Sườn Non', 'parent_id' => 24],
            ['category' => 'Cốt Lết', 'parent_id' => 24],
            ['category' => 'Chân Giò', 'parent_id' => 24],
            ['category' => 'Bao Tử', 'parent_id' => 24],
            ['category' => 'Tim', 'parent_id' => 24],
            ['category' => 'Gan', 'parent_id' => 24],
            ['category' => 'Xương', 'parent_id' => 24],

            ['category' => 'Thăn Bò', 'parent_id' => 25],
            ['category' => 'Phile', 'parent_id' => 25],
            ['category' => 'Đuôi', 'parent_id' => 25],
            ['category' => 'Sườn Bò', 'parent_id' => 25],

            ['category' => 'Gà Tre', 'parent_id' => 26],
            ['category' => 'Gà Nòi', 'parent_id' => 26],
            ['category' => 'Gà Cồ', 'parent_id' => 26],
            ['category' => 'Gà Núi', 'parent_id' => 26],
            ['category' => 'Vịt Xiêm', 'parent_id' => 26],
            ['category' => 'Vịt Cỏ', 'parent_id' => 26],
            ['category' => 'Vịt Trời', 'parent_id' => 26],

            ['category' => 'Cá Lóc', 'parent_id' => 27],
            ['category' => 'Cá Kèo', 'parent_id' => 27],
            ['category' => 'Cá Bóng Dừa', 'parent_id' => 27],

            ['category' => 'Cá Hú', 'parent_id' => 28],
            ['category' => 'Cá Lăn', 'parent_id' => 28],
            ['category' => 'Cá Bông Lau', 'parent_id' => 28],

            ['category' => 'Cá Thu', 'parent_id' => 29],
            ['category' => 'Cá Bớp', 'parent_id' => 29],
            ['category' => 'Cá Nục', 'parent_id' => 29],
            ['category' => 'Cá Bạc Má', 'parent_id' => 29],

            ['category' => 'Tôm Đất', 'parent_id' => 30],
            ['category' => 'Tôm Sú', 'parent_id' => 30],
            ['category' => 'Tôm Chì', 'parent_id' => 30],


            ['category' => 'Mực Ống', 'parent_id' => 31],
            ['category' => 'Mực Lá', 'parent_id' => 31],
            ['category' => 'Mực Ghim', 'parent_id' => 31],
            ['category' => 'Mực Nang', 'parent_id' => 31],

            ['category' => 'Khô Sặc', 'parent_id' => 32],
            ['category' => 'Khô Cá Lóc', 'parent_id' => 32],
            ['category' => 'Cá Dứa 1 Nắng', 'parent_id' => 32],
            ['category' => 'Cá Đù 1 Nắng', 'parent_id' => 32],
            ['category' => 'Mắm Cá Sặc', 'parent_id' => 32],
            ['category' => 'Mắm Cá Linh', 'parent_id' => 32],
            ['category' => 'Mắm Cá Thu', 'parent_id' => 32],

            ['category' => 'Há Cảo', 'parent_id' => 33],
            ['category' => 'Bánh Bao', 'parent_id' => 33],
            ['category' => 'Xíu Mại', 'parent_id' => 33],
            ['category' => 'Bò Kho', 'parent_id' => 33],
            ['category' => 'Thịt Kho Trứng', 'parent_id' => 33],
            ['category' => 'Sườn Ram', 'parent_id' => 33],
            ['category' => 'Gà Kho Gừng', 'parent_id' => 33],

            ['category' => 'Giò Thủ', 'parent_id' => 34],
            ['category' => 'Nem Bì', 'parent_id' => 34],
            ['category' => 'Thịt Trứng Muối', 'parent_id' => 34],

            ['category' => 'Rau Muống', 'parent_id' => 35],
            ['category' => 'Cải Xanh', 'parent_id' => 35],
            ['category' => 'Cải Ngọt', 'parent_id' => 35],
            ['category' => 'Rau Dền', 'parent_id' => 35],
            ['category' => 'Mùng Tơi', 'parent_id' => 35],
            ['category' => 'Cải Thìa', 'parent_id' => 35],

            ['category' => 'Bầu', 'parent_id' => 36],
            ['category' => 'Bí', 'parent_id' => 36],
            ['category' => 'Mướp', 'parent_id' => 36],
            ['category' => 'Khổ Qua', 'parent_id' => 36],
            ['category' => 'Dưa Leo', 'parent_id' => 36],
            ['category' => 'Cà Rốt', 'parent_id' => 36],
            ['category' => 'Khoai Tây', 'parent_id' => 36],

            ['category' => 'Nấm Mỡ', 'parent_id' => 37],
            ['category' => 'Nấm Bào Ngư', 'parent_id' => 37],
            ['category' => 'Nấm Kim Châm', 'parent_id' => 37],

            ['category' => 'Hành', 'parent_id' => 38],
            ['category' => 'Ngò', 'parent_id' => 38],
            ['category' => 'Chanh', 'parent_id' => 38],
            ['category' => 'Thơm', 'parent_id' => 38],
            ['category' => 'Me Vắt', 'parent_id' => 38],
            ['category' => 'Ớt', 'parent_id' => 38],

            ['category' => 'Gạo Nàng Hương', 'parent_id' => 39],
            ['category' => 'Gạo Thơm', 'parent_id' => 39],
            ['category' => 'Nếp Bắc', 'parent_id' => 39],
            ['category' => 'Nếp Hương', 'parent_id' => 39],

            ['category' => 'Đậu Xanh', 'parent_id' => 40],
            ['category' => 'Đậu Đỏ', 'parent_id' => 40],
            ['category' => 'Đậu Nành', 'parent_id' => 40],
            ['category' => 'Đậu Phộng', 'parent_id' => 40],
            ['category' => 'Đậu Lăng', 'parent_id' => 40],
            ['category' => 'Đậu Gà', 'parent_id' => 40],

            ['category' => 'Mì Tôm Khô', 'parent_id' => 41],
            ['category' => 'Mì Cay', 'parent_id' => 41],
            ['category' => 'Mì Bò', 'parent_id' => 41],
            ['category' => 'Mì Gà', 'parent_id' => 41],
            ['category' => 'Mì Heo', 'parent_id' => 41],

            ['category' => 'Phú Hương', 'parent_id' => 42],
            ['category' => 'Miến Dong', 'parent_id' => 42],
            ['category' => 'Miến Dong Đỏ', 'parent_id' => 42],

            ['category' => 'Bún Gạo', 'parent_id' => 43],
            ['category' => 'Bún Lứt', 'parent_id' => 43],
            ['category' => 'Bún Trắng', 'parent_id' => 43],
            ['category' => 'Bún Bò Huế', 'parent_id' => 43],
            ['category' => 'Bánh Hỏi Kho', 'parent_id' => 43],
            ['category' => 'Hủ Tiếu Khô', 'parent_id' => 43],
            ['category' => 'Bánh Phở Khô', 'parent_id' => 43],

            ['category' => 'Nấm Đông Cô Khô', 'parent_id' => 44],
            ['category' => 'Nấm Mèo Khô', 'parent_id' => 44],
            ['category' => 'Nấm Hương Khô', 'parent_id' => 44],

            ['category' => 'Bột Cari', 'parent_id' => 45],
            ['category' => 'Bột Ngũ Vị', 'parent_id' => 45],
            ['category' => 'Đường', 'parent_id' => 45],
            ['category' => 'Muối', 'parent_id' => 45],
            ['category' => 'Nước Mắm', 'parent_id' => 45],
            ['category' => 'Nước Tương', 'parent_id' => 45],
            ['category' => 'Dầu Ăn', 'parent_id' => 45],

            ['category' => 'Bột Mì', 'parent_id' => 46],
            ['category' => 'Bột Năng', 'parent_id' => 46],
            ['category' => 'Bột Gạo', 'parent_id' => 46],
            ['category' => 'Bột Nếp', 'parent_id' => 46],

            ['category' => 'Táo', 'parent_id' => 47],
            ['category' => 'Lê Hàn Quốc', 'parent_id' => 47],
            ['category' => 'Nho Mỹ', 'parent_id' => 47],
            ['category' => 'Cherry Úc', 'parent_id' => 47],

            ['category' => 'Cam', 'parent_id' => 48],
            ['category' => 'Quýt', 'parent_id' => 48],
            ['category' => 'Ổi', 'parent_id' => 48],
            ['category' => 'Chuối', 'parent_id' => 48],
            ['category' => 'Bưởi', 'parent_id' => 48],

            ['category' => 'Chà Bông', 'parent_id' => 49],
            ['category' => 'Kẹo Hạt Điều', 'parent_id' => 49],
            ['category' => 'Kẹo Mè', 'parent_id' => 49],
            ['category' => 'Bánh Phục Linh', 'parent_id' => 49],
            ['category' => 'Dâu Tây Sấy Giòn', 'parent_id' => 49],

            ['category' => 'Yaourt', 'parent_id' => 50],
            ['category' => 'Kem Chuối', 'parent_id' => 50],
            ['category' => 'Bánh Flan', 'parent_id' => 50],
            ['category' => 'Sương Sâm', 'parent_id' => 50],
            ['category' => 'Rau Câu', 'parent_id' => 50],

            ['category' => 'Bún Thịt Xào', 'parent_id' => 51],
            ['category' => 'Bánh Mì', 'parent_id' => 51],
            ['category' => 'Bún Chả Giò', 'parent_id' => 51],

            ['category' => 'Mochi', 'parent_id' => 52],
            ['category' => 'Bánh Khoai', 'parent_id' => 52],
            ['category' => 'Bánh Doraemon', 'parent_id' => 52],

            ['category' => 'Sữa Magi', 'parent_id' => 53],
            ['category' => 'Tã Size M', 'parent_id' => 53],
            ['category' => 'Tã Size L', 'parent_id' => 53],

            ['category' => 'Bạch Tuột', 'parent_id' => 54],
            ['category' => 'Còi Sò', 'parent_id' => 54],
            ['category' => 'Gừng Chua', 'parent_id' => 54],

            ['category' => 'Thăn Bò Mỹ', 'parent_id' => 55],
            ['category' => 'Đùi Bò Mỹ', 'parent_id' => 55],
            ['category' => 'Phile Bò Mỹ', 'parent_id' => 55],

            ['category' => 'Cánh Gà Mỹ', 'parent_id' => 56],
            ['category' => 'Đùi Gà Mỹ', 'parent_id' => 56],
            ['category' => 'Chân Gà Mỹ', 'parent_id' => 56],

            ['category' => 'Trái Bồ Kết Nướng', 'parent_id' => 57],
            ['category' => 'Dầu Gội Bồ Kết', 'parent_id' => 57],
            ['category' => 'Dầu Gội Bưởi', 'parent_id' => 57],

            ['category' => 'Bột Cám Gạo', 'parent_id' => 58],
            ['category' => 'Bột Yến Mạch', 'parent_id' => 58],
            ['category' => 'Bột Đậu Đỏ', 'parent_id' => 58],

            ['category' => 'Lá Bưởi', 'parent_id' => 59],
            ['category' => 'Lá Sả', 'parent_id' => 59],
            ['category' => 'Lá Ngãi Cứu', 'parent_id' => 59],

            ['category' => 'Bột Gội Và Dưỡng Kose', 'parent_id' => 60],
            ['category' => 'Tinh Dầu Bưởi', 'parent_id' => 60],
            ['category' => 'Tinh Dầu Dừa', 'parent_id' => 60],

            ['category' => 'SRM Nghệ', 'parent_id' => 61],
            ['category' => 'Lotion Dưỡng Ẩm', 'parent_id' => 61],
            ['category' => 'Dưỡng Ban Đêm', 'parent_id' => 61],

            ['category' => 'Tẩy Tế Bào Chết', 'parent_id' => 62],
            ['category' => 'Dưỡng Ẩm Body', 'parent_id' => 62],
            ['category' => 'Tinh Dầu Thư Giãn', 'parent_id' => 62],


        ]);
    }
}
