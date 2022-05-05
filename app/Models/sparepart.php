<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class sparepart extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $with = ['models', 'categoriePart', 'stock'];
    protected $load = ['partTenance'];

    public function categoriePart()
    {
        return $this->belongsTo(CategoriePart::class);
    }

    public function models()
    {
        return $this->belongsTo(Models::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
    public function partTenance()
    {
        return $this->hasMany(PartTenance::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}