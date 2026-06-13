<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'hotel_id',
        'name',
        'description',
        'room_type',
        'capacity',
        'beds',
        'size_sqm',
        'base_price',
        'amenities',
        'images',
        'view_type',
        'is_available',
        'total_rooms',
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'amenities' => 'array',
        'images' => 'array',
        'is_available' => 'boolean',
        'base_price' => 'decimal:2',
        'size_sqm' => 'decimal:2',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getTranslatedName($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->name[$locale] ?? $this->name['en'] ?? '';
    }

    public function getTranslatedDescription($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->description[$locale] ?? $this->description['en'] ?? '';
    }
}
