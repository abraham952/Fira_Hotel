@extends('layouts.app')

@section('title', $experience->getTranslatedName())

@section('content')

<section class="pt-6">
    <div class="max-w-6xl mx-auto px-5">
        <div class="grid grid-cols-1 md:grid-cols-[1.1fr_0.9fr] gap-10 items-center">
            <div data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">{{ ucfirst($experience->category) }}</p>
                <h1 class="font-display text-4xl md:text-5xl mt-4 {{ app()->getLocale() !== 'en' ? 'font-ethiopic' : '' }}">
                    {{ $experience->getTranslatedName() }}
                </h1>
                <p class="mt-4 text-sm text-charcoal-70 measure">
                    {{ $experience->duration_minutes }} minutes | {{ $experience->hotel->getTranslatedName() }}
                </p>
                @if($experience->price)
                    <p class="mt-3 text-sm uppercase tracking-[0.2em] text-brass">${{ number_format($experience->price, 0) }} per person</p>
                @endif
            </div>
            <div class="luxury-card overflow-hidden" data-reveal>
                @if($experience->images && count($experience->images) > 0)
                    <img src="{{ $experience->images[0] }}" alt="{{ $experience->getTranslatedName() }}" class="h-72 w-full object-cover" loading="lazy" decoding="async">
                @else
                    <img src="{{ asset('Images/experiences/dining.svg') }}" alt="{{ $experience->getTranslatedName() }}" class="h-72 w-full object-cover" loading="lazy" decoding="async">
                @endif
            </div>
        </div>
    </div>
</section>

<section class="mt-12">
    <div class="max-w-6xl mx-auto px-5 grid grid-cols-1 lg:grid-cols-[1.4fr_0.6fr] gap-10">
        <div class="space-y-6">
            <div class="luxury-card p-6" data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">About This Experience</p>
                <p class="mt-3 text-sm text-charcoal-70 measure-wide {{ app()->getLocale() !== 'en' ? 'font-ethiopic' : '' }}">
                    {{ $experience->getTranslatedDescription() }}
                </p>
            </div>
            <div class="luxury-card p-6" data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">What Is Included</p>
                <div class="mt-4 space-y-2 text-sm text-charcoal-70">
                    <p>Professional guide</p>
                    <p>Materials and equipment</p>
                    <p>Refreshments</p>
                    <p>Photo moments</p>
                </div>
            </div>
            <div class="luxury-card p-6" data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Schedule</p>
                <div class="mt-4 space-y-2 text-sm text-charcoal-70">
                    <p>Morning session: 9:00 AM</p>
                    <p>Afternoon session: 2:00 PM</p>
                    <p>Evening session: 6:00 PM</p>
                </div>
            </div>

            <!-- Social Share -->
            <div class="luxury-card p-6" data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass mb-4">Share This Experience</p>
                <x-social-share 
                    :title="$experience->getTranslatedName() . ' - FiraHotel'"
                    :url="route('experiences.show', $experience)"
                    :description="$experience->getTranslatedDescription()"
                />
            </div>
        </div>
        <aside class="luxury-card p-6 sticky top-24" data-reveal>
            <p class="text-xs uppercase tracking-[0.3em] text-brass">Reserve</p>
            <p class="mt-3 text-sm text-charcoal-70">
                We will confirm availability and timing within a few hours.
            </p>
            <div class="mt-6 space-y-3">
                <a href="{{ route('contact') }}" class="btn-primary w-full justify-center min-h-[44px]">Contact Concierge</a>
                <a href="{{ route('rooms.index') }}" class="btn-outline w-full justify-center min-h-[44px]">Add A Room</a>
            </div>
            <div class="soft-divider mt-6 pt-4 text-xs text-charcoal-70">
                Questions? Call +251 11 XXX XXXX.
            </div>
        </aside>
    </div>
</section>

@endsection


