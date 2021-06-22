<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['parent_id', 'name', 'slug', 'image', 'status'];


    public function parent()
    {
        return $this->belongsTo(Self::class, 'parent_id', 'id');
    }

    public function scopeActive($query){
        return $query->where('status',true);
    }

    //Show Product
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
}
