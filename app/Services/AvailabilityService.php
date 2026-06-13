<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AvailabilityService
{
    /**
     * Check if room is available for given dates
     */
    public function isRoomAvailable(Room $room, string $checkIn, string $checkOut): bool
    {
        $checkInDate = Carbon::parse($checkIn);
        $checkOutDate = Carbon::parse($checkOut);
        
        $conflictingBookings = Booking::where('room_id', $room->id)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->whereBetween('check_in', [$checkInDate, $checkOutDate])
                    ->orWhereBetween('check_out', [$checkInDate, $checkOutDate])
                    ->orWhere(function ($q) use ($checkInDate, $checkOutDate) {
                        $q->where('check_in', '<=', $checkInDate)
                          ->where('check_out', '>=', $checkOutDate);
                    });
            })
            ->exists();
        
        return !$conflictingBookings;
    }
    
    /**
     * Get availability calendar for a room
     */
    public function getAvailabilityCalendar(Room $room, int $months = 3): array
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->addMonths($months)->endOfMonth();
        
        $bookings = Booking::where('room_id', $room->id)
            ->where('status', '!=', 'cancelled')
            ->whereBetween('check_in', [$startDate, $endDate])
            ->get();
        
        $calendar = [];
        $period = CarbonPeriod::create($startDate, $endDate);
        
        foreach ($period as $date) {
            $dateStr = $date->format('Y-m-d');
            $isAvailable = true;
            
            foreach ($bookings as $booking) {
                if ($date->between($booking->check_in, $booking->check_out)) {
                    $isAvailable = false;
                    break;
                }
            }
            
            $calendar[$dateStr] = [
                'date' => $dateStr,
                'available' => $isAvailable,
                'price' => $room->base_price,
                'day_of_week' => $date->dayOfWeek,
            ];
        }
        
        return $calendar;
    }
    
    /**
     * Get available rooms for date range
     */
    public function getAvailableRooms(string $checkIn, string $checkOut): array
    {
        $rooms = Room::where('is_available', true)->get();
        $availableRooms = [];
        
        foreach ($rooms as $room) {
            if ($this->isRoomAvailable($room, $checkIn, $checkOut)) {
                $availableRooms[] = $room;
            }
        }
        
        return $availableRooms;
    }
}
