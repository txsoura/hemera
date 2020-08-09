<?php

namespace Testing\Domain\Merchant\Http;

use Domain\Merchant\Merchant;
use Rapi\DevHelper\Testing\Personas\Admin\Palpatine;
use Rapi\DevHelper\Testing\RapiAsserts;
use Rapi\DevHelper\Testing\RapiLogQuery;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group Merchant
 * @group Http
 */
class MerchantControllerTest extends \Tests\TestCase
{

    use RapiAsserts,
        RapiLogQuery,
        DatabaseMigrations;

    /**
     * @var Palpatine
     */
    private $person;
    private $urlApi = '/api/v1/merchants';
    private $jsonStructure = ['id', 'cpf_cnpj', 'cellphone', 'name', 'img'];
    private $jsonFullStructure = ['id', 'cpf_cnpj', 'cellphone', 'name', 'img'];

    protected function setUp(): void
    {
        parent::setUp();

        $this->person = new Palpatine();

        //$this->person->setupACL();
        $this->person->api->setBaseUrl($this->urlApi);
    }

    protected function getModelClass()
    {
        return Merchant::class;
    }

    private function getData($data = [])
    {
        //$faker = $this->makeFaker();
        //$data['cpf_cnpj'] = $this->faker->name;
        return factory($this->getModelClass())->make($data)->toArray();
    }

    private function getDataUpdate($data = [])
    {
        $data['cpf_cnpj'] = 'UPDATED-' . time();

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
