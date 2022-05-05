<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartTenance extends Model
{
    use HasFactory;

    protected $with = ['maintenance', 'sparepart'];
    protected $guarded = ['id'];

    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }
}