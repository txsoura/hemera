<?php

namespace Testing\Domain\Merchant;

use Domain\Merchant\Merchant;
use Domain\Merchant\MerchantService;
use Rapi\DevHelper\Testing\RapiAsserts;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group Merchant
 * @group Service
 */
class MerchantServiceTest extends \Tests\TestCase
{

    use RapiAsserts,
        DatabaseMigrations;

    /**
     * @return MerchantService
     */
    private function makeService()
    {
        return new MerchantService();
    }

    protected function getModelClass()
    {
        return Merchant::class;
    }

    protected function getTable()
    {
        return "app_merchants";
    }

    protected function getKeysCheckDB()
    {
        return ['id', 'deleted_at', 'cpf_cnpj', 'cellphone', 'name', 'img'];
    }

    private function getData($data = [])
    {
        //$faker = $this->makeFaker();
        //$data['cpf_cnpj'] = $faker->name;
        return factory($this->getModelClass())->make($data)->toArray();
    }

    private function getDataUpdate($data = [])
    {
        $data['cpf_cnpj'] = 'UPDATED-' . time();

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
