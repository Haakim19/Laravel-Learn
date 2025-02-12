<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;

trait CanLoadRelationships
{
    public function loadRelationships(
        Model|EloquentBuilder|QueryBuilder $for,
        array $relations
    ) {
        foreach ($relations as $relation) {
            $for->when(
                $this->shouldIncludeRelation($relation),
                fn($q) => $for instanceof Model ? $q->load($relation) : $q->with($relation)
            );
        }
    }
}
