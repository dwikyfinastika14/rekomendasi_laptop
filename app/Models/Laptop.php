<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function processor()
    {
        return $this->belongsTo(Prosesor::class, 'prosesors_id');
    }

    public function ram()
    {
        return $this->belongsTo(Ram::class, 'rams_id');
    }

    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('assets/img/laptops/' . $this->image)
            : asset('assets/img/no-image.png');
    }
}
