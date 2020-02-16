<?php

use Illuminate\Database\Seeder;

class ProductPreprocessingSeeder extends Seeder
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
        DB::table('product_preprocessings')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('product_preprocessings')->insert([
            [
                'product_id' => 1,
                'name' => 'Làm sạch, bảo quản ngăn mát',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 1,
                'name' => 'Rửa sạch, Cắt ngắn',
                'fee' => "2000",
                'unit' => "Gói",
            ],

            [
                'product_id' => 2,
                'name' => 'Làm sạch, bảo quản ngăn mát',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 2,
                'name' => 'Rửa sạch, Cắt ngắn',
                'fee' => "2000",
                'unit' => "Gói",
            ],

            [
                'product_id' => 3,
                'name' => 'Làm sạch, bảo quản ngăn mát',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 3,
                'name' => 'Rửa sạch, Tách lá',
                'fee' => "2000",
                'unit' => "Gói",
            ],

            [
                'product_id' => 4,
                'name' => 'Làm sạch, bảo quản ngăn mát',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 4,
                'name' => 'Tuốt lá, rửa sạch, cắt nhỏ',
                'fee' => "3000",
                'unit' => "Gói",
            ],

            [
                'product_id' => 5,
                'name' => 'Đóng vỉ, bảo quản ngăn mát',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 5,
                'name' => 'Gọt vỏ, rửa sạch',
                'fee' => "3000",
                'unit' => "Gói",
            ],

            [
                'product_id' => 6,
                'name' => 'Bảo quản mát',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 6,
                'name' => 'Rửa, cắt lát',
                'fee' => "1000",
                'unit' => "Trái",
            ],

            [
                'product_id' => 7,
                'name' => 'Lột sạch gốc, bảo quản mát',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 7,
                'name' => 'Rửa sạch, xắt nhuyễn',
                'fee' => "1000",
                'unit' => "Nhánh",
            ],

            [
                'product_id' => 8,
                'name' => 'Bảo quản mát',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 8,
                'name' => 'Rửa sạch, cắt gốc',
                'fee' => "2000",
                'unit' => "Vỉ",
            ],

            [
                'product_id' => 9,
                'name' => 'Làm sạch',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 9,
                'name' => 'Rửa sạch, chặt nhỏ',
                'fee' => "5000",
                'unit' => "Con",
            ],

            [
                'product_id' => 10,
                'name' => 'Làm sạch',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 10,
                'name' => 'Rửa sạch, chặt nhỏ',
                'fee' => "5000",
                'unit' => "Con",
            ],

            [
                'product_id' => 11,
                'name' => 'Làm sạch',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 11,
                'name' => 'Chặt nhỏ',
                'fee' => "10000",
                'unit' => "Con",
            ],

            [
                'product_id' => 12,
                'name' => 'Nguyên miếng',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 12,
                'name' => 'Xắt mỏng',
                'fee' => "5000",
                'unit' => "Miếng",
            ],
            [
                'product_id' => 12,
                'name' => 'Xắt cục',
                'fee' => NULL,
                'unit' => NULL,
            ],

            [
                'product_id' => 13,
                'name' => 'Nguyên cây',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 13,
                'name' => 'Xắt cục',
                'fee' => NULL,
                'unit' => NULL,
            ],
            [
                'product_id' => 13,
                'name' => 'Ướp nướng',
                'fee' => "5000",
                'unit' => "Vỉ",
            ],

            [
                'product_id' => 14,
                'name' => 'Nguyên trái',
                'fee' => NULL,
                'unit' => NULL,
            ],

            [
                'product_id' => 15,
                'name' => 'Đóng túi',
                'fee' => NULL,
                'unit' => NULL,
            ],

            [
                'product_id' => 16,
                'name' => 'Đóng túi',
                'fee' => NULL,
                'unit' => NULL,
            ],

            [
                'product_id' => 17,
                'name' => 'Nhiệt độ phòng',
                'fee' => NULL,
                'unit' => NULL,
            ],

            [
                'product_id' => 18,
                'name' => 'Bảo quản mát',
                'fee' => NULL,
                'unit' => NULL,
            ],

            [
                'product_id' => 19,
                'name' => 'Nhiệt độ phòng',
                'fee' => NULL,
                'unit' => NULL,
            ],

            [
                'product_id' => 20,
                'name' => 'Nhiệt độ phòng',
                'fee' => NULL,
                'unit' => NULL,
            ],

            [
                'product_id' => 21,
                'name' => 'Nhiệt độ phòng',
                'fee' => NULL,
                'unit' => NULL,
            ],

            [
                'product_id' => 22,
                'name' => 'Nhiệt độ phòng',
                'fee' => NULL,
                'unit' => NULL,
            ],
        ]);
    }
}
