<?php

namespace Domain\Address;

use Rapi\Core\Response\BaseResource;

class AddressResource extends BaseResource
{

    /**
     * @var array
     */
    public static $availableIncludes = [];

    /**
     * @var array
     */
    public $defaulIncludes = [];

    /**
     * @param Address $model
     * @return array
     */
    public function presenter($model): array
    {
        return [
            'id' => (int) $model->id,
            'latitude'      => $model->latitude,
            'longitude'      => $model->longitude,
            'number'      => $this->parseIntOrNull($model->number),
            'city'      => $model->city,
            'state'      => $model->state,
            'created_at' => $this->parseDateTimeOrNull($model->created_at),
            'updated_at' => $this->parseDateTimeOrNull($model->updated_at)
        ];
    }

    //    public function includeProject(Address $model)
    //    {
    //        return new ProjectResource($model->project);
    //    }
}
