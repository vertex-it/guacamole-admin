<?php

namespace App\Traits;

use App\Models\Entity;

trait HasEntity
{
    protected static function booted()
    {
        static::addGlobalScope('entity', function ($query) {
            $query->with('entity');
        });
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entity_id', 'entity_id');
    }

    public function getNameAttribute()
    {
        return $this->entity->name;
    }
}
