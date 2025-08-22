<?php

namespace App\Http\Resources;

use App\Models\AutoModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoModelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var AutoModel $model */
        $model = $this->resource;

        return [
            'id' => $model->id,
            'name' => $model->name,
            'brand' => new BrandResource($this->whenLoaded('brand')),
        ];
    }
}
