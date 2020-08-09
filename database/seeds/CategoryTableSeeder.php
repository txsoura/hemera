<?php

use Domain\Category\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class CategoryTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new Category())->getTable())->delete();

        $this->getData()->each(function ($data) {
            Category::create($data);
        });
    }

    private function getData(): Collection
    {
        // TODO: add and translate seed reasons
        return collect([
            [
                'title' => 'gastronomy',
                'img' => 'categories/mdi_gastronomy.svg',
            ],
            [
                'title' => 'musical',
                'img' => 'categories/mdi_musical.svg',
            ],    [
                'title' => 'cultural',
                'img' => 'categories/mdi_cultural.svg',
            ],    [
                'title' => 'online',
                'img' => 'categories/mdi_online.svg',
            ],    [
                'title' => 'drive in',
                'img' => 'categories/mdi_drive_in.svg',
            ],    [
                'title' => 'sport',
                'img' => 'categories/mdi_sport.svg',
            ]
        ]);
    }
}
