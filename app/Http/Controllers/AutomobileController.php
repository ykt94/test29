<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutomobileRequest;
use App\Http\Requests\UpdateAutomobileRequest;
use App\Http\Resources\AutomobileResource;
use App\Services\AutomobileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AutomobileController extends Controller
{
    public function __construct(
        private readonly AutomobileService $automobileService,
    ) {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $models = $this->automobileService->getMany();

        return AutomobileResource::collection($models);
    }

    public function show(int $id): AutomobileResource
    {
        $model = $this->automobileService->getOne($id);

        return new AutomobileResource($model);
    }

    public function store(StoreAutomobileRequest $request): JsonResponse
    {
        $inputData = $request->validated();

        try {
            $id = $this->automobileService->create($inputData);
            $success = true;
            $message = 'Automobile created';
        } catch (\Throwable $e) {
            $success = false;
            $id = null;
            $message = $e->getMessage();
        }

        return new JsonResponse(
            compact('success', 'id', 'message')
        );

    }

    public function update(UpdateAutomobileRequest $request, int $id): JsonResponse
    {
        $inputData = $request->validated();

        try {
            $id = $this->automobileService->update($id, $inputData);
            $success = true;
            $message = 'Automobile changed';
        } catch (\Throwable $e) {
            $success = false;
            $id = null;
            $message = $e->getMessage();
        }

        return new JsonResponse(
            compact('success', 'id', 'message')
        );

    }

    public function destroy(Request $request, int $id): JsonResponse
    {
        try {
            $id = $this->automobileService->delete($id);
            $success = true;
            $message = 'Automobile deleted';
        } catch (\Throwable $e) {
            $success = false;
            $id = null;
            $message = $e->getMessage();
        }

        return new JsonResponse(
            compact('success', 'id', 'message')
        );
    }


}
