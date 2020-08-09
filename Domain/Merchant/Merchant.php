<?php

namespace Domain\Merchant;

use Domain\Event\Event;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{

    protected $table = 'app_merchants';
    protected $fillable = ['cpf_cnpj', 'cellphone', 'name', 'img'];
    protected $dates = [];

    // public static $logAttributes = ['cpf_cnpj', 'cellphone', 'name', 'img'];
    // protected $casts = [];
    public function event()
    {
        return $this->hasMany(Event::class);
    }
}
