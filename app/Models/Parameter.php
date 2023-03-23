<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parameter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'parameter_name',
        'unit',
        'reference_value'
    ];

    protected $dates = ['deleted_at'];

    public function parameterOption(): HasMany
    {
        return $this->hasMany(ParameterOption::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
