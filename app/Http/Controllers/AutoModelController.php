<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutoModelResource;
use App\Services\AutoModelService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AutoModelController extends Controller
{
    public function __construct(
        private readonly AutoModelService $autoModelService,
    ) {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $models = $this->autoModelService->getMany();

        return AutoModelResource::collection($models);
    }
}
