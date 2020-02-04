<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
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
        DB::table('banners')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('banners')->insert([
            ['banner' => 'banner-1.jpg'],
            ['banner' => 'banner-2.jpg'],
            ['banner' => 'banner-3.jpg'],
            ['banner' => 'banner-4.jpg'],
        ]);
    }
}
