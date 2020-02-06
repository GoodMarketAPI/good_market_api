<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
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
        DB::table('provinces')->truncate();
        DB::table('districts')->truncate();
        DB::table('wards')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $province_sql = file_get_contents(database_path() . '/seeds/provinces.sql');
        DB::statement($province_sql);

        $district_sql = file_get_contents(database_path() . '/seeds/districts.sql');
        DB::statement($district_sql);

        $ward_sql = file_get_contents(database_path() . '/seeds/wards.sql');
        DB::statement($ward_sql);
    }
}
