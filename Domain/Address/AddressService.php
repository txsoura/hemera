<?php

namespace Domain\Address;

use Rapi\Core\Service\BaseService;
use Rapi\Core\Service\Traits\CrudMethodsService;
use Rapi\Fuse\Activitylog\Traits\SuperLogService;
use Rapi\Guardian\Support\Traits\UserMethodsService;

/**
 * Description of Service
 */
class AddressService extends BaseService
{

    use CrudMethodsService, SuperLogService, UserMethodsService;

    protected $resourceName = "Address";
    protected $logName = 'address';
    protected $logIdentifierColumn = "city";

    /**
     * Model class for crud.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return Address::class;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Address $model
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
     * @param Address $model
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
            'latitude' => 'latitude',
            'longitude' => 'longitude',
            'number' => 'number',
            'city' => 'city',
            'state' => 'state'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     * @param Address $model
     * @param string $action
     * @return array
     */
    public function rules($model, $action): array
    {
        switch ($action) {
            case self::ACTION_CREATE:
                return [
                    'latitude' => 'required|max:245',
                    'longitude' => 'required|max:245',
                    'number' => 'required|numeric',
                    'city' => 'required|max:245',
                    'state' => 'required|max:245'
                ];

            case self::ACTION_UPDATE:
                return [
                    'latitude' => 'max:245',
                    'longitude' => 'max:245',
                    'number' => 'numeric',
                    'city' => 'max:245',
                    'state' => 'max:245'
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
