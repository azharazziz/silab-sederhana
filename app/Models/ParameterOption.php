<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParameterOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'parameter_id',
        'option'
    ];

    protected $dates = ['deleted_at'];

    public function parameter(): BelongsTo
    {
        return $this->belongsTo(Parameter::class);
    }
}