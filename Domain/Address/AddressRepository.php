<?php

namespace Domain\Address;

use Rapi\Core\Repository\BaseRepository;

class AddressRepository extends BaseRepository
{

    protected $possibleRelationships = [];

    protected $defaulIncludes = [];

    /**
     * @var array
     *
     * EX:
     * sort = -name
     * take = 15
     * paginate = 15
     */
    protected $params = array('sort' => 'city');

    /**
     * Permite criar parametros na query
     * @var array
     */
    protected $allow_where = array('id', 'latitude', 'longitude', 'city', 'state');

    /**
     * Columns autorizadas para utizar na ordenação
     * @var array
     */
    protected $allow_order = array('id', 'created_at', 'updated_at', 'city', 'state');

    /**
     * Columns autorizadas para utizar LIKE SQL
     * @var array
     */
    protected $allow_like = array('city', 'state');

    /**
     * Columns autorizadas para utizar Between Date
     * @var array
     */
    protected $allow_between_dates = array('created_at', 'updated_at');

    /**
     * Columns autorizadas para utizar Between Values
     * @var array
     */
    protected $allow_between_values = array();

    protected function getModelClass()
    {
        return Address::class;
    }

    //    protected function boot()
    //    {
    //        parent::boot();
    //        $this->pushCriteria(MyCriteria::class);
    //    }
}
