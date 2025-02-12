<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;

trait CanLoadRelationships {
    public function loadRelationships(
        Model|Builder
    ){

    }
}
