<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterBuilderInterface
{
    public function buildFilter(Builder $builder): Builder;

    public function addFilter(FilterInterface $filter);
}