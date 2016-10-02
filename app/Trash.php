<?php

namespace App;

use App\Interfaces\ITrashable;
use Illuminate\Database\Eloquent\Collection;

class Trash
{

    protected $trashCollection;

    public function __construct()
    {
        $this->trashCollection = new Collection();
    }

    protected function validateCollection($collection) {
        $collection->each(function($item) {
            if (!array_key_exists('App\Interfaces\ITrashable', class_implements($item))) {
                throw new Exception('Class does not implement ITrashable interface');
            }
        });
    }

    public function addCollection(Collection $collection)
    {
        $this->validateCollection($collection);
        $this->trashCollection = $this->trashCollection->merge($collection);
    }

    public function getCollection()
    {
        return $this->trashCollection;
    }

}