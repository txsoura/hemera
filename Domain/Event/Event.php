<?php

namespace Domain\Event;

use Domain\Address\Address;
use Domain\Category\Category;
use Domain\Merchant\Merchant;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'app_events';
    protected $fillable = ['name', 'description', 'start', 'end', 'type', 'price', 'category_id', 'img', 'address_id', 'merchant_id'];
    protected $dates = ['start', 'end'];

    // public static $logAttributes = ['name', 'description', 'start', 'end', 'type', 'price', 'category_id', 'img', 'address_id', 'merchant_id'];
    // protected $casts = [];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }


    public function address()
    {
        return $this->belongsTo(Address::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
