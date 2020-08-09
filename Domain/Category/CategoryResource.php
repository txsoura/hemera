<?php

namespace Domain\Category;

use Domain\Event\EventResource;
use Rapi\Core\Response\BaseResource;

class CategoryResource extends BaseResource
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
     * @param Category $model
     * @return array
     */
    public function presenter($model): array
    {
        return [
            'id' => (int) $model->id,
            'title'      => $model->title,
            'img'      => $model->img,
            'created_at' => $this->parseDateTimeOrNull($model->created_at),
            'updated_at' => $this->parseDateTimeOrNull($model->updated_at)
        ];
    }

    public function includeEvent(Category $model)
    {
        return EventResource::collection($model->event);
    }

    //    public function includeProject(Category $model)
    //    {
    //        return new ProjectResource($model->project);
    //    }
}
