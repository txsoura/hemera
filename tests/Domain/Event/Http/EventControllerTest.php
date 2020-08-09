<?php

namespace Testing\Domain\Event\Http;

use Domain\Event\Event;
use Rapi\DevHelper\Testing\Personas\Admin\Palpatine;
use Rapi\DevHelper\Testing\RapiAsserts;
use Rapi\DevHelper\Testing\RapiLogQuery;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group Event
 * @group Http
 */
class EventControllerTest extends \Tests\TestCase
{

    use RapiAsserts,
        RapiLogQuery,
        DatabaseMigrations;

    /**
     * @var Palpatine
     */
    private $person;
    private $urlApi = '/api/v1/events';
    private $jsonStructure = ['id', 'name', 'description', 'start', 'end', 'type', 'price', 'category_id', 'img', 'address_id', 'merchant_id'];
    private $jsonFullStructure = ['id', 'name', 'description', 'start', 'end', 'type', 'price', 'category_id', 'img', 'address_id', 'merchant_id'];

    protected function setUp(): void
    {
        parent::setUp();

        $this->person = new Palpatine();

        //$this->person->setupACL();
        $this->person->api->setBaseUrl($this->urlApi);
    }

    protected function getModelClass()
    {
        return Event::class;
    }

    private function getData($data = [])
    {
        //$faker = $this->makeFaker();
        //$data['name'] = $this->faker->name;
        return factory($this->getModelClass())->make($data)->toArray();
    }

    private function getDataUpdate($data = [])
    {
        $data['name'] = 'UPDATED-' . time();

        return $data;
    }

    public function test_request_index()
    {
        $nRows = 2;
        $this->factory($nRows);
        $this->rapiExpectMaxQuery(2);

        $this->person->api
            ->index()
            ->jsonCount($nRows)
            ->jsonSeeStructure(['data' => ["*" => $this->jsonStructure]]);
    }

    public function test_crud_request()
    {
        $data = $this->getData();
        $dataUpdated = $this->getDataUpdate();

        //CREATE
        $this->person->api->store($data)
            ->jsonSeeStructure($this->jsonStructure, 'data');

        $id = $this->person->api->getResourceId();

        //READ
        $this->person->api->show($id)
            ->jsonSeeStructure($this->jsonFullStructure, 'data');

        //UPDATE
        $this->person->api->update($id, $dataUpdated)
            ->jsonSeeStructure($this->jsonStructure, 'data');

        //DELETE
        $this->person->api->remove($id);
    }
}
