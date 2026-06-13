<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::query()->with(['room']);

        if ($status = $request->get('booking_status')) {
            $query->where('booking_status', $status);
        }

        if ($payment = $request->get('payment_status')) {
            $query->where('payment_status', $payment);
        }

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('guest_name', 'like', "%{$search}%")
                    ->orWhere('guest_email', 'like', "%{$search}%")
                    ->orWhere('booking_reference', 'like', "%{$search}%");
            });
        }

        $bookings = $query->latest()->paginate(12)->withQueryString();

        $stats = [
            'total' => Booking::count(),
            'upcoming' => Booking::where('check_in', '>=', now()->toDateString())->count(),
            'pending_payment' => Booking::where('payment_status', 'pending')->count(),
            'cancelled' => Booking::where('booking_status', 'cancelled')->count(),
        ];

        return view('admin.bookings.index', compact('bookings', 'stats'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'booking_status' => 'required|string|max:50',
            'payment_status' => 'required|string|max:50',
        ]);

        $booking->update($validated);

        return back()->with('status', 'Booking updated.');
    }
}
