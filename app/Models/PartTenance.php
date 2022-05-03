<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartTenance extends Model
{
    use HasFactory;

    protected $with = ['sparepart'];
    protected $guarded = ['id'];

    public function partTenance()
    {
        return $this->belongsTo(Maintenance::class);
    }
}