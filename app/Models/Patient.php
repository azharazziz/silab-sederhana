<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    public $incrementing = false;

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'gender',
        'datebirth',
        'province',
        'regency',
        'district',
        'village',
        'address',
        'phone',
        'email',
    ];

    protected $dates = ['deleted_at'];

    public function province(){
        return $this->belongsTo(Province::class, 'province', 'id');
    }
    public function regency(){
        return $this->belongsTo(Regency::class, 'regency', 'id');
    }
    public function district(){
        return $this->belongsTo(District::class, 'district', 'id');
    }
    public function village(){
        return $this->belongsTo(Village::class, 'village', 'id');
    }

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

}
