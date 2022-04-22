<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class sparepart extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $with = ['models', 'categoriePart'];

    public function categoriePart()
    {
        return $this->belongsTo(CategoriePart::class);
    }

    public function models()
    {
        return $this->belongsTo(Models::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
}