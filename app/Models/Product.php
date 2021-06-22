<?php

namespace App\Models;

use Cassandra\Type\Collection;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];

    public function meta()
    {
      return $this->hasOne(ProductMeta::class,'product_id','id');
    }

    public function gallery_image()
    {
        return $this->hasMany(ProductGallery::class,'product_id','id');
    }

    //All Local Scope
    public function scopeActive($query)
    {
        return $query->where('status',true);
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
                'source' => 'title',
            ]
        ];
    }
}
