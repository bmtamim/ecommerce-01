<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSessions extends Model
{
    use HasFactory;

    protected $fillable = ['session_key','session_value','session_expiry'];

}
