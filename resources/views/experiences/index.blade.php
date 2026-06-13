@extends('layouts.app')

@section('title', __('messages.experiences'))

@section('content')

<section class="pt-6">
    <div class="max-w-6xl mx-auto px-5">
        <div class="grid grid-cols-1 md:grid-cols-[1.2fr_0.8fr] gap-8 items-end">
            <div data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">{{ __('messages.experiences') }}</p>
                <h1 class="font-display text-4xl md:text-5xl mt-4">Rituals, wellness, and city calm.</h1>
                <p class="mt-4 text-sm text-charcoal-70 measure">
                    Choose an experience designed to slow the day down.
                </p>
            </div>
            <div class="relative rounded-[28px] overflow-hidden h-56 md:h-72" data-reveal>
                <img src="{{ asset('Images/experiences/coffee.svg') }}"
                     alt="Wellness ritual" class="h-full w-full object-cover" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<section class="mt-12">
    <div class="max-w-6xl mx-auto px-5">
        @if($experiences->isEmpty())
            <div class="luxury-card p-8 text-center">
                <p class="text-sm text-charcoal-70">No experiences available at the moment.</p>
                <a href="{{ route('home') }}" class="btn-primary mt-6 inline-flex">Return Home</a>
            </div>
        @else
            @foreach($experiences as $category => $categoryExperiences)
                <div class="mt-10 first:mt-0" data-reveal>
                    <h2 class="font-display text-3xl capitalize">{{ ucfirst($category) }}</h2>
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($categoryExperiences as $experience)
                            <article class="luxury-card overflow-hidden">
                                <div class="relative h-56">
                                    @if($experience->images && count($experience->images) > 0)
                                        <img src="{{ $experience->images[0] }}"
                                             alt="{{ $experience->getTranslatedName() }}"
                                             class="h-full w-full object-cover"
                                             loading="lazy" decoding="async">
                                    @else
                                        <img src="{{ asset('Images/experiences/spa.svg') }}"
                                             alt="{{ $experience->getTranslatedName() }}"
                                             class="h-full w-full object-cover"
                                             loading="lazy" decoding="async">
                                    @endif
                                    <div class="absolute bottom-4 left-4 rounded-full bg-linen-90 px-4 py-2 text-xs uppercase tracking-[0.2em] text-charcoal">
                                        {{ $experience->duration_minutes }} {{ __('messages.minutes') }}
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="font-display text-2xl {{ app()->getLocale() !== 'en' ? 'font-ethiopic' : '' }}">
                                        {{ $experience->getTranslatedName() }}
                                    </h3>
                                    <p class="mt-3 text-sm text-charcoal-70 line-clamp-3 {{ app()->getLocale() !== 'en' ? 'font-ethiopic' : '' }}">
                                        {{ $experience->getTranslatedDescription() }}
                                    </p>
                                    <div class="mt-4 flex items-center justify-between text-xs uppercase tracking-[0.2em] text-brass">
                                        <span>{{ $experience->hotel->getTranslatedName() }}</span>
                                        <a href="{{ route('experiences.show', $experience) }}">Learn More</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>

@endsection


