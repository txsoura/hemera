<?php

namespace Domain\Merchant;

use Rapi\Core\Repository\BaseRepository;

class MerchantRepository extends BaseRepository
{

    protected $possibleRelationships = ['event'];

    protected $defaulIncludes = [];

    /**
     * @var array
     *
     * EX:
     * sort = -name
     * take = 15
     * paginate = 15
     */
    protected $params = array('sort' => 'cpf_cnpj');

    /**
     * Permite criar parametros na query
     * @var array
     */
    protected $allow_where = array('id', 'cpf_cnpj', 'cellphone', 'name');

    /**
     * Columns autorizadas para utizar na ordenação
     * @var array
     */
    protected $allow_order = array('id', 'created_at', 'updated_at', 'cpf_cnpj', 'cellphone', 'name');

    /**
     * Columns autorizadas para utizar LIKE SQL
     * @var array
     */
    protected $allow_like = array('name');

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
        return Merchant::class;
    }

    //    protected function boot()
    //    {
    //        parent::boot();
    //        $this->pushCriteria(MyCriteria::class);
    //    }
}
