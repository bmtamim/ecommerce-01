<?php

namespace App\Models;

use App\Models\Backend\Admin;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    use Sluggable;
    use HasTranslations;

    public $translatable = ['name','slug'];

    protected $fillable = ['user_id', 'name', 'slug', 'image', 'status'];

    //Relation With User
    public function author()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }

    public function scopeActive($query){
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
                'source' => 'name',
            ]
        ];
    }


}
