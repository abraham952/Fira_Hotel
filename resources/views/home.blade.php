@extends('layouts.app')

@section('title', __('messages.welcome'))

@section('content')

@php
    $heroCopy = __('messages.hero_copy', ['brand' => 'FiraHotel']);
    if ($heroCopy === 'messages.hero_copy') {
        $heroCopy = 'Where Ethiopian hospitality meets contemporary luxury at the heart of Addis Ababa.';
    }

    $heroAlt = __('messages.hero_alt', ['hotel' => 'FiraHotel']);
    if ($heroAlt === 'messages.hero_alt') {
        $heroAlt = 'Exterior of FiraHotel in Addis Ababa';
    }
@endphp

<section class="relative overflow-hidden bg-[#0A0B0D]">
    <div class="relative h-screen min-h-[600px] max-h-[900px] overflow-hidden group">
        <div class="absolute inset-0 transition-transform duration-[10000ms] ease-out scale-100 group-hover:scale-105">
            <img
                src="{{ asset('Images/IMG_6115.PNG') }}"
                alt="{{ $heroAlt }}"
                class="w-full h-full object-cover"
                loading="eager"
            />
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/20 to-black/70"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/40 via-transparent to-black/40"></div>
        </div>

        <div class="relative h-full flex items-center">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl">
                    <div class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-md border border-white/20 rounded-full px-5 py-2.5 mb-8 shadow-2xl">
                        <div class="w-2 h-2 bg-[#D4AF37] rounded-full animate-pulse shadow-[0_0_8px_rgba(212,175,55,0.8)]"></div>
                        <span class="text-white/95 text-xs tracking-[0.2em] uppercase font-medium">Ethiopia, Bishoftu</span>
                    </div>

                    <h1 class="font-serif text-5xl sm:text-6xl md:text-7xl lg:text-8xl text-white mb-6 leading-[1.1] tracking-tight drop-shadow-lg">
                        Where Heritage<br>
                        <span class="text-[#D4AF37] italic pr-4">Meets Luxury</span>
                    </h1>

                   
                </div>
            </div>
        </div>

        <a href="#collections" class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-3 opacity-70 hover:opacity-100 transition-opacity duration-300" aria-label="Scroll down">
            <span class="text-white/60 text-xs tracking-[0.2em] uppercase">Scroll</span>
            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex items-start justify-center p-2">
                <div class="w-1 h-2 bg-[#D4AF37] rounded-full animate-bounce"></div>
            </div>
        </a>
    </div>
</section>

@include('partials.reservation-widget')

