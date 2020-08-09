<?php

namespace Testing\Domain\Category;

use Domain\Category\Category;
use Domain\Category\CategoryService;
use Rapi\DevHelper\Testing\RapiAsserts;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group Category
 * @group Service
 */
class CategoryServiceTest extends \Tests\TestCase
{

    use RapiAsserts,
        DatabaseMigrations;

    /**
     * @return CategoryService
     */
    private function makeService()
    {
        return new CategoryService();
    }

    protected function getModelClass()
    {
        return Category::class;
    }

    protected function getTable()
    {
        return "app_categories";
    }

    protected function getKeysCheckDB()
    {
        return ['id', 'deleted_at', 'title', 'img'];
    }

    private function getData($data = [])
    {
        //$faker = $this->makeFaker();
        //$data['title'] = $faker->name;
        return factory($this->getModelClass())->make($data)->toArray();
    }

    private function getDataUpdate($data = [])
    {
        $data['title'] = 'UPDATED-' . time();

        return $data;
    }

    public function test_create()
    {
        $data = $this->getData();

        $this->makeService()
            ->setParams($data)
            ->create();

        $this->checkInDB($data);
    }

    public function test_update()
    {
        $model = $this->factory();

        $data = $this->getDataUpdate(['id' => $model->id]);

        $this->makeService()
            ->setParams($data)
            ->update($model);

        $this->checkInDB($data);
    }

    public function test_remove()
    {
        $model = $this->factory();

        $this->makeService()
            ->remove($model);

        $this->checkNotInDB(['id' => $model->id]);
    }
}
