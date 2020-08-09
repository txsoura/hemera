<?php

use Domain\Address\Address;
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new Address)->getTable())->delete();
        factory(Address::class, 10)->create();
    }
}
