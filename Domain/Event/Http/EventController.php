<?php

namespace Domain\Event\Http;

use Domain\Event\EventService;
use Domain\Event\EventResource;
use Domain\Event\EventRepository;
use Rapi\Core\Http\Controllers\RapiController;
use Rapi\Core\Service\Traits\CrudMethodsController;

class EventController extends RapiController
{

    use CrudMethodsController;

    /**
     * @var EventRepository
     */
    protected $repository;

    /**
     * @var EventService
     */
    protected $service;

    /**
     * @var string
     */
    protected $resource = EventResource::class;

    function __construct(EventService $service, EventRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }
}
