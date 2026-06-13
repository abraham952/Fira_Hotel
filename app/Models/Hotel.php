<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'email',
        'phone',
        'whatsapp',
        'address',
        'latitude',
        'longitude',
        'star_rating',
        'amenities',
        'images',
        'is_active',
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'address' => 'array',
        'amenities' => 'array',
        'images' => 'array',
        'is_active' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
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
