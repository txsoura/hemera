<?php

namespace Domain\Event;

use Domain\Address\AddressResource;
use Domain\Category\CategoryResource;
use Domain\Merchant\MerchantResource;
use Rapi\Core\Response\BaseResource;

class EventResource extends BaseResource
{

    /**
     * @var array
     */
    public static $availableIncludes = ['merchant', 'address', 'category'];

    /**
     * @var array
     */
    public $defaulIncludes = [];

    /**
     * @param Event $model
     * @return array
     */
    public function presenter($model): array
    {
        return [
            'id' => (int) $model->id,
            'name'      => $model->name,
            'description'      => $model->description,
            'start'      => $this->parseDateTimeOrNull($model->start),
            'end'      => $this->parseDateTimeOrNull($model->end),
            'type'      => $model->type,
            'price'      => $this->parseFloatOrNull($model->price),
            'category_id'      => $this->parseIntOrNull($model->category_id),
            'img'      => $model->img,
            'address_id'      => $this->parseIntOrNull($model->address_id),
            'merchant_id'      => $this->parseIntOrNull($model->merchant_id),
            'created_at' => $this->parseDateTimeOrNull($model->created_at),
            'updated_at' => $this->parseDateTimeOrNull($model->updated_at)
        ];
    }

    public function includeMerchant(Event $model)
    {
        return new MerchantResource($model->merchant);
    }

    public function includeCategory(Event $model)
    {
        return new CategoryResource($model->category);
    }

    public function includeAddress(Event $model)
    {
        return new AddressResource($model->address);
    }


    //    public function includeProject(Event $model)
    //    {
    //        return new ProjectResource($model->project);
    //    }
}
