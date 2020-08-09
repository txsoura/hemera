<?php

namespace Domain\Event;

use Rapi\Core\Repository\BaseRepository;

class EventRepository extends BaseRepository
{

    protected $possibleRelationships = ['merchant', 'address', 'category'];

    protected $defaulIncludes = [];

    /**
     * @var array
     *
     * EX:
     * sort = -name
     * take = 15
     * paginate = 15
     */
    protected $params = array('sort' => 'name');

    /**
     * Permite criar parametros na query
     * @var array
     */
    protected $allow_where = array('id', 'name', 'description', 'type', 'price', 'category_id', 'address_id', 'merchant_id');

    /**
     * Columns autorizadas para utizar na ordenação
     * @var array
     */
    protected $allow_order = array('id', 'created_at', 'updated_at', 'name', 'description', 'start', 'end', 'type', 'price', 'category_id',  'address_id', 'merchant_id');

    /**
     * Columns autorizadas para utizar LIKE SQL
     * @var array
     */
    protected $allow_like = array('name', 'description', 'type');

    /**
     * Columns autorizadas para utizar Between Date
     * @var array
     */
    protected $allow_between_dates = array('created_at', 'updated_at', 'start', 'end');

    /**
     * Columns autorizadas para utizar Between Values
     * @var array
     */
    protected $allow_between_values = array('price');

    protected function getModelClass()
    {
        return Event::class;
    }

    //    protected function boot()
    //    {
    //        parent::boot();
    //        $this->pushCriteria(MyCriteria::class);
    //    }
}
