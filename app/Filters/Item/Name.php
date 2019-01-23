<?php

namespace App\Filters\Item;

use App\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Name implements FilterInterface
{
    public function handle(Request $request, Builder $builder): Builder
    {
        $name = $request->get('name');

        if (null === $name) {
            return $builder;
        }

        return $builder->where('name', 'LIKE', $name);
    }
}