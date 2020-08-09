<?php

namespace Domain\Category;

use Domain\Event\Event;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'app_categories';
    protected $fillable = ['title', 'img'];
    protected $dates = [];

    public function event()
    {
        return $this->hasMany(Event::class);
    }
}
