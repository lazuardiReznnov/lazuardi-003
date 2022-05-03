<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Unit extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['models', 'owner', 'type'];
    protected $load = ['grup', 'maintenance'];

    public function models()
    {
        return $this->belongsTo(Models::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function grup()
    {
        return $this->belongsTo(Unit::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'noReg',
            ],
        ];
    }
}