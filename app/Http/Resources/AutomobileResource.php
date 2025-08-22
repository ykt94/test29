<?php

namespace App\Http\Resources;

use App\Models\Automobile;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutomobileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Automobile $model */
        $model = $this->resource;

        return [
            'id' => $model->id,
            'name' => $model->name,
            'production_year' => $model->production_year,
            'mileage' => $model->mileage,
            'body_color' => $model->body_color,
            'auto_model' => new AutoModelResource($this->whenLoaded('auto_model')),
        ];
    }
}
