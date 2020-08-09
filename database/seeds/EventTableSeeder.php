<?php

use Domain\Address\Address;
use Domain\Category\Category;
use Domain\Event\Event;
use Domain\Merchant\Merchant;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * @var \Illuminate\Support\Collection
     */
    private $merchants;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $categories;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $addresses;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->merchants = Merchant::pluck('id');
        $this->categories = Category::pluck('id');
        $this->addresses = Address::pluck('id');

        $this->merchants->each(function ($merchant) {

            factory(Event::class, rand(1, 4))
                ->create([
                    'merchant_id' => $merchant,
                    'category_id' => $this->categories->random(),
                    'address_id' => $this->addresses->random(),
                ]);
        });
    }
}
