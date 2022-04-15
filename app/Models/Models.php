<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['brand'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
