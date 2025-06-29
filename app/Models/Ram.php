<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ram
 * 
 * @property int $id
 * @property string $capacity
 * @property string $type
 * @property int $speed
 * @property string $description
 * @property string|null $image
 */
class Ram extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara mass assignment
    protected $fillable = [
        'capacity',
        'type',
        'speed',
        'description',
        'image',
    ];

    // Casting tipe data
    protected $casts = [
        'speed' => 'integer',
    ];

    /**
     * Relasi dengan Laptop
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function laptops()
    {
        return $this->hasMany(Laptop::class);
    }

    /**
     * Mutator untuk menyimpan nama file gambar dalam huruf kecil.
     *
     * @param string $value
     */
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = strtolower($value);
    }

    /**
     * Accessor untuk mendapatkan URL lengkap gambar RAM.
     *
     * @return string
     */
    public function getImagePathAttribute()
    {
        return $this->image ? asset('storage/rams/' . $this->image) : asset('images/default.png');
    }
}
