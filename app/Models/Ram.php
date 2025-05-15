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

    // Lebih aman dan eksplisit dengan fillable
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
}
