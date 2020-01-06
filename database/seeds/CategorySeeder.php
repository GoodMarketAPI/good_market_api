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
            ['category' => 'Đi chợ Ngon mỗi ngày', 'parent_id' => NULL],
            ['category' => 'Ăn Vặt / Ăn Liền / Nấu Sẵn', 'parent_id' => NULL],
            ['category' => 'SP mới có tại chợ Ngon', 'parent_id' => NULL],
            ['category' => 'SP khuyến mại', 'parent_id' => NULL],
            ['category' => 'SP cần đặt trước', 'parent_id' => NULL],
            ['category' => 'Hàng tiêu dùng', 'parent_id' => NULL],

            // Level 2
            ['category' => 'Rau Củ Quả', 'parent_id' => 1],
            ['category' => 'Trái Cây', 'parent_id' => 1],
            ['category' => 'Thịt', 'parent_id' => 1],
            ['category' => 'Cá', 'parent_id' => 1],
            ['category' => 'Hải Sản', 'parent_id' => 1],
            ['category' => 'Trứng', 'parent_id' => 1],
            ['category' => 'Gia Vị Khô', 'parent_id' => 1],
            ['category' => 'Ngũ Cốc', 'parent_id' => 1],

            ['category' => 'SP Theo Định Kỳ', 'parent_id' => 5],
            ['category' => 'SP Quý Hiếm', 'parent_id' => 5],

            ['category' => 'Chăm Sóc Cơ Thể', 'parent_id' => 6],
            ['category' => 'Chất Tẩy Rửa', 'parent_id' => 6],
            ['category' => 'Dụng Cụ Nhà Bếp', 'parent_id' => 6],

            // Level 3
            ['category' => 'Rau Ăn Lá', 'parent_id' => 7],
            ['category' => 'Củ Quả', 'parent_id' => 7],
            ['category' => 'Gia Vị Tươi', 'parent_id' => 7],
            ['category' => 'Nấm Tươi', 'parent_id' => 7],

            ['category' => 'Trái Cây Việt Theo Mùa', 'parent_id' => 8],
            ['category' => 'Trái Cây Nhập khẩu', 'parent_id' => 8],

            ['category' => 'Heo', 'parent_id' => 9],
            ['category' => 'Bò', 'parent_id' => 9],
            ['category' => 'Gà', 'parent_id' => 9],
            ['category' => 'Vịt', 'parent_id' => 9],

            ['category' => 'Cá Đồng', 'parent_id' => 10],
            ['category' => 'Cá Sông', 'parent_id' => 10],
            ['category' => 'Cá Biển', 'parent_id' => 10],

            ['category' => 'Tôm', 'parent_id' => 11],
            ['category' => 'Cua / Ghẹ', 'parent_id' => 11],
            ['category' => 'Mực', 'parent_id' => 11],
            ['category' => 'Ốc', 'parent_id' => 11],

            ['category' => 'Trứng Gà Ta', 'parent_id' => 12],
            ['category' => 'Trứng Gà Omega', 'parent_id' => 12],
            ['category' => 'Trứng Vịt Đồng', 'parent_id' => 12],
            ['category' => 'Trứng Vịt Muối', 'parent_id' => 12],
            ['category' => 'Trứng Bắc Thảo', 'parent_id' => 12],
            ['category' => 'Trứng Cút', 'parent_id' => 12],

            ['category' => 'Đường', 'parent_id' => 13],
            ['category' => 'Muối', 'parent_id' => 13],
            ['category' => 'Nước Mắm', 'parent_id' => 13],
            ['category' => 'Nước Tương', 'parent_id' => 13],

            ['category' => 'Gạo', 'parent_id' => 14],
            ['category' => 'Mì Gói', 'parent_id' => 14],
            ['category' => 'Miến', 'parent_id' => 14],

        ]);
    }
}
