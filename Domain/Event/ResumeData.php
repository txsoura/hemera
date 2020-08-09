<?php

namespace Domain\Event;

use Carbon\Carbon;
use Domain\Address\Address;
use Domain\Category\Category;
use Domain\Event\Event;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

class ResumeData implements Arrayable
{
    /** @var Collection */
    private $events;

    /** @var Collection */
    private $addresses;

    /** @var Collection */
    private $categories;

    /** @var Carbon */
    private $end;

    /** @var Carbon */
    private $start;

    /** @var Carbon */
    private $city;

    /** @var Carbon */
    private $category;

    /**
     * ResumeData constructor.
     */
    public function __construct()
    {
        $this->start = now()->startOfMonth();
        $this->end = now()->endOfMonth();
    }

    private function load()
    {
        if ($this->city) {
            $this->addresses = Address::where('city', $this->city)->first()->get();
        }

        if ($this->category) {
            $this->categories = Category::where('title', $this->category)->first()->get();
        }

        return $this->events = Event::where('address_id', $this->addresses->id)
            ->where('category_id', $this->categories->id)
            ->where('created_at', '>=', $this->start)
            ->where('created_at', '<=', $this->end)
            ->get();
    }

    /**
     * @param string|null $start
     * @return ResumeData
     */
    public function setStart($start): ResumeData
    {
        if (!empty($start)) {
            $this->start = Carbon::parse($start)->startOfDay();
        }

        return $this;
    }

    /**
     * @param string|null $end
     * @return ResumeData
     */
    public function setEnd($end): ResumeData
    {
        if (!empty($end)) {
            $this->end = Carbon::parse($end)->endOfDay();
        }

        return $this;
    }

    /**
     * @param string|null $city
     * @return ResumeData
     */
    public function setCity($city): ResumeData
    {
        if (!empty($city)) {
            $this->city = $city;
        }

        return $this;
    }

    /**
     * @param string|null $category
     * @return ResumeData
     */
    public function setCategory($category): ResumeData
    {
        if (!empty($category)) {
            $this->category = $category;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $this->load();
    }
}
