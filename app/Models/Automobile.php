<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Automobile extends Model
{
    protected $fillable = [
        'auto_model_id',
        'name',
        'production_year',
        'mileage',
        'body_color',
    ];
    public function auto_model(): BelongsTo
    {
        return $this->belongsTo(AutoModel::class);
    }
}
