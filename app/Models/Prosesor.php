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
}
