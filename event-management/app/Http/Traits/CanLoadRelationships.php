<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;


trait CanLoadRelationships
{
    public function loadRelationShips(
        Model|QueryBuilder|EloquentBuilder|HasMany  $for,
        ?array $relations = null
    ) : Model|QueryBuilder|EloquentBuilder|HasMany {

        $relations = $relations ?? $this->relations ?? [];

        foreach($relations as $relation){
            $for->when(
                $this->shouldIncludeRelation($relation),
                fn($q) => $for instanceof Model ? $for->load($relation) : $q->with($relation) 
            );
        }
        return $for;
    }

    protected function shouldIncludeRelation(string $relation):bool
    {
        $includes = request()->query("include");

        if(!$includes){
            return false;
        }
        $relations = array_map("trim", explode(",", $includes));

        return in_array($relation, $relations);
    }
}