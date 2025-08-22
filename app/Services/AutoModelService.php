<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\AutoModel;
use Illuminate\Database\Eloquent\Collection;

class AutoModelService
{

    public function getMany(): Collection {


        return AutoModel::with('brand')->get();
    }

}
