<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShipDivision extends Model
{
    use HasFactory;

    protected $fillable = ['country_id','division_name'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(ShipCountry::class,'country_id','id');
    }
}
