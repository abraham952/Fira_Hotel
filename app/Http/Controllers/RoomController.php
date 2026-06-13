<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Services\AvailabilityService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $availabilityService;

    public function __construct(AvailabilityService $availabilityService)
    {
        $this->availabilityService = $availabilityService;
    }

    public function index()
    {
        $rooms = Room::with('hotel')
            ->where('is_available', true)
            ->paginate(12);
        
        return view('rooms.index', compact('rooms'));
    }

    public function search(Request $request)
    {
        $query = Room::with('hotel')->where('is_available', true);
        
        if ($request->filled('check_in') && $request->filled('check_out')) {
            // Check availability logic here
            $checkIn = $request->check_in;
            $checkOut = $request->check_out;
            
            $query->whereDoesntHave('bookings', function ($q) use ($checkIn, $checkOut) {
                $q->where(function ($q) use ($checkIn, $checkOut) {
                    $q->whereBetween('check_in', [$checkIn, $checkOut])
                      ->orWhereBetween('check_out', [$checkIn, $checkOut])
                      ->orWhere(function ($q) use ($checkIn, $checkOut) {
                          $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                      });
                });
            });
        }
        
        if ($request->filled('adults')) {
            $query->where('capacity', '>=', $request->adults);
        }
        
        $rooms = $query->paginate(12);
        
        return view('rooms.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        $room->load('hotel');
        
        // Get availability calendar for next 3 months
        $availability = $this->availabilityService->getAvailabilityCalendar($room, 3);
        
        return view('rooms.show', compact('room', 'availability'));
    }

    /**
     * API endpoint for room availability
     */
    public function availability(Room $room)
    {
        $months = request('months', 3);
        $availability = $this->availabilityService->getAvailabilityCalendar($room, $months);
        
        return response()->json([
            'success' => true,
            'availability' => $availability
        ]);
    }
}
