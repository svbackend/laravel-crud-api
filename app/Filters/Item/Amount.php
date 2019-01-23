<?php

namespace App\Filters\Item;

use App\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Amount implements FilterInterface
{
    private $validOperations = ['>', '<', '>=', '<='];

    public function handle(Request $request, Builder $builder): Builder
    {
        $amount = $request->get('amount');

        if (null === $amount) {
            return $builder;
        }

        if (is_array($amount) === false) {
            return $builder->where('amount', '=', (int)$amount);
        }

        [$operation, $value] = $amount;

        if ($this->isValidOperation($operation) === false) {
            return $builder;
        }

        return $builder->where('amount', $operation, $value);
    }

    private function isValidOperation(string $operation): bool
    {
        return in_array($operation, $this->validOperations);
    }

}