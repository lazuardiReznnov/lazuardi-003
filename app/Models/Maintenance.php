<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Maintenance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['unit'];
    protected $load = ['partTenance'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function partTenance()
    {
        return $this->hasMany(PartTenance::class);
    }

    public function getCreatedAttibute()
    {
        return Carbon::parse($this->attributes['date'])->translatedFormat(
            '1, d f Y'
        );
    }
}