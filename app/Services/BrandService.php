<?php
declare(strict_types=1);

namespace App\Services;

use App\Dto\ModelsFilterDto;
use App\Enums\DbResultEnum;
use App\Models\Brand;
use App\Models\City;
use App\Services\Internal\CommonService;
use App\Traits\Db\CanFilterModels;
use App\Traits\Db\CanOrderModels;
use App\Traits\Db\CanWithRelations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BrandService
{

    public function getMany(
        array $filters = [],
        array $with = [],
        ?string $orderBy = null,
        int $perPage = 20,
    ): Collection {

        return Brand::get();
    }

    public function getOne(int $id): City
    {
        $query = City::query();
        /** @var City $model */
        $model = $query->findOrFail($id);

        return $model;
    }

    public function getOneBy(array $filters): ?City
    {
        $query = City::query();

        $exactFilters = [];
        if ($edunetId = $filters['edunet_id'] ?? null) {
            $exactFilters['edunet_id'] = $edunetId;
        }

        $filtersData = new ModelsFilterDto(exact: $exactFilters);
        $this->setFilters($query, $filtersData);

        /** @var City|null $model */
        $model = $query->first();

        return $model;
    }

    public function create(array $inputData): City
    {
        $model = new City;
        $model->fill($inputData);
        $model->save();

        return $model;
    }

    public function update(City|int $model, array $inputData): City
    {
        if (is_int($model)) {
            $model = $this->getOne($model);
        }

        $model->fill($inputData);
        $model->save();

        return $model;
    }

    public function delete(City|int $model): City
    {
        if (is_int($model)) {
            $model = $this->getOne($model);
        }

        $model->delete();

        return $model;
    }

}
