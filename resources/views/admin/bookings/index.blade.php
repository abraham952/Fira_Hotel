@extends('layouts.app')

@section('title', 'Admin — Bookings')

@section('content')
<section class="py-16 bg-gradient-to-b from-[var(--color-cream)] to-white">
    <div class="max-w-7xl mx-auto px-4 space-y-12">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div>
                <p class="text-sm tracking-[0.3em] uppercase text-[var(--color-primary)] font-semibold">Dashboard</p>
                <h1 class="font-serif text-4xl md:text-5xl text-[var(--color-primary)]">Bookings Overview</h1>
                <p class="text-[var(--color-ink)]/70 mt-2">Monitor occupancy, payments, and guest details in real time.</p>
            </div>
            <div class="flex flex-wrap gap-4">
                <div class="px-5 py-3 bg-white border border-[var(--color-border)] rounded-lg shadow-sm">
                    <p class="text-xs text-[var(--color-ink)]/60 uppercase tracking-wide">Total</p>
                    <p class="text-2xl font-semibold text-[var(--color-primary)]">{{ $stats['total'] }}</p>
                </div>
                <div class="px-5 py-3 bg-white border border-[var(--color-border)] rounded-lg shadow-sm">
                    <p class="text-xs text-[var(--color-ink)]/60 uppercase tracking-wide">Upcoming</p>
                    <p class="text-2xl font-semibold text-[var(--color-primary)]">{{ $stats['upcoming'] }}</p>
                </div>
                <div class="px-5 py-3 bg-white border border-[var(--color-border)] rounded-lg shadow-sm">
                    <p class="text-xs text-[var(--color-ink)]/60 uppercase tracking-wide">Pending Payment</p>
                    <p class="text-2xl font-semibold text-[var(--color-primary)]">{{ $stats['pending_payment'] }}</p>
                </div>
                <div class="px-5 py-3 bg-white border border-[var(--color-border)] rounded-lg shadow-sm">
                    <p class="text-xs text-[var(--color-ink)]/60 uppercase tracking-wide">Cancelled</p>
                    <p class="text-2xl font-semibold text-[var(--color-primary)]">{{ $stats['cancelled'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white border border-[var(--color-border)] rounded-2xl shadow-sm">
            <div class="p-6 border-b border-[var(--color-border)] flex flex-col lg:flex-row gap-4 lg:items-center lg:justify-between">
                <form method="GET" class="flex flex-wrap gap-3">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email, reference" class="px-4 py-2 border border-[var(--color-border)] rounded-md text-sm focus:border-[var(--color-gold)] focus:outline-none">
                    <select name="booking_status" class="px-4 py-2 border border-[var(--color-border)] rounded-md text-sm focus:border-[var(--color-gold)] focus:outline-none">
                        <option value="">Booking Status</option>
                        @foreach(['confirmed','pending','cancelled','checked_in','checked_out'] as $status)
                        <option value="{{ $status }}" @selected(request('booking_status')===$status)>{{ ucfirst(str_replace('_',' ', $status)) }}</option>
                        @endforeach
                    </select>
                    <select name="payment_status" class="px-4 py-2 border border-[var(--color-border)] rounded-md text-sm focus:border-[var(--color-gold)] focus:outline-none">
                        <option value="">Payment Status</option>
                        @foreach(['paid','pending','failed','refunded'] as $status)
                        <option value="{{ $status }}" @selected(request('payment_status')===$status)>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="px-4 py-2 bg-[var(--color-primary)] text-white rounded-md text-sm font-semibold hover:bg-[#123075]">Filter</button>
                </form>
                @if(session('status'))
                <div class="text-sm text-[var(--color-primary)] font-semibold">{{ session('status') }}</div>
                @endif
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-[var(--color-border)]">
                    <thead class="bg-[var(--color-cream)] text-left text-xs uppercase tracking-wide text-[var(--color-ink)]/70">
                        <tr>
                            <th class="px-6 py-3">Guest</th>
                            <th class="px-6 py-3">Stay</th>
                            <th class="px-6 py-3">Room</th>
                            <th class="px-6 py-3">Payment</th>
                            <th class="px-6 py-3">Booking</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[var(--color-border)] text-sm">
                        @forelse($bookings as $booking)
                        <tr class="hover:bg-[var(--color-cream)]/60">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-[var(--color-primary)]">{{ $booking->guest_name }}</div>
                                <div class="text-[var(--color-ink)]/60 text-xs">{{ $booking->guest_email }}</div>
                                <div class="text-[var(--color-ink)]/60 text-xs">{{ $booking->booking_reference }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium">{{ $booking->check_in?->format('M j, Y') }} – {{ $booking->check_out?->format('M j, Y') }}</div>
                                <div class="text-[var(--color-ink)]/60 text-xs">{{ $booking->adults }} adults @if($booking->children) / {{ $booking->children }} children @endif</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium">{{ $booking->room->name ?? 'Room' }}</div>
                                <div class="text-[var(--color-ink)]/60 text-xs">${{ number_format($booking->total_price, 2) }} {{ strtoupper($booking->currency ?? 'usd') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-[var(--color-gold)]/15 text-[var(--color-primary)]">{{ ucfirst($booking->payment_status ?? 'pending') }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-white border border-[var(--color-border)] text-[var(--color-primary)]">{{ ucfirst($booking->booking_status ?? 'pending') }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.bookings.update', $booking) }}" method="POST" class="flex flex-col gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <div class="flex gap-2">
                                        <select name="booking_status" class="px-2 py-1 border border-[var(--color-border)] rounded-md text-xs">
                                            @foreach(['confirmed','pending','cancelled','checked_in','checked_out'] as $status)
                                            <option value="{{ $status }}" @selected($booking->booking_status === $status)>{{ ucfirst(str_replace('_',' ', $status)) }}</option>
                                            @endforeach
                                        </select>
                                        <select name="payment_status" class="px-2 py-1 border border-[var(--color-border)] rounded-md text-xs">
                                            @foreach(['paid','pending','failed','refunded'] as $status)
                                            <option value="{{ $status }}" @selected($booking->payment_status === $status)>{{ ucfirst($status) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="px-3 py-1.5 bg-[var(--color-primary)] text-white rounded-md text-xs font-semibold hover:bg-[#123075]">Save</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-6 text-center text-[var(--color-ink)]/60">No bookings found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
