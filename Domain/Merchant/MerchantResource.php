<?php

namespace Domain\Merchant;

use Domain\Event\Event;
use Domain\Event\EventResource;
use Rapi\Core\Response\BaseResource;

class MerchantResource extends BaseResource
{

    /**
     * @var array
     */
    public static $availableIncludes = ['event'];

    /**
     * @var array
     */
    public $defaulIncludes = [];

    /**
     * @param Merchant $model
     * @return array
     */
    public function presenter($model): array
    {
        return [
            'id' => (int) $model->id,
            'cpf_cnpj'      => $this->parseIntOrNull($model->cpf_cnpj),
            'cellphone'      => $this->parseIntOrNull($model->cellphone),
            'name'      => $model->name,
            'img'      => $model->img,
            'created_at' => $this->parseDateTimeOrNull($model->created_at),
            'updated_at' => $this->parseDateTimeOrNull($model->updated_at)
        ];
    }

    public function includeEvent(Merchant $model)
    {
        return EventResource::collection($model->event);
    }


    //    public function includeProject(Merchant $model)
    //    {
    //        return new ProjectResource($model->project);
    //    }
}
