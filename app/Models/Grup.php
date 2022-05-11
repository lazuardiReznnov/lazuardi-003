<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['unit'];

    public function unit()
    {
        return $this->hasMany(Unit::class);
    }
}
