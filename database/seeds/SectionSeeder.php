<?php

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
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
        DB::table('sections')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('sections')->insert([
            ['name' => 'Sản phẩm mới', 'description' => 'Sản phẩm mới', 'order' => 1],
            ['name' => 'Sản phẩm giảm giá', 'description' => 'Sản phẩm giảm giá', 'order' => 2],
            ['name' => 'Sản phẩm bán chạy', 'description' => 'Sản phẩm bán chạy', 'order' => 3],
            ['name' => 'Sản phẩm nổi bật', 'description' => 'Sản phẩm nổi bật', 'order' => 4],
            ['name' => 'Sức khỏe', 'description' => 'Sức khỏe', 'order' => 5],
            ['name' => 'Chương trình giảm giá', 'description' => 'Chương trình giảm giá', 'order' => 6],
            ['name' => 'Ưu đãi khách hàng', 'description' => 'Ưu đãi khách hàng', 'order' => 7],
            ['name' => 'Slide', 'description' => 'Slide', 'order' => 8],
            ['name' => 'Thông tin', 'description' => 'Thông tin', 'order' => 9],
        ]);
    }
}
