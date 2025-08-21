<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use App\Services\BrandService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BrandController extends Controller
{
    public function __construct(
        private readonly BrandService $brandService,
    ) {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $models = $this->brandService->getMany(
            filters: $request->all(),
            with: explode(',', $request->get('with', '')),
            orderBy: $request->get('orderBy', 'id'),
            perPage: (int)$request->get('perPage', 20),
        );

        return BrandResource::collection($models);
    }
}
