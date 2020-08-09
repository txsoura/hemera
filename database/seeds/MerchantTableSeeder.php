<?php

use Domain\Merchant\Merchant;
use Illuminate\Database\Seeder;

class MerchantTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new Merchant)->getTable())->delete();
        factory(Merchant::class, 10)->create();
    }
}