<section id="collections" class="py-32 bg-[#FAF8F5] scroll-mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-24">
            <div class="flex items-center justify-center gap-4 mb-6">
                <span class="h-px w-8 bg-[#D4AF37]/40"></span>
                <span class="text-[#D4AF37] text-[11px] font-bold tracking-[0.5em] uppercase">The Art of Living</span>
                <span class="h-px w-8 bg-[#D4AF37]/40"></span>
            </div>
            <h2 class="font-serif text-5xl md:text-7xl font-light text-[#1A1816] mb-8 tracking-tight">
                {{ __('messages.rooms_and_suites') ?? 'Rooms & Suites' }}
            </h2>
            <p class="text-lg text-[#6B6560] max-w-2xl mx-auto leading-relaxed font-light">
                Discover a sanctuary where traditional Ethiopian heritage harmonizes with the pinnacle of modern luxury.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @foreach([
                [
                    'name' => 'Deluxe Suite',
                    'price' => 450,
                    'size' => '85 sqm',
                    'image' => 'images/IMG_6114.PNG',
                    'features' => ['City View', 'King Bed', 'Spa Bath']
                ],
                [
                    'name' => 'Executive Suite',
                    'price' => 650,
                    'size' => '120 sqm',
                    'image' => 'images/IMG_6122.PNG',
                    'features' => ['Panoramic View', 'Private Balcony', 'Butler Service']
                ],
                [
                    'name' => 'Presidential Suite',
                    'price' => 1200,
                    'size' => '240 sqm',
                    'image' => 'images/IMG_6118.PNG',
                    'features' => ['360 View', 'Private Pool', 'Personal Chef']
                ]
            ] as $suite)

            <div class="group flex flex-col">
                <div class="relative aspect-[4/5] overflow-hidden rounded-2xl mb-8 shadow-2xl shadow-black/5">

                    <!-- IMAGE FROM public/images -->
                    <img src="{{ asset($suite['image']) }}" 
                         alt="{{ $suite['name'] }}"
                         loading="lazy"
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-1000 ease-out">

                    <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition-colors duration-500"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>

                    <div class="absolute top-6 right-6 overflow-hidden rounded-xl">
                        <div class="bg-white/90 backdrop-blur-md px-5 py-3 border border-white/20 flex flex-col items-end">
                            <span class="text-[9px] font-bold text-[#1A1816]/40 uppercase tracking-tighter">Nightly</span>
                            <span class="text-xl font-serif text-[#1A1816]">${{ $suite['price'] }}</span>
                        </div>
                    </div>

                    <div class="absolute bottom-6 left-6 flex items-center gap-2">
                        <div class="h-8 px-4 bg-white/10 backdrop-blur-md border border-white/20 rounded-full flex items-center">
                            <span class="text-[10px] font-medium tracking-widest text-white uppercase">{{ $suite['size'] }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex-1 flex flex-col px-2">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-serif text-3xl text-[#1A1816] tracking-tight">{{ $suite['name'] }}</h3>
                    </div>

                    <p class="text-[#6B6560] text-sm leading-relaxed mb-6 font-light">
                        Hand-selected textiles meet expansive floor-to-ceiling vistas, creating a personal sanctuary of quiet elegance.
                    </p>
                    
                    <div class="flex flex-wrap gap-x-4 gap-y-2 mb-8 border-y border-[#E5E3DC]/60 py-4">
                        @foreach($suite['features'] as $feature)
                        <div class="flex items-center gap-1.5">
                            <div class="w-1 h-1 rounded-full bg-[#D4AF37]"></div>
                            <span class="text-[10px] uppercase font-bold text-[#1A1816]/60 tracking-widest">{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-auto">
                        <a href="{{ route('rooms.show', $loop->iteration) }}" 
                           class="relative inline-flex items-center gap-3 text-[11px] font-bold uppercase tracking-[0.2em] text-[#1A1816] group/link">
                            <span>Explore Suite</span>
                            <span class="h-px w-8 bg-[#D4AF37] group-hover/link:w-12 transition-all duration-300"></span>
                        </a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        
        <div class="mt-24 text-center">
            <a href="{{ route('rooms.index') }}" 
               class="group relative inline-flex items-center justify-center px-12 py-5 bg-[#1A1816] text-white overflow-hidden rounded-full transition-all duration-500 hover:shadow-[0_20px_40px_-10px_rgba(0,0,0,0.2)]">
                <span class="relative z-10 text-[11px] font-bold tracking-[0.3em] uppercase">View All Collections</span>
                <div class="absolute inset-0 bg-[#D4AF37] translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
            </a>
        </div>

    </div>
</section>


<section class="relative py-40 bg-[#0B0A09] overflow-hidden">

    <!-- Ambient Luxury Background -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_30%,rgba(212,175,55,0.12),transparent_60%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_70%,rgba(212,175,55,0.08),transparent_60%)]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 lg:gap-28 items-center">

            <!-- LEFT CONTENT -->
            <div>

                <div class="mb-10">
                    <span class="text-[#D4AF37] text-xs font-semibold tracking-[0.5em] uppercase flex items-center gap-5">
                        <div class="w-10 h-px bg-[#D4AF37]"></div>
                        Curated Experiences
                    </span>
                </div>

                <h2 class="font-serif text-5xl md:text-6xl xl:text-7xl font-light text-white leading-[1.1] mb-10">
                    Beyond
                    <span class="block text-[#D4AF37] italic mt-2">Accommodation</span>
                </h2>

                <p class="text-lg text-white/50 leading-relaxed tracking-wide max-w-xl mb-16">
                    Discover authentic Ethiopian culture through refined, private experiences curated by our master hospitality artisans.
                </p>

                <div class="space-y-12">

                    @foreach([
                        [
                            'icon' => '<svg class="w-7 h-7 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 8H4M4 8c0 4.418 3.582 8 8 8s8-3.582 8-8M4 8V6a2 2 0 012-2h12a2 2 0 012 2v2m-5 8v2a2 2 0 01-2 2H9a2 2 0 01-2-2v-2"></path></svg>',
                            'title' => 'Traditional Coffee Ceremony',
                            'desc' => 'Immerse yourself in ancient Ethiopian coffee rituals led by cultural guardians.'
                        ],
                        [
                            'icon' => '<svg class="w-7 h-7 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>',
                            'title' => 'Wellness & Spa Rituals',
                            'desc' => 'Holistic therapies crafted from organic Ethiopian botanicals.'
                        ],
                        [
                            'icon' => '<svg class="w-7 h-7 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>',
                            'title' => 'Private Culinary Journey',
                            'desc' => 'A multi-course tasting experience inspired by Ethiopian royal heritage.'
                        ],
                    ] as $experience)

                    <div class="flex items-start gap-6 group transition-all duration-500">

                        <div class="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xl
                                    group-hover:bg-[#D4AF37]/10 
                                    group-hover:border-[#D4AF37]/40 
                                    group-hover:shadow-[0_0_40px_rgba(212,175,55,0.15)]
                                    transition-all duration-500">

                            {!! $experience['icon'] !!}
                        </div>

                        <div>
                            <h4 class="font-serif text-2xl text-white mb-3 
                                       group-hover:text-[#D4AF37] transition-colors duration-500">
                                {{ $experience['title'] }}
                            </h4>
                            <p class="text-white/50 text-sm leading-relaxed max-w-md">
                                {{ $experience['desc'] }}
                            </p>
                        </div>

                    </div>

                    @endforeach

                </div>
            </div>

            <!-- RIGHT VISUAL GRID -->
            <div class="relative">

                <!-- Center Glow -->
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-[420px] h-[420px] bg-[#D4AF37]/15 blur-[140px] rounded-full"></div>
                </div>

                <div class="relative grid grid-cols-2 gap-8">

                    <!-- Column 1 -->
                    <div class="space-y-8">
                        <div class="relative h-80 rounded-2xl overflow-hidden group shadow-[0_25px_80px_-20px_rgba(0,0,0,0.6)]">
                            <img src="{{ asset('images/IMG_6122.PNG') }}"
                                 loading="lazy"
                                 alt="Coffee Ceremony"
                                 class="w-full h-full object-cover 
                                        transition-transform duration-[1400ms] ease-[cubic-bezier(.19,1,.22,1)] 
                                        group-hover:scale-110">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        </div>

                        <div class="relative h-64 rounded-2xl overflow-hidden group shadow-[0_25px_80px_-20px_rgba(0,0,0,0.6)]">
                            <img src="{{ asset('images/IMG_6126.PNG') }}"
                                 loading="lazy"
                                 alt="Spa Ritual"
                                 class="w-full h-full object-cover 
                                        transition-transform duration-[1400ms] ease-[cubic-bezier(.19,1,.22,1)] 
                                        group-hover:scale-110">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="space-y-8 mt-20">
                        <div class="relative h-64 rounded-2xl overflow-hidden group shadow-[0_25px_80px_-20px_rgba(0,0,0,0.6)]">
                            <img src="{{ asset('images/IMG_6121.PNG') }}"
                                 loading="lazy"
                                 alt="Culinary Experience"
                                 class="w-full h-full object-cover 
                                        transition-transform duration-[1400ms] ease-[cubic-bezier(.19,1,.22,1)] 
                                        group-hover:scale-110">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        </div>

                        <div class="relative h-80 rounded-2xl overflow-hidden group shadow-[0_25px_80px_-20px_rgba(0,0,0,0.6)]">
                            <img src="{{ asset('images/IMG_6117.PNG') }}"
                                 loading="lazy"
                                 alt="Architecture"
                                 class="w-full h-full object-cover 
                                        transition-transform duration-[1400ms] ease-[cubic-bezier(.19,1,.22,1)] 
                                        group-hover:scale-110">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<section class="relative py-32 overflow-hidden bg-[#1A1A1A]">
    <div class="absolute inset-0">
        <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M0,50 Q25,25 50,50 T100,50\' stroke=\'%23D4AF37\' fill=\'none\'/%3E%3C/svg%3E'); background-size: 200px;"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#1A1A1A]/80 to-[#1A1A1A]"></div>
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto text-center px-4">
        <div class="mb-12">
            <span class="text-[#D4AF37] text-sm font-semibold tracking-[0.4em] uppercase">Begin Your Journey</span>
        </div>
        
        <h2 class="font-serif text-5xl md:text-7xl font-light text-white mb-8 leading-tight tracking-tight">
            Ready to Experience<br>
            <span class="text-[#D4AF37] italic">True Luxury?</span>
        </h2>
        
        <p class="text-xl text-white/70 mb-12 max-w-2xl mx-auto leading-relaxed tracking-wide">
            Contact our dedicated concierge team for personalized arrangements and exclusive offers tailored just for you.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('booking.create') }}" 
               class="inline-flex items-center justify-center gap-3 px-10 py-4 rounded-sm bg-[#D4AF37] text-[#0A0B0D] font-semibold tracking-widest text-sm uppercase hover:bg-white transition-colors duration-300">
                {{ __('messages.book_now') ?? 'Reserve Now' }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
            
            <a href="tel:+251112345678" 
               class="inline-flex items-center justify-center gap-3 px-10 py-4 rounded-sm border border-white/30 text-white font-semibold tracking-widest text-sm uppercase hover:border-[#D4AF37] hover:bg-[#D4AF37]/10 transition-colors duration-300 backdrop-blur-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                +251 11 234 5678
            </a>
        </div>
        
        <div class="mt-20 pt-10 border-t border-white/10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
                <div class="space-y-3">
                    <div class="text-[#D4AF37] flex justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="text-white font-serif text-xl">{{ __('messages.concierge') ?? 'Dedicated Concierge' }}</div>
                    <p class="text-white/50 text-sm leading-relaxed">{{ __('messages.concierge_copy') ?? 'Personal assistance for itineraries, dining, and wellness.' }}</p>
                </div>
                <div class="space-y-3">
                    <div class="text-[#D4AF37] flex justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div class="text-white font-serif text-xl">{{ __('messages.safety') ?? 'Trusted Hospitality' }}</div>
                    <p class="text-white/50 text-sm leading-relaxed">{{ __('messages.safety_copy') ?? 'International standards paired with Ethiopian warmth.' }}</p>
                </div>
                <div class="space-y-3">
                    <div class="text-[#D4AF37] flex justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="text-white font-serif text-xl">{{ __('messages.flexibility') ?? 'Flexible Arrangements' }}</div>
                    <p class="text-white/50 text-sm leading-relaxed">{{ __('messages.flexibility_copy') ?? 'Early check-in and late check-out when available.' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection