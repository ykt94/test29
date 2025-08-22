<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Automobile;
use Illuminate\Database\Eloquent\Collection;

class AutomobileService
{

    public function getMany(): Collection {

        return  Automobile::with(['auto_model','auto_model.brand'])->get();
    }

    public function getOne(int $id): Automobile
    {
        $query = Automobile::query();
        /** @var Automobile $model */
        $model = $query->with(['auto_model','auto_model.brand'])->findOrFail($id);

        return $model;
    }

    public function create(array $inputData): int
    {
        $model = new Automobile;
        $model->fill($inputData);
        $model->save();

        return $model->id;
    }

    public function update(Automobile|int $model, array $inputData): int
    {
        if (is_int($model)) {
            $model = $this->getOne($model);
        }

        $model->fill($inputData);
        $model->save();

        return $model->id;
    }

    public function delete(Automobile|int $model): int
    {
        if (is_int($model)) {
            $model = $this->getOne($model);
        }

        $model->delete();

        return $model->id;
    }

}
