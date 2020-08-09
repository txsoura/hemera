<?php

namespace Domain\Merchant\Http;

use Domain\Merchant\MerchantService;
use Domain\Merchant\MerchantResource;
use Domain\Merchant\MerchantRepository;
use Rapi\Core\Http\Controllers\RapiController;
use Rapi\Core\Service\Traits\CrudMethodsController;

class MerchantController extends RapiController
{

    use CrudMethodsController;

    /**
     * @var MerchantRepository
     */
    protected $repository;

    /**
     * @var MerchantService
     */
    protected $service;

    /**
     * @var string
     */
    protected $resource = MerchantResource::class;

    function __construct(MerchantService $service, MerchantRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }
}
