<?php

namespace App\Http\Controllers;

use App\Filters\Item\Amount;
use App\Filters\Item\Name;
use App\Filters\RequestFilter;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Item;
use App\Http\Resources\ItemResource;
use App\Http\Resources\ItemCollectionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $items = Item::query();

        $filteredItems = (new RequestFilter($request))
            ->addFilter(new Amount())
            ->addFilter(new Name())
            ->buildFilter($items);

        return response()->json(new ItemCollectionResource($filteredItems->paginate()));
    }

    public function show(Item $item): JsonResponse
    {
        return response()->json(new ItemResource($item));
    }

    public function store(StoreItemRequest $request): JsonResponse
    {
        $item = Item::create($request->all());

        return response()->json(new ItemResource($item), 201);
    }

    public function update(UpdateItemRequest $request, Item $item): JsonResponse
    {
        $item->update($request->all());

        return response()->json(new ItemResource($item), 200);
    }

    public function delete(Item $item): JsonResponse
    {
        $item->delete();

        return response()->json(null, 204);
    }
}