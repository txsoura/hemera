<?php

namespace Testing\Domain\Address\Http;

use Domain\Address\Address;
use Rapi\DevHelper\Testing\Personas\Admin\Palpatine;
use Rapi\DevHelper\Testing\RapiAsserts;
use Rapi\DevHelper\Testing\RapiLogQuery;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group Address
 * @group Http
 */
class AddressControllerTest extends \Tests\TestCase
{

    use RapiAsserts,
        RapiLogQuery,
        DatabaseMigrations;

    /**
     * @var Palpatine
     */
    private $person;
    private $urlApi = '/api/v1/addresses';
    private $jsonStructure = ['id', 'latitude', 'longitude', 'number', 'city', 'state'];
    private $jsonFullStructure = ['id', 'latitude', 'longitude', 'number', 'city', 'state'];

    protected function setUp(): void
    {
        parent::setUp();

        $this->person = new Palpatine();

        //$this->person->setupACL();
        $this->person->api->setBaseUrl($this->urlApi);
    }

    protected function getModelClass()
    {
        return Address::class;
    }

    private function getData($data = [])
    {
        //$faker = $this->makeFaker();
        //$data['latitude'] = $this->faker->name;
        return factory($this->getModelClass())->make($data)->toArray();
    }

    private function getDataUpdate($data = [])
    {
        $data['latitude'] = 'UPDATED-' . time();

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
