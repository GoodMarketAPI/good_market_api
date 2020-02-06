<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategorySeeder::class);
         $this->call(BannerSeeder::class);
         $this->call(SupplierSeeder::class);
         $this->call(ProductSeeder::class);
         $this->call(ProductPreprocessingSeeder::class);
         $this->call(LocationSeeder::class);
    }
}
