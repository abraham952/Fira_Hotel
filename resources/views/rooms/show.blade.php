@extends('layouts.app')

@section('title', $room->getTranslatedName())

@section('content')
@php
    $galleryImages = $room->images && count($room->images) ? $room->images : [
        asset('Images/IMG_6115.PNG'),
        asset('Images/IMG_6116.PNG'),
        asset('Images/IMG_6117.PNG'),
    ];
@endphp

<section class="pt-6">
    <div class="max-w-6xl mx-auto px-5">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Room</p>
                <h1 class="font-display text-4xl md:text-5xl mt-4 {{ app()->getLocale() !== 'en' ? 'font-ethiopic' : '' }}">
                    {{ $room->getTranslatedName() }}
                </h1>
                <p class="mt-3 text-sm text-charcoal-70">
                    {{ $room->hotel->getTranslatedName() }} | {{ $room->size_sqm }} sqm | Up to {{ $room->capacity }} guests | {{ ucfirst($room->view_type) }} view
                </p>
            </div>
            <div class="luxury-card px-6 py-4 text-center" data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">From</p>
                <p class="font-display text-3xl">${{ number_format($room->base_price, 0) }}</p>
                <p class="text-xs text-charcoal-70">per night</p>
            </div>
        </div>

        <div class="mt-8 relative">
            <div class="absolute top-4 right-4 z-10 rounded-full bg-linen-90 px-4 py-2 text-xs uppercase tracking-[0.2em] text-charcoal">
                <span data-gallery-indicator>1/{{ count($galleryImages) }}</span>
            </div>
            <div class="flex gap-4 overflow-x-auto hero-snap touch-pan" data-gallery>
                @foreach($galleryImages as $image)
                    <div class="snap-slide min-w-[88%] sm:min-w-[70%] lg:min-w-[60%] rounded-[28px] overflow-hidden" data-gallery-slide="{{ $loop->iteration }}">
                        <img src="{{ $image }}"
                             alt="{{ $room->getTranslatedName() }}"
                             class="h-[60vh] min-h-[360px] w-full object-cover"
                             loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                             decoding="async">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="mt-10">
    <div class="max-w-6xl mx-auto px-5 grid grid-cols-1 lg:grid-cols-[1.4fr_0.6fr] gap-10">
        <div class="space-y-6">
            <div data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">About This Room</p>
                <p class="mt-3 text-sm text-charcoal-70 measure-wide {{ app()->getLocale() !== 'en' ? 'font-ethiopic' : '' }}">
                    {{ $room->getTranslatedDescription() }}
                </p>
            </div>

            <details id="availability" class="luxury-card p-6" data-reveal>
                <summary class="cursor-pointer text-sm uppercase tracking-[0.3em] text-brass">Check Availability</summary>
                <form action="{{ route('booking.create') }}" method="GET" class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <div>
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.check_in') }}</label>
                        <input type="date" name="check_in" required min="{{ date('Y-m-d', strtotime('+1 day')) }}" class="calm-input">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.check_out') }}</label>
                        <input type="date" name="check_out" required min="{{ date('Y-m-d', strtotime('+2 days')) }}" class="calm-input">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.guests') }}</label>
                        <select name="adults" class="calm-input">
                            @for($i = 1; $i <= $room->capacity; $i++)
                                <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'Guest' : 'Guests' }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="btn-primary w-full min-h-[44px]">Check Availability</button>
                    </div>
                </form>
            </details>

            <details class="luxury-card p-6" data-reveal>
                <summary class="cursor-pointer text-sm uppercase tracking-[0.3em] text-brass">Amenities</summary>
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-charcoal-70">
                    @if($room->amenities)
                        @foreach($room->amenities as $amenity)
                            <div class="flex items-center gap-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-brass"></span>
                                <span>{{ $amenity }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </details>

            <details class="luxury-card p-6" data-reveal>
                <summary class="cursor-pointer text-sm uppercase tracking-[0.3em] text-brass">Policies</summary>
                <div class="mt-4 space-y-3 text-sm text-charcoal-70">
                    <p>Check-in from 2:00 PM, check-out by 12:00 PM.</p>
                    <p>Free cancellation up to 24 hours before arrival.</p>
                    <p>Quiet hours begin at 10:00 PM.</p>
                </div>
            </details>

            <!-- Availability Calendar -->
            <div data-reveal>
                <x-availability-calendar :room="$room" :availability="$availability" />
            </div>

            <!-- Social Share -->
            <div class="luxury-card p-6" data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass mb-4">Share This Room</p>
                <x-social-share 
                    :title="$room->getTranslatedName() . ' - FiraHotel'"
                    :url="route('rooms.show', $room)"
                    :description="$room->getTranslatedDescription()"
                />
            </div>
        </div>

        <aside class="hidden lg:block">
            <div class="luxury-card p-6 sticky top-24">
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Your Stay</p>
                <p class="font-display text-3xl mt-4">${{ number_format($room->base_price, 0) }}</p>
                <p class="text-xs text-charcoal-70">per night</p>
                <form action="{{ route('booking.create') }}" method="GET" class="mt-6 space-y-4">
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <div>
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.check_in') }}</label>
                        <input type="date" name="check_in" required min="{{ date('Y-m-d', strtotime('+1 day')) }}" class="calm-input">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.check_out') }}</label>
                        <input type="date" name="check_out" required min="{{ date('Y-m-d', strtotime('+2 days')) }}" class="calm-input">
                    </div>
                    <button type="submit" class="btn-primary w-full min-h-[44px]">Check Availability</button>
                </form>
                <div class="soft-divider mt-6 pt-4 text-xs text-charcoal-70">
                    Best rate guaranteed. Quiet cancellation policy.
                </div>
            </div>
        </aside>
    </div>
</section>

<section class="mt-14">
    <div class="max-w-6xl mx-auto px-5" data-reveal>
        <h2 class="font-display text-3xl">You May Also Like</h2>
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($room->hotel->rooms()->where('id', '!=', $room->id)->where('is_available', true)->limit(3)->get() as $similarRoom)
                <article class="luxury-card overflow-hidden">
                    <div class="relative h-56">
                        @if($similarRoom->images && count($similarRoom->images) > 0)
                            <img src="{{ $similarRoom->images[0] }}" alt="{{ $similarRoom->getTranslatedName() }}" class="h-full w-full object-cover" loading="lazy" decoding="async">
                        @else
                            <img src="{{ asset('Images/IMG_6118.PNG') }}" alt="{{ $similarRoom->getTranslatedName() }}" class="h-full w-full object-cover" loading="lazy" decoding="async">
                        @endif
                        <div class="absolute bottom-4 left-4 rounded-full bg-linen-90 px-3 py-2 text-xs uppercase tracking-[0.2em] text-charcoal">
                            ${{ number_format($similarRoom->base_price, 0) }}/night
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-display text-2xl">{{ $similarRoom->getTranslatedName() }}</h3>
                        <p class="mt-2 text-sm text-charcoal-70">{{ $similarRoom->size_sqm }} sqm | {{ $similarRoom->capacity }} guests</p>
                        <a href="{{ route('rooms.show', $similarRoom) }}" class="mt-4 inline-flex text-sm uppercase tracking-[0.3em] text-brass">
                            View Details
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('bottom_bar')
    <div class="fixed bottom-0 left-0 right-0 z-40 md:hidden">
        <div class="mx-4 mb-4 rounded-3xl border border-[color:var(--color-stone)] bg-linen-95 backdrop-blur-sm px-4 pb-safe pt-3 shadow-[0_8px_24px_rgba(44,42,38,0.12)]">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-[11px] uppercase tracking-[0.3em] text-charcoal-60">From</p>
                    <p class="font-display text-xl">${{ number_format($room->base_price, 0) }}</p>
                </div>
                <button type="button" class="btn-primary min-h-[44px]" data-booking-open="availability">
                    Check Availability
                </button>
            </div>
        </div>
    </div>
@endsection
