@extends('layouts.app')

@section('title', __('messages.rooms') . ' - ' . config('app.name'))

@section('meta')
    <meta name="description" content="{{ __('messages.rooms_meta_description') }}">
    <meta property="og:title" content="{{ __('messages.rooms') }} - {{ config('app.name') }}">
    <meta property="og:description" content="{{ __('messages.rooms_meta_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-rooms.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')

{{-- Hero Section - Cinematic Luxury --}}
<section class="relative min-h-[80vh] flex items-center lg:items-end pb-16 lg:pb-24 overflow-hidden bg-charcoal">
    {{-- Radial Gold Glow --}}
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_30%,rgba(212,175,55,0.15)_0%,transparent_60%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_70%,rgba(212,175,55,0.08)_0%,transparent_60%)]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        {{-- Hero Text --}}
        <div data-reveal class="space-y-6">
            <span class="inline-block text-xs uppercase tracking-[0.4em] text-brass font-medium">
                {{ __('messages.rooms_section_label') }}
            </span>
            <h1 class="font-display text-5xl lg:text-6xl xl:text-7xl text-white leading-tight">
                {{ __('messages.rooms') }}
            </h1>
            <p class="text-lg text-white/70 max-w-xl leading-relaxed">
                {{ __('messages.rooms_description') }}
            </p>

            {{-- Refined Stats --}}
            <div class="flex gap-8 pt-4">
                <div>
                    <div class="text-3xl font-display text-brass">{{ $rooms->total() }}</div>
                    <div class="text-xs uppercase tracking-wider text-white/60">{{ __('messages.total_rooms') }}</div>
                </div>
                <div class="w-px h-12 bg-white/20"></div>
                <div>
                    <div class="text-3xl font-display text-brass">{{ __('messages.suites_count') }}</div>
                    <div class="text-xs uppercase tracking-wider text-white/60">{{ __('messages.executive_suites') }}</div>
                </div>
            </div>
        </div>

        {{-- Hero Image --}}
        <div class="relative" data-reveal data-reveal-delay="200">
            <div class="relative rounded-[2rem] overflow-hidden aspect-[4/3] shadow-2xl">
                <img src="{{ asset('images/IMG_6115.PNG') }}" 
                     alt="{{ __('messages.hero_image_alt') }}"
                     class="w-full h-full object-cover transform transition-transform duration-1000 hover:scale-105"
                     loading="eager"
                     decoding="async">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-60"></div>
            </div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 border-2 border-brass/20 rounded-full -z-10"></div>
        </div>
    </div>
</section>

