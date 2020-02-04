<?php

use Illuminate\Database\Seeder;

class SaleProductSeeder extends Seeder
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
        DB::table('sale_products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('sale_products')->insert([
            [
                'product_id' => 1,
                'start'      => '2020-01-01',
                'end'        => '2020-12-31',
                'sale'       => 0.1,
            ],
            [
                'product_id' => 2,
                'start'      => '2020-01-01',
                'end'        => '2020-12-31',
                'sale'       => 0.15,
            ],
            [
                'product_id' => 3,
                'start'      => '2020-01-01',
                'end'        => '2020-12-31',
                'sale'       => 0.2,
            ],
            [
                'product_id' => 4,
                'start'      => '2020-01-01',
                'end'        => '2020-12-31',
                'sale'       => 0.05,
            ],
            [
                'product_id' => 5,
                'start'      => '2020-01-01',
                'end'        => '2020-12-31',
                'sale'       => 0.12,
            ],
        ]);
    }
}
