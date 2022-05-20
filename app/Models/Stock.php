<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['sparepart', 'supplier'];

    public function sparepart()
    {
        return $this->belongsTo(sparepart::class);
    }

    public function supplier(){
        return $this->belongsTo(supplier::class);
    }
}
