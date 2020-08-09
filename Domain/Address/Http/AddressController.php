<?php

namespace Domain\Address\Http;

use Domain\Address\AddressService;
use Domain\Address\AddressResource;
use Domain\Address\AddressRepository;
use Rapi\Core\Http\Controllers\RapiController;
use Rapi\Core\Service\Traits\CrudMethodsController;

class AddressController extends RapiController
{

    use CrudMethodsController;

    /**
     * @var AddressRepository
     */
    protected $repository;

    /**
     * @var AddressService
     */
    protected $service;

    /**
     * @var string
     */
    protected $resource = AddressResource::class;

    function __construct(AddressService $service, AddressRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }
}
