@extends('layouts.app')

@section('title', 'Dining')

@section('content')

<section class="pt-6">
    <div class="max-w-6xl mx-auto px-5">
        <div class="grid grid-cols-1 md:grid-cols-[1.1fr_0.9fr] gap-10 items-center">
            <div data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Dining</p>
                <h1 class="font-display text-4xl md:text-5xl mt-4">An intimate menu, designed for quiet evenings.</h1>
                <p class="mt-4 text-sm text-charcoal-70 measure">
                    Our kitchen favors warmth, local ingredients, and pacing that feels like a conversation.
                </p>
            </div>
            <div class="luxury-card overflow-hidden" data-reveal>
                <img src="{{ asset('Images/IMG_6121.PNG') }}"
                     alt="Dining ambiance" class="h-72 w-full object-cover" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<section class="mt-12">
    <div class="max-w-6xl mx-auto px-5" data-reveal>
        <div class="luxury-card p-6 md:p-8">
            <p class="text-xs uppercase tracking-[0.3em] text-brass">Chef Philosophy</p>
            <p class="mt-4 text-sm text-charcoal-70 measure-wide">
                We cook for the mood before the moment. Expect familiar flavors, slow heat, and plates that read well in low light.
            </p>
        </div>
    </div>
</section>

<section class="mt-12" data-menu>
    <div class="max-w-6xl mx-auto px-5">
        <div class="flex flex-wrap gap-3" data-reveal>
            <button type="button" class="chip" data-filter="gf" aria-pressed="false">GF</button>
            <button type="button" class="chip" data-filter="vegan" aria-pressed="false">Vegan</button>
            <button type="button" class="chip" data-filter="veg" aria-pressed="false">Vegetarian</button>
            <button type="button" class="chip" data-filter="local" aria-pressed="false">Local</button>
        </div>

        <div class="mt-8 space-y-10">
            <div data-reveal>
                <h2 class="font-display text-3xl">Morning</h2>
                <div class="mt-4 space-y-4">
                    <div class="luxury-card p-5" data-menu-item data-diet="veg local">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="font-display text-2xl">Teff Porridge</h3>
                                <p class="mt-2 text-sm text-charcoal-70">Warm honey, roasted sesame, seasonal fruit.</p>
                            </div>
                            <span class="text-sm uppercase tracking-[0.2em] text-brass">$12</span>
                        </div>
                    </div>
                    <div class="luxury-card p-5" data-menu-item data-diet="gf">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="font-display text-2xl">Garden Omelet</h3>
                                <p class="mt-2 text-sm text-charcoal-70">Herbs, goat cheese, olive oil toast.</p>
                            </div>
                            <span class="text-sm uppercase tracking-[0.2em] text-brass">$14</span>
                        </div>
                    </div>
                </div>
            </div>

            <div data-reveal>
                <h2 class="font-display text-3xl">Afternoon</h2>
                <div class="mt-4 space-y-4">
                    <div class="luxury-card p-5" data-menu-item data-diet="veg local">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="font-display text-2xl">Lentil Stew</h3>
                                <p class="mt-2 text-sm text-charcoal-70">Slow simmered berbere, soft injera.</p>
                            </div>
                            <span class="text-sm uppercase tracking-[0.2em] text-brass">$18</span>
                        </div>
                    </div>
                    <div class="luxury-card p-5" data-menu-item data-diet="gf local">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="font-display text-2xl">River Fish</h3>
                                <p class="mt-2 text-sm text-charcoal-70">Charred lemon, herb oil, garden greens.</p>
                            </div>
                            <span class="text-sm uppercase tracking-[0.2em] text-brass">$26</span>
                        </div>
                    </div>
                </div>
            </div>

            <div data-reveal>
                <h2 class="font-display text-3xl">Evening</h2>
                <div class="mt-4 space-y-4">
                    <div class="luxury-card p-5" data-menu-item data-diet="local">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="font-display text-2xl">Slow Braised Lamb</h3>
                                <p class="mt-2 text-sm text-charcoal-70">Forest herbs, smoked salt, sesame greens.</p>
                            </div>
                            <span class="text-sm uppercase tracking-[0.2em] text-brass">$34</span>
                        </div>
                    </div>
                    <div class="luxury-card p-5" data-menu-item data-diet="vegan gf">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="font-display text-2xl">Charred Eggplant</h3>
                                <p class="mt-2 text-sm text-charcoal-70">Tahini, roasted tomato, basil oil.</p>
                            </div>
                            <span class="text-sm uppercase tracking-[0.2em] text-brass">$22</span>
                        </div>
                    </div>
                </div>
            </div>

            <div data-reveal>
                <h2 class="font-display text-3xl">Nightcap</h2>
                <div class="mt-4 space-y-4">
                    <div class="luxury-card p-5" data-menu-item data-diet="veg">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="font-display text-2xl">Honeyed Citrus</h3>
                                <p class="mt-2 text-sm text-charcoal-70">Soft citrus, thyme, sparkling water.</p>
                            </div>
                            <span class="text-sm uppercase tracking-[0.2em] text-brass">$9</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 flex flex-wrap gap-3" data-reveal>
            <a href="{{ route('contact') }}" class="btn-outline">Request PDF</a>
            <span class="text-xs uppercase tracking-[0.3em] text-charcoal-60">QR codes in the hotel open this page.</span>
        </div>
    </div>
</section>

@endsection


