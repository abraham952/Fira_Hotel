<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $room = null;
        
        if ($request->filled('room_id')) {
            $room = Room::findOrFail($request->room_id);
        }
        
        return view('booking.create', compact('room'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email',
            'guest_phone' => 'required|string',
            'guest_country' => 'required|string',
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'special_requests' => 'nullable|array',
        ]);
        
        $room = Room::findOrFail($validated['room_id']);
        
        // Calculate total price
        $checkIn = \Carbon\Carbon::parse($validated['check_in']);
        $checkOut = \Carbon\Carbon::parse($validated['check_out']);
        $nights = $checkIn->diffInDays($checkOut);
        $totalPrice = $room->base_price * $nights;
        
        $validated['total_price'] = $totalPrice;
        $validated['currency'] = config('localization.currency.' . app()->getLocale(), 'ETB');
        $validated['preferred_language'] = app()->getLocale();
        
        $booking = Booking::create($validated);
        
        // Send confirmation email
        try {
            \Mail::to($booking->guest_email)->send(new \App\Mail\BookingConfirmation($booking));
        } catch (\Exception $e) {
            \Log::error('Failed to send booking confirmation email: ' . $e->getMessage());
        }
        
        return redirect()->route('booking.confirmation', $booking)->with('success', 'Booking confirmed! Check your email for details.');
    }

    public function confirmation(Booking $booking)
    {
        $booking->load('room.hotel');
        return view('booking.confirmation', compact('booking'));
    }
}

    public function edit(Booking $booking)
    {
        // Verify booking can be modified (at least 48 hours before check-in)
        $checkIn = \Carbon\Carbon::parse($booking->check_in);
        if ($checkIn->diffInHours(now()) < 48) {
            return redirect()->back()->with('error', 'Bookings can only be modified up to 48 hours before check-in.');
        }
        
        return view('booking.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        // Verify booking can be modified
        $checkIn = \Carbon\Carbon::parse($booking->check_in);
        if ($checkIn->diffInHours(now()) < 48) {
            return redirect()->back()->with('error', 'Bookings can only be modified up to 48 hours before check-in.');
        }
        
        $validated = $request->validate([
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'special_requests' => 'nullable|array',
        ]);
        
        // Recalculate total price
        $checkInDate = \Carbon\Carbon::parse($validated['check_in']);
        $checkOutDate = \Carbon\Carbon::parse($validated['check_out']);
        $nights = $checkInDate->diffInDays($checkOutDate);
        $validated['total_price'] = $booking->room->base_price * $nights;
        
        $booking->update($validated);
        
        // Send modification email
        try {
            \Mail::to($booking->guest_email)->send(new \App\Mail\BookingConfirmation($booking));
        } catch (\Exception $e) {
            \Log::error('Failed to send booking modification email: ' . $e->getMessage());
        }
        
        return redirect()->route('booking.confirmation', $booking)->with('success', 'Booking updated successfully!');
    }

    public function cancel(Booking $booking)
    {
        // Verify booking can be cancelled (at least 48 hours before check-in)
        $checkIn = \Carbon\Carbon::parse($booking->check_in);
        if ($checkIn->diffInHours(now()) < 48) {
            return redirect()->back()->with('error', 'Bookings can only be cancelled up to 48 hours before check-in.');
        }
        
        $booking->update(['status' => 'cancelled']);
        
        return redirect()->route('home')->with('success', 'Booking cancelled successfully. We hope to see you again soon!');
    }
}
