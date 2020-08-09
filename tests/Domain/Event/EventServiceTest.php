<?php

namespace Testing\Domain\Event;

use Domain\Event\Event;
use Domain\Event\EventService;
use Rapi\DevHelper\Testing\RapiAsserts;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group Event
 * @group Service
 */
class EventServiceTest extends \Tests\TestCase
{

    use RapiAsserts,
        DatabaseMigrations;

    /**
     * @return EventService
     */
    private function makeService()
    {
        return new EventService();
    }

    protected function getModelClass()
    {
        return Event::class;
    }

    protected function getTable()
    {
        return "app_events";
    }

    protected function getKeysCheckDB()
    {
        return ['id', 'deleted_at', 'name', 'description', 'start', 'end', 'type', 'price', 'category_id', 'img', 'address_id', 'merchant_id'];
    }

    private function getData($data = [])
    {
        //$faker = $this->makeFaker();
        //$data['name'] = $faker->name;
        return factory($this->getModelClass())->make($data)->toArray();
    }

    private function getDataUpdate($data = [])
    {
        $data['name'] = 'UPDATED-' . time();

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
