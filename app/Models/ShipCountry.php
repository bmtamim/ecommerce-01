<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShipCountry extends Model
{
    use HasFactory;

    protected $fillable = ['country_name'];

    public function divisions(): HasMany
    {
        return $this->hasMany(ShipDivision::class,'country_id','id');
    }
}
