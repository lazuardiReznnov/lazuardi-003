<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
