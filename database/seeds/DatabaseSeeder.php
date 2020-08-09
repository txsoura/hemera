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
        \DB::statement('SET foreign_key_checks = 0');

        $this->call(CategoryTableSeeder::class);

        if (App::environment(['local'])) {
            $this->call(AddressTableSeeder::class);
            $this->call(MerchantTableSeeder::class);
            $this->call(EventTableSeeder::class);
        }

        \DB::statement('SET foreign_key_checks = 1');
    }
}
