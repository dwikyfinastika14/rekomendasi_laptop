<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Prosesor
 * 
 * @property int $id
 * @property string $brand
 * @property int $jumlah_core
 * @property string|null $image
 */
class Prosesor extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara mass assignment
    protected $fillable = [
        'brand',
        'jumlah_core',
        'image',
    ];

    // Casting tipe data
    protected $casts = [
        'jumlah_core' => 'integer',
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
     * Mutator untuk memastikan nama file gambar disimpan dengan format tertentu.
     *
     * @param string $value
     */
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = strtolower($value);
    }

    /**
     * Accessor untuk mengembalikan path gambar lengkap.
     *
     * @return string
     */
    public function getImagePathAttribute()
    {
        return $this->image ? asset('storage/prosesors/' . $this->image) : asset('images/default.png');
    }
}
