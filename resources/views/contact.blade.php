@extends('layouts.app')

@section('title', __('messages.contact'))

@section('content')

<section class="pt-6">
    <div class="max-w-6xl mx-auto px-5">
        <div class="grid grid-cols-1 lg:grid-cols-[1.1fr_0.9fr] gap-10 items-center">
            <div data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Contact</p>
                <h1 class="font-display text-4xl md:text-5xl mt-4">We are here, always.</h1>
                <p class="mt-4 text-sm text-charcoal-70 measure">
                    Call, email, or open directions in a single tap. We know travel days can be long.
                </p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="tel:+251110000000" class="btn-primary">Call</a>
                    <a href="mailto:info@firahotel.com" class="btn-outline">Email</a>
                </div>
            </div>
            <div class="rounded-[28px] overflow-hidden luxury-card" data-reveal>
                <img src="{{ asset('Images/IMG_6120.PNG') }}"
                     alt="Lobby corner" class="h-72 w-full object-cover" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<section class="mt-12">
    <div class="max-w-6xl mx-auto px-5 grid grid-cols-1 lg:grid-cols-[1fr_1fr] gap-10">
        <div class="space-y-6" data-reveal>
            <div class="luxury-card p-6">
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Concierge</p>
                <div class="mt-4 space-y-3 text-sm text-charcoal-70">
                    <p>Phone: +251 11 XXX XXXX</p>
                    <p>Email: info@firahotel.com</p>
                    <p>WhatsApp: +251 9XX XXX XXX</p>
                </div>
            </div>
            <div class="luxury-card p-6">
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Location</p>
                <div class="mt-4 space-y-3 text-sm text-charcoal-70">
                    <p>Bole Road, Addis Ababa, Ethiopia</p>
                    <p>Reception: 24/7</p>
                    <p>Restaurant: 6:00 AM - 11:00 PM</p>
                    <p>Spa: 9:00 AM - 9:00 PM</p>
                </div>
            </div>
        </div>

        <div class="luxury-card p-6" data-reveal>
            <p class="text-xs uppercase tracking-[0.3em] text-brass">Directions</p>
            <div class="mt-4 rounded-[20px] overflow-hidden">
                <img src="{{ asset('Images/IMG_6122.PNG') }}"
                     alt="Map overview" class="h-64 w-full object-cover" loading="lazy" decoding="async">
            </div>
            <div class="mt-5 flex flex-wrap gap-3">
                <a href="https://maps.apple.com/?q=Fira%20Hotel%20Addis%20Ababa" class="btn-outline">Open in Apple Maps</a>
                <a href="https://www.google.com/maps/search/?api=1&query=Fira%20Hotel%20Addis%20Ababa" class="btn-primary">Open in Google Maps</a>
            </div>
        </div>
    </div>
</section>

@endsection


