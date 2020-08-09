<?php

namespace Domain\Event;

use Rapi\Core\Service\BaseService;
use Rapi\Core\Service\Traits\CrudMethodsService;
use Rapi\Fuse\Activitylog\Traits\SuperLogService;
use Rapi\Guardian\Support\Traits\UserMethodsService;

/**
 * Description of Service
 */
class EventService extends BaseService
{

    use CrudMethodsService, SuperLogService, UserMethodsService;

    protected $resourceName = "Event";
    protected $logName = 'event';
    protected $logIdentifierColumn = "name";

    /**
     * Model class for crud.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return Event::class;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Event $model
     * @param string $action
     * @return bool
     */
    public function authorize($model, $action): bool
    {
        // return $this->can('');
        // if(self::ACTION_CREATE === $action) { ... }
        return true;
    }

    /**
     * @param Event $model
     * @param string $action
     */
    protected function onChange($model, $action)
    {
        $this->superLog($model, $action);
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'name',
            'description' => 'description',
            'start' => 'start',
            'end' => 'end',
            'type' => 'type',
            'price' => 'price',
            'category_id' => 'category_id',
            'img' => 'img',
            'address_id' => 'address_id',
            'merchant_id' => 'merchant_id'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     * @param Event $model
     * @param string $action
     * @return array
     */
    public function rules($model, $action): array
    {
        switch ($action) {
            case self::ACTION_CREATE:
                return [
                    'name' => 'required|max:245',
                    'description' => 'required|max:245',
                    'start' => 'required|date',
                    'end' => 'required|date',
                    'type' => 'required|max:245',
                    'price' => 'numeric|nullable',
                    'category_id' => 'required|numeric|foreign',
                    'img' => 'max:245',
                    'address_id' => 'required|numeric|foreign',
                    'merchant_id' => 'required|numeric|foreign'
                ];

            case self::ACTION_UPDATE:
                return [
                    'name' => 'max:245',
                    'description' => 'max:245',
                    'start' => 'date',
                    'end' => 'date',
                    'type' => 'max:245',
                    'price' => 'numeric|nullable',
                    'category_id' => 'numeric|foreign',
                    'img' => 'max:245',
                    'address_id' => 'numeric|foreign',
                    'merchant_id' => 'numeric|foreign'
                ];
        }
    }

    /**
     * Filter array data
     *
     * @param string|null $action esse paramentro é mais usado quando sobscrito
     * @return array
     */
    //public function getData($action = null)
    //{
    //    $this->filterParam('cpf|cep|telefone|celular|cnpj', function($input) {
    //        return str_helper($input)->onlyDigits();
    //    });
    //    return $this->getParams();
    //}

}