{{-- Rooms Grid - Cinematic Cards --}}
<section class="py-24 bg-[#FAF8F5]" aria-labelledby="rooms-listing-heading">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 id="rooms-listing-heading" class="sr-only">{{ __('messages.rooms_listing') }}</h2>

        @if($rooms->isEmpty())
            {{-- Empty State --}}
            <div class="max-w-2xl mx-auto text-center py-20">
                <div class="w-24 h-24 mx-auto mb-8 rounded-full bg-brass/10 flex items-center justify-center">
                    <svg class="w-12 h-12 text-brass" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <p class="text-xl text-charcoal-70 mb-8">{{ __('messages.no_rooms_available') }}</p>
                <a href="{{ route('home') }}" class="btn-primary">{{ __('messages.return_home') }}</a>
            </div>
        @else
            <div class="space-y-20">
                @foreach($rooms as $room)
                    <article class="group relative bg-white rounded-[2rem] overflow-hidden shadow-2xl hover:shadow-3xl transition-all duration-700" data-reveal itemscope itemtype="https://schema.org/Product">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brass via-brass-light to-brass transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-700"></div>
                        
                        <div class="flex flex-col lg:flex-row {{ $loop->even ? 'lg:flex-row-reverse' : '' }}">
                            {{-- Image --}}
                            <div class="lg:w-3/5 relative overflow-hidden bg-charcoal rounded-[2rem] shadow-inner">
                                @php
                                    $imageUrl = $room->images[0] ?? asset('images/IMG_6119.PNG');
                                @endphp
                                <div class="aspect-[4/3] lg:aspect-auto lg:h-full relative overflow-hidden">
                                    <img src="{{ $imageUrl }}" 
                                         alt="{{ $room->getTranslatedName() }}" 
                                         class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110"
                                         loading="lazy"
                                         decoding="async"
                                         itemprop="image">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-70 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                                
                                {{-- Price Tag --}}
                                <div class="absolute bottom-6 left-6 z-10">
                                    <div class="bg-white/95 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg">
                                        <span class="text-sm uppercase tracking-[0.2em] text-charcoal-60">{{ __('messages.from') }}</span>
                                        <span class="text-2xl font-display text-brass ml-2">${{ number_format($room->base_price,0) }}</span>
                                        <span class="text-sm text-charcoal-60">/{{ __('messages.night') }}</span>
                                    </div>
                                </div>
                                
                                {{-- Room Number --}}
                                <div class="absolute top-6 right-6 z-10">
                                    <div class="w-16 h-16 rounded-full bg-brass flex items-center justify-center text-white font-display text-2xl shadow-lg">
                                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </div>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="lg:w-2/5 p-8 lg:p-12 flex flex-col justify-between bg-white rounded-[2rem]">
                                <div class="space-y-6">
                                    {{-- Room Title --}}
                                    <div class="space-y-2">
                                        <span class="text-xs uppercase tracking-[0.3em] text-brass">{{ $room->category ?? __('messages.suite') }}</span>
                                        <h3 class="font-display text-3xl lg:text-4xl text-charcoal">{{ $room->getTranslatedName() }}</h3>
                                    </div>

                                    {{-- Features --}}
                                    <div class="grid grid-cols-3 gap-4 py-6 border-y border-stone-100">
                                        <div class="text-center">
                                            <div class="text-sm text-charcoal-60">{{ __('messages.size') }}</div>
                                            <div class="font-display text-xl text-charcoal">{{ $room->size_sqm }}<span class="text-sm ml-1">m²</span></div>
                                        </div>
                                        <div class="text-center border-x border-stone-100">
                                            <div class="text-sm text-charcoal-60">{{ __('messages.beds') }}</div>
                                            <div class="font-display text-xl text-charcoal">{{ $room->beds }}</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="text-sm text-charcoal-60">{{ __('messages.view') }}</div>
                                            <div class="font-display text-xl text-charcoal">{{ ucfirst(substr($room->view_type,0,3)) }}</div>
                                        </div>
                                    </div>

                                    {{-- Amenities --}}
                                    @if($room->amenities)
                                        <div class="space-y-3">
                                            <h4 class="text-xs uppercase tracking-[0.2em] text-charcoal-40">{{ __('messages.curated_amenities') }}</h4>
                                            <div class="flex flex-wrap gap-2">
                                                @foreach(array_slice($room->amenities,0,4) as $amenity)
                                                    <span class="px-4 py-2 bg-linen text-charcoal-80 text-sm rounded-full border border-stone-200">{{ $amenity }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                {{-- Actions --}}
                                <div class="flex flex-wrap gap-4 pt-8">
                                    <a href="{{ route('rooms.show', $room) }}" 
                                       class="group flex-1 inline-flex items-center justify-center gap-2 px-6 py-4 border-2 border-charcoal text-charcoal hover:bg-charcoal hover:text-white transition-all duration-300 text-sm uppercase tracking-[0.2em]">
                                        <span>{{ __('messages.view_details') }}</span>
                                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('booking.create',['room_id'=>$room->id]) }}" 
                                       class="group flex-1 inline-flex items-center justify-center gap-2 px-6 py-4 bg-brass text-white hover:bg-brass-dark transition-all duration-300 text-sm uppercase tracking-[0.2em]">
                                        <span>{{ __('messages.book_now') }}</span>
                                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-20">
                {{ $rooms->links('vendor.pagination.corporate') }}
            </div>
        @endif
    </div>
</section>

@endsection

@push('styles')
<style>
    /* Luxury Reveal Animations */
    [data-reveal]{opacity:0; transform:translateY(30px); transition:all 0.8s cubic-bezier(0.4,0,0.2,1);}
    [data-reveal].revealed{opacity:1; transform:translateY(0);}
    [data-reveal-delay="200"].revealed{transition-delay:0.2s;}

    /* Button Shine */
    .btn-primary{position:relative; overflow:hidden;}
    .btn-primary::after{content:''; position:absolute; inset:0; background:linear-gradient(120deg, rgba(255,255,255,0.2) 0%, transparent 100%); transform:translateX(-100%) skewX(-12deg); transition:transform 0.6s cubic-bezier(0.3,1,0.8,1);}
    .btn-primary:hover::after{transform:translateX(0);}
    .btn-primary:active{transform:scale(0.95);}

    /* Scrollbar */
    ::-webkit-scrollbar{width:8px; height:8px;}
    ::-webkit-scrollbar-track{background:#F5F1EA;}
    ::-webkit-scrollbar-thumb{background:#C5A572; border-radius:4px;}
    ::-webkit-scrollbar-thumb:hover{background:#B3945E;}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded',function(){
    const observer = new IntersectionObserver(entries=>{
        entries.forEach(entry=>{
            if(entry.isIntersecting) entry.target.classList.add('revealed');
        });
    },{threshold:0.1, rootMargin:'0px 0px -50px 0px'});
    document.querySelectorAll('[data-reveal]').forEach(el=>observer.observe(el));
});
</script>
@endpush
