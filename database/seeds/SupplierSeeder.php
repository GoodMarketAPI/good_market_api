<?php

use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
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
        DB::table('suppliers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('suppliers')->insert([
            ['name' => 'Chị Nhàn'],
            ['name' => 'Chị Vân'],
            ['name' => 'Chị Ngọc'],
            ['name' => 'A Châu'],
            ['name' => 'A Châu'],
            ['name' => 'Chị Thắm'],
            ['name' => 'Chị Hạnh'],
            ['name' => 'Chị Minh'],
            ['name' => 'CTY HM'],
            ['name' => 'CTY ANGIA'],
        ]);
    }
}
