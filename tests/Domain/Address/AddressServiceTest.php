<?php

namespace Testing\Domain\Address;

use Domain\Address\Address;
use Domain\Address\AddressService;
use Rapi\DevHelper\Testing\RapiAsserts;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group Address
 * @group Service
 */
class AddressServiceTest extends \Tests\TestCase
{

    use RapiAsserts,
        DatabaseMigrations;

    /**
     * @return AddressService
     */
    private function makeService()
    {
        return new AddressService();
    }

    protected function getModelClass()
    {
        return Address::class;
    }

    protected function getTable()
    {
        return "app_addresses";
    }

    protected function getKeysCheckDB()
    {
        return ['id', 'deleted_at', 'latitude', 'longitude', 'number', 'city', 'state'];
    }

    private function getData($data = [])
    {
        //$faker = $this->makeFaker();
        //$data['latitude'] = $faker->name;
        return factory($this->getModelClass())->make($data)->toArray();
    }

    private function getDataUpdate($data = [])
    {
        $data['latitude'] = 'UPDATED-' . time();

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
