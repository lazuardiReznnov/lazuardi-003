<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['sparepart'];

    public function sparepart()
    {
        return $this->belongsTo(sparepart::class);
    }
}
