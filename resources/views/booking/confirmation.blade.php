@extends('layouts.app')

@section('title', 'Booking Confirmed')

@section('content')

<section class="pt-6">
    <div class="max-w-4xl mx-auto px-5">
        <div class="luxury-card p-8 text-center" data-reveal>
            <p class="text-xs uppercase tracking-[0.3em] text-brass">Booking Confirmed</p>
            <h1 class="font-display text-4xl md:text-5xl mt-4">We are expecting you.</h1>
            <p class="mt-3 text-sm text-charcoal-70 measure">
                Your reservation details are below. Save the reference number for check-in.
            </p>
        </div>
    </div>
</section>

<section class="mt-8">
    <div class="max-w-4xl mx-auto px-5 space-y-6">
        <div class="luxury-card p-6 text-center" data-reveal>
            <p class="text-xs uppercase tracking-[0.3em] text-brass">{{ __('messages.booking_reference') }}</p>
            <p class="font-display text-3xl mt-3">{{ $booking->booking_reference }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="luxury-card p-6" data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Guest</p>
                <div class="mt-4 space-y-2 text-sm text-charcoal-70">
                    <p>{{ $booking->guest_name }}</p>
                    <p>{{ $booking->guest_email }}</p>
                    <p>{{ $booking->guest_phone }}</p>
                    <p>{{ $booking->guest_country }}</p>
                </div>
            </div>
            <div class="luxury-card p-6" data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Stay</p>
                <div class="mt-4 space-y-2 text-sm text-charcoal-70">
                    <p>Check-in: {{ $booking->check_in->format('M d, Y') }}</p>
                    <p>Check-out: {{ $booking->check_out->format('M d, Y') }}</p>
                    <p>Nights: {{ $booking->check_in->diffInDays($booking->check_out) }}</p>
                    <p>Guests: {{ $booking->adults }} Adults, {{ $booking->children }} Children</p>
                </div>
            </div>
        </div>

        <div class="luxury-card p-6" data-reveal>
            <p class="text-xs uppercase tracking-[0.3em] text-brass">Room</p>
            <div class="mt-4 flex flex-col sm:flex-row gap-4">
                @if($booking->room->images && count($booking->room->images) > 0)
                    <img src="{{ $booking->room->images[0] }}" alt="{{ $booking->room->getTranslatedName() }}" class="h-28 w-full sm:w-36 object-cover rounded-2xl" loading="lazy" decoding="async">
                @endif
                <div class="flex-1">
                    <h2 class="font-display text-2xl">{{ $booking->room->getTranslatedName() }}</h2>
                    <p class="mt-2 text-sm text-charcoal-70">{{ $booking->room->hotel->getTranslatedName() }}</p>
                    <p class="mt-2 text-sm text-charcoal-70">{{ $booking->room->size_sqm }} sqm | {{ $booking->room->capacity }} guests</p>
                </div>
                <div class="text-right">
                    <p class="text-xs uppercase tracking-[0.3em] text-charcoal-60">Total</p>
                    <p class="font-display text-2xl mt-2">${{ number_format($booking->total_price, 2) }}</p>
                    <p class="text-xs text-charcoal-60">{{ $booking->currency }}</p>
                </div>
            </div>
        </div>

        @if($booking->special_requests && count($booking->special_requests) > 0)
            <div class="luxury-card p-6" data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Special Requests</p>
                <div class="mt-4 space-y-2 text-sm text-charcoal-70">
                    @foreach($booking->special_requests as $request)
                        @if($request)
                            <p>{{ $request }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        <div class="luxury-card p-6" data-reveal>
            <p class="text-xs uppercase tracking-[0.3em] text-brass">Next Steps</p>
            <div class="mt-4 space-y-2 text-sm text-charcoal-70">
                <p>Confirmation email sent to {{ $booking->guest_email }}.</p>
                <p>Payment can be made on arrival or via bank transfer.</p>
                <p>Concierge will reach out if we need anything else.</p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-between items-center">
            <a href="{{ route('home') }}" class="btn-secondary min-h-[44px] px-6">Return Home</a>
            <div class="flex gap-3">
                @php
                    $checkIn = \Carbon\Carbon::parse($booking->check_in);
                    $canModify = $checkIn->diffInHours(now()) >= 48 && $booking->status !== 'cancelled';
                @endphp
                
                @if($canModify)
                    <a href="{{ route('booking.edit', $booking) }}" class="btn-secondary min-h-[44px] px-6">
                        Modify Booking
                    </a>
                    <form action="{{ route('booking.cancel', $booking) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-secondary min-h-[44px] px-6 text-red-600 border-red-600 hover:bg-red-600 hover:text-white">
                            Cancel Booking
                        </button>
                    </form>
                @endif
                
                <button onclick="window.print()" class="btn-primary min-h-[44px] px-6">Print Confirmation</button>
            </div>
        </div>
        
        @if(!$canModify && $booking->status !== 'cancelled')
            <div class="luxury-card p-4 bg-yellow-50 border-yellow-200" data-reveal>
                <p class="text-sm text-yellow-800">
                    <strong>Note:</strong> Modifications and cancellations are only available up to 48 hours before check-in.
                </p>
            </div>
        @endif
        
        @if($booking->status === 'cancelled')
            <div class="luxury-card p-4 bg-red-50 border-red-200" data-reveal>
                <p class="text-sm text-red-800">
                    <strong>This booking has been cancelled.</strong>
                </p>
            </div>
        @endif
    </div>
</section>

@endsection


