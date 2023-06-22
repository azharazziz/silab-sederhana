<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'patient_id',
        'clinician_id',
        'analyst_id',
        'room_id',
        'registration_date',
        'examination_date',
        'insurance',
        'note',
        'status',
        'verify',
        'release',
        'validate',
        'note',
        'paid_status',
        'critical_value',
        'receiver',
        'delivery_officer',
        'receiver_report',
        'reporter',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function sample(): HasMany
    {
        return $this->hasMany(Sample::class);
    }

    public function orderParameter(): HasMany
    {
        return $this->hasMany(OrderParameter::class);
    }

    public function clinician(): BelongsTo
    {
        return $this->belongsTo(Clinician::class);
    }

    public function analyst(): BelongsTo
    {
        return $this->belongsTo(Analyst::class);
    }
}
