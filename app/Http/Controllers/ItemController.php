<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemCollection;
use App\Item;
use App\Http\Resources\Item as ItemResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(new ItemCollection(Item::paginate()));
    }

    public function show(Item $item): JsonResponse
    {
        return response()->json(new ItemResource($item));
    }

    public function store(Request $request): JsonResponse
    {
        $item = Item::create($request->all());

        return response()->json(new ItemResource($item), 201);
    }

    public function update(Request $request, Item $item): JsonResponse
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