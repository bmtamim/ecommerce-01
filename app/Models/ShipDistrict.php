<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShipDistrict extends Model
{
    use HasFactory;

    protected $fillable = ['country_id','division_id','district_name'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(ShipCountry::class,'country_id','id');
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(ShipDivision::class,'division_id','id');
    }

}
