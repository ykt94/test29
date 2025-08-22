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
        $models = $this->brandService->getMany();

        return BrandResource::collection($models);
    }
}
