<?php
declare(strict_types=1);

namespace App\Http\Requests;

class UpdateAutomobileRequest extends AbstractAutomobileRequest
{
    public function rules(): array
    {
        return [
            'auto_model_id' => ['sometimes', 'nullable', 'exists:auto_models,id'],
            'name' => ['sometimes', 'nullable', 'string'],
            'production_year' => ['sometimes', 'nullable', 'numeric'],
            'mileage' => ['sometimes', 'nullable', 'numeric'],
            'body_color' => ['sometimes', 'nullable', 'string'],
        ];
    }

}
