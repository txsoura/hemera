<?php

namespace Domain\Category\Http;

use Domain\Category\CategoryService;
use Domain\Category\CategoryResource;
use Domain\Category\CategoryRepository;
use Rapi\Core\Http\Controllers\RapiController;
use Rapi\Core\Service\Traits\CrudMethodsController;

class CategoryController extends RapiController
{

    use CrudMethodsController;

    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * @var CategoryService
     */
    protected $service;

    /**
     * @var string
     */
    protected $resource = CategoryResource::class;

    function __construct(CategoryService $service, CategoryRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }
}
