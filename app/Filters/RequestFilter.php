<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final class RequestFilter implements FilterBuilderInterface
{
    /** @var Request $request */
    private $request;

    /** @var $filters FilterInterface[] */
    private $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function addFilter(FilterInterface $filter): self
    {
        $this->filters[get_class($filter)] = $filter;

        return $this;
    }

    public function buildFilter(Builder $builder): Builder
    {
        foreach ($this->filters as $filter) {
            $filter->handle($this->request, $builder);
        }

        return $builder;
    }

}