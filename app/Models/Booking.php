<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'booking_reference',
        'user_id',
        'room_id',
        'guest_name',
        'guest_email',
        'guest_phone',
        'guest_country',
        'check_in',
        'check_out',
        'adults',
        'children',
        'total_price',
        'currency',
        'payment_status',
        'booking_status',
        'special_requests',
        'preferred_language',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'special_requests' => 'array',
        'total_price' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($booking) {
            if (empty($booking->booking_reference)) {
                $booking->booking_reference = 'FH-' . strtoupper(uniqid());
            }
        });
    }
}
