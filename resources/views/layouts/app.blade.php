<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
            @yield('title') &mdash; FiraHotel
        @else
            FiraHotel &mdash; Ethiopian Luxury Hospitality
        @endif
    </title>

    <meta name="description" content="FiraHotel - Experience Ethiopian luxury hospitality, refined stays, and curated experiences at Africa's premier destination.">
    
    <!-- Open Graph / Social Meta -->
    <meta property="og:title" content="FiraHotel | Luxury Ethiopian Hospitality">
    <meta property="og:description" content="Experience unparalleled luxury where Ethiopian heritage meets contemporary elegance.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    
    <!-- Font Preload -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&family=Noto+Sans+Ethiopic:wght@400;500;600;700&display=swap');
        
        :root {
            --color-primary: #0A2463;
            --color-gold: #D4AF37;
            --color-gold-light: #F4E5C3;
            --color-gold-dark: #B59A6A;
            --color-ink: #111827;
            --color-cream: #F8F9FA;
            --color-border: rgba(17, 24, 39, 0.08);
            --color-success: #2E8B57;
            --color-warning: #E2725B;
            --color-error: #EF4444;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--color-cream);
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--color-gold), var(--color-gold-dark));
            border-radius: 5px;
            border: 2px solid var(--color-cream);
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--color-gold-dark), var(--color-gold));
        }
        
        /* Selection styling */
        ::selection {
            background-color: rgba(212, 175, 55, 0.25);
            color: var(--color-primary);
        }

        /* FIX: Navigation Bar Fix */
        header {
            position: fixed !important;
            top: 0 !important;
            width: 100% !important;
            z-index: 99999 !important;
            background: rgba(10, 36, 99, 0.94) !important;
            backdrop-filter: blur(10px) !important;
            border-bottom: 1px solid rgba(212, 175, 55, 0.18) !important;
            transition: all 0.3s ease !important;
        }

        /* Fix for when scrolled */
        header.scrolled {
            background: rgba(10, 36, 99, 0.98) !important;
            box-shadow: 0 10px 30px rgba(10, 36, 99, 0.3) !important;
        }

        /* Ensure main content starts below header */
        main {
            padding-top: 0 !important;
            margin-top: 0 !important;
        }

        /* Fix for first section in homepage */
        section:first-of-type {
            padding-top: 0 !important;
            margin-top: 0 !important;
        }

        /* Ensure hero section doesn't overlap with nav */
        .hero-section {
            margin-top: 80px !important;
            min-height: calc(100vh - 80px) !important;
        }

        /* Fix for mobile menu z-index */
        .mobile-menu {
            z-index: 99998 !important;
        }

        /* Fix for announcement bar */
        .announcement-bar {
            z-index: 99999 !important;
        }

        /* Skip link and focus outlines */
        .skip-to-content {
            position: absolute;
            left: -9999px;
            top: 8px;
            background: #fff;
            color: var(--color-primary);
            padding: 10px 16px;
            border: 2px solid var(--color-primary);
            border-radius: 6px;
            font-weight: 600;
            z-index: 100000;
        }

        .skip-to-content:focus-visible {
            left: 16px;
        }

        :focus-visible {
            outline: 2px solid var(--color-gold);
            outline-offset: 3px;
        }

        .font-serif {
            font-family: 'Playfair Display', serif !important;
        }

        .font-ethiopic {
            font-family: 'Noto Sans Ethiopic', sans-serif !important;
        }
    </style>
</head>

<body class="antialiased bg-[var(--color-cream)] text-[var(--color-ink)] font-sans overflow-x-hidden"
    x-data="{
        mobileMenuOpen: false,
        languageMenuOpen: false,
        scrolled: false,
        showAnnouncement: localStorage.getItem('hideAnnouncement') !== 'true',
        toggleScroll(state) {
            document.body.classList.toggle('overflow-hidden', state);
        },
        hideAnnouncement() {
            this.showAnnouncement = false;
            localStorage.setItem('hideAnnouncement', 'true');
        },
        init() {
            window.addEventListener('scroll', () => {
                this.scrolled = window.scrollY > 20;
                // Update header class
                const header = document.querySelector('header');
                if (header) {
                    if (this.scrolled) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                }
            });
            
            // Handle escape key
            window.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    this.mobileMenuOpen = false;
                    this.languageMenuOpen = false;
                }
            });

            // Ensure header has correct z-index
            const header = document.querySelector('header');
            if (header) {
                header.style.zIndex = '99999';
            }
        }
    }"
    x-effect="toggleScroll(mobileMenuOpen)"
>

<a href="#main-content" class="skip-to-content">Skip to main content</a>

<!-- ================= HEADER ================= -->
<header class="fixed inset-x-0 top-0 z-[99999] transition-all duration-500 announcement-bar text-white"
:class="scrolled ? 'bg-[rgba(10,36,99,0.96)] backdrop-blur-lg border-b border-white/10 shadow-xl' : 'bg-[rgba(10,36,99,0.9)] border-b border-white/5'">
    
    <!-- Top Announcement Bar -->
    <div x-show="showAnnouncement"
         x-transition
         class="bg-gradient-to-r from-[var(--color-gold)] via-[#E6C779] to-[var(--color-gold)] text-[var(--color-primary)] py-2 px-4 relative"
        ev style="z-index: 99999;">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <span class="inline-flex items-center gap-2 text-sm font-medium tracking-wide">
                <span aria-hidden="true" class="inline-block h-2 w-2 rounded-full bg-[var(--color-primary)]"></span>
                {{ __('messages.exclusive_offer', ['offer' => 'Book 3 nights & get 1 complimentary spa treatment']) }}
            </span>
            <div class="flex items-center gap-4">
                <a href="{{ route('booking.create') }}" 
                   class="hidden md:inline text-sm font-semibold text-[var(--color-primary)] hover:text-[var(--color-primary)] underline decoration-[var(--color-primary)] decoration-2 underline-offset-2">
                    {{ __('messages.book_now') }}
                </a>
                <button @click="hideAnnouncement" 
                        class="text-[var(--color-primary)]/60 hover:text-[var(--color-primary)]"
                        aria-label="Close announcement">
                    &times;
                </button>
            </div>
        </div>
    </div>
    
    <nav class="relative" aria-label="Primary Navigation">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo -->
                <a href="{{ route('home') }}" 
                   class="flex items-center gap-3 group"
                   aria-label="FiraHotel Home">
                    <div class="relative">
                        <div class="w-10 h-10 bg-gradient-to-br from-[#D4AF37] to-[#B59A6A] rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-500 shadow-lg">
                            <span class="text-white text-xl font-bold">F</span>
                        </div>
                        <div class="absolute -inset-1 bg-gradient-to-br from-[#D4AF37]/20 to-transparent rounded-lg blur opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    <div class="hidden sm:block">
                        <span class="font-serif text-2xl font-medium text-white tracking-tight">FiraHotel</span>
                        <span class="block text-xs text-white/80 font-normal tracking-wider">ETHIOPIA</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center gap-6">
                    @foreach ([
                        ['route' => 'home', 'label' => 'messages.home'],
                        ['route' => 'rooms.index', 'label' => 'messages.rooms'],
                        ['route' => 'experiences.index', 'label' => 'messages.experiences'],
                        ['route' => 'about', 'label' => 'messages.about'],
                        ['route' => 'contact', 'label' => 'messages.contact'],
                    ] as $item)
                        @if(Route::has($item['route']))
                        <div class="relative group/nav-item">
                            <a href="{{ route($item['route']) }}" 
                               class="flex items-center gap-2 px-4 py-2 rounded-md transition-all duration-300 font-medium text-sm tracking-wide"
                               :class="{
                                   'bg-[var(--color-gold)] text-[var(--color-primary)] shadow-lg': '{{ request()->routeIs($item['route'] . '*') }}',
                                   'text-white hover:text-[var(--color-gold)] hover:bg-white/5': !'{{ request()->routeIs($item['route'] . '*') }}'
                               }">
                                <span>{{ __($item['label']) }}</span>
                            </a>
                            
                            <!-- Hover indicator -->
                            <div class="absolute inset-x-0 -bottom-2 h-0.5 bg-gradient-to-r from-[#D4AF37] to-[#B59A6A] transform scale-x-0 group-hover/nav-item:scale-x-100 transition-transform duration-300 origin-left"></div>
                        </div>
                        @endif
                    @endforeach
                </div>

                <!-- Right Actions -->
                <div class="flex items-center gap-3">

                    <!-- Language Switcher -->
                    <div class="relative" @keydown.escape="languageMenuOpen=false" x-data="{ selectedLocale: '{{ app()->getLocale() }}' }">
                        <button
                            @click="languageMenuOpen = !languageMenuOpen"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg transition-all duration-300 hover:bg-[#FAF8F5]/10 group"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <span class="text-lg">
                                {{ config('localization.locales.' . app()->getLocale() . '.flag') }}
                            </span>
                            <span class="hidden md:inline text-sm font-medium text-white/80 {{ in_array(app()->getLocale(), ['am','om']) ? 'font-ethiopic' : '' }}">
                                {{ config('localization.locales.' . app()->getLocale() . '.native') }}
                            </span>
                            <svg class="w-4 h-4 text-white/60 group-hover:text-[#D4AF37] transition-colors" 
                                 fill="none" 
                                 stroke="currentColor" 
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div
                            x-show="languageMenuOpen"
                            x-transition
                            @click.away="languageMenuOpen=false"
                            class="absolute right-0 mt-2 w-48 rounded-xl bg-white border border-[#E5E3DC] shadow-xl py-2 z-[99999]"
                            style="display: none;"
                        >
                            @foreach(config('localization.supported_locales') as $locale)
                                <a
                                    href="{{ route('locale.switch', $locale) }}"
                                    class="flex items-center gap-3 px-4 py-3 text-sm font-medium transition-all duration-300 hover:bg-[#FAF8F5] group"
                                    :class="{ 'bg-[#FAF8F5] text-[#D4AF37]': '{{ app()->getLocale() }}' === '{{ $locale }}' }"
                                >
                                    <span class="text-lg">
                                        {{ config('localization.locales.' . $locale . '.flag') }}
                                    </span>
                                    <span class="{{ in_array($locale,['am','om']) ? 'font-ethiopic' : '' }}">
                                        {{ config('localization.locales.' . $locale . '.native') }}
                                    </span>
                                    @if(app()->getLocale() === $locale)
                                        <svg class="w-4 h-4 ml-auto text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="hidden lg:block w-px h-6 bg-white/20"></div>

                    <!-- Primary CTA -->
                    @if(Route::has('booking.create'))
                    <a href="{{ route('booking.create') }}" 
                       class="group relative px-5 py-2.5 bg-gradient-to-r from-[#D4AF37] to-[#B59A6A] text-[#0C0B0A] font-medium text-sm tracking-wider uppercase rounded-full overflow-hidden transition-all duration-500 hover:shadow-lg hover:shadow-[#D4AF37]/30 hover:scale-105">
                        <span class="relative z-10 flex items-center gap-2">
                            {{ __('messages.book_now') }}
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" 
                                 fill="none" 
                                 stroke="currentColor" 
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-white to-[#F9F7F3] opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                    </a>
                    @endif

                    <!-- Mobile Menu Toggle -->
                    <button
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        class="lg:hidden p-2 rounded-lg transition-all duration-300 hover:bg-[#FAF8F5]/10 group relative"
                        aria-label="Toggle Menu"
                        :aria-expanded="mobileMenuOpen"
                    >
                        <div class="relative w-6 h-6">
                            <span class="absolute top-1 left-0 w-6 h-0.5 bg-white rounded-full transform transition-all duration-300"
                                  :class="mobileMenuOpen ? 'rotate-45 top-3' : ''"></span>
                            <span class="absolute top-3 left-0 w-6 h-0.5 bg-white rounded-full transition-all duration-300"
                                  :class="mobileMenuOpen ? 'opacity-0' : 'opacity-100'"></span>
                            <span class="absolute bottom-1 left-0 w-6 h-0.5 bg-white rounded-full transform transition-all duration-300"
                                  :class="mobileMenuOpen ? '-rotate-45 top-3' : ''"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div
            x-show="mobileMenuOpen"
            x-transition
            class="lg:hidden absolute inset-x-0 top-full bg-white border-t border-[#E5E3DC] shadow-xl max-h-[calc(100vh-80px)] overflow-y-auto mobile-menu"
            style="display: none;"
        >
            <div class="px-4 py-6 space-y-1">
                @foreach ([
                    ['route' => 'home', 'label' => 'messages.home'],
                    ['route' => 'rooms.index', 'label' => 'messages.rooms'],
                    ['route' => 'experiences.index', 'label' => 'messages.experiences'],
                    ['route' => 'about', 'label' => 'messages.about'],
                    ['route' => 'contact', 'label' => 'messages.contact'],
                ] as $item)
                    @if(Route::has($item['route']))
                    <a href="{{ route($item['route']) }}" 
                       class="flex items-center gap-3 px-4 py-4 rounded-lg transition-all duration-300 group"
                       :class="{ 
                           'bg-gradient-to-r from-[#D4AF37]/10 to-[#B59A6A]/5 text-[#D4AF37]': '{{ request()->routeIs($item['route'] . '*') }}',
                           'hover:bg-[#FAF8F5] hover:text-[#D4AF37]': !'{{ request()->routeIs($item['route'] . '*') }}'
                       }"
                       @click="mobileMenuOpen = false">
                        <span class="font-medium">{{ __($item['label']) }}</span>
                        @if(request()->routeIs($item['route'] . '*'))
                            <svg class="w-4 h-4 ml-auto text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        @endif
                    </a>
                    @endif
                @endforeach
                
                <div class="pt-4 mt-4 border-t border-[#E5E3DC] space-y-3">
                    <!-- Contact Info -->
                    <div class="px-4 py-3 bg-[#FAF8F5] rounded-lg">
                        <div class="flex items-center gap-3 mb-2">
                            <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <div>
                                <div class="text-sm font-medium">{{ __('messages.contact_us') }}</div>
                                <a href="tel:+251112345678" class="text-sm text-white/70">+251 11 234 5678</a>
                            </div>
                        </div>
                    </div>
                    
                    @if(Route::has('booking.create'))
                    <a href="{{ route('booking.create') }}" 
                       class="block text-center px-6 py-4 bg-gradient-to-r from-[#D4AF37] to-[#B59A6A] text-[#0C0B0A] font-medium rounded-full hover:opacity-90 transition-opacity">
                        {{ __('messages.book_now') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- ================= MAIN ================= -->
<main id="main-content" class="pt-0" style="padding-top: 80px;"> <!-- Added padding to account for fixed header -->
    @yield('content')
</main>

<!-- ================= FOOTER ================= -->
<footer class="relative bg-gradient-to-br from-[#0C0B0A] to-[#2C2A26] text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="
            background-image: radial-gradient(circle at 20% 80%, rgba(212, 175, 55, 0.15) 0%, transparent 50%),
                              radial-gradient(circle at 80% 20%, rgba(181, 154, 106, 0.1) 0%, transparent 50%);
        "></div>
    </div>
    
    <!-- Footer Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <!-- Main Footer Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 lg:gap-16 mb-16">
            
            <!-- Brand Column -->
            <div class="lg:col-span-1">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-4 mb-8 group">
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#D4AF37] to-[#B59A6A] rounded-xl flex items-center justify-center shadow-lg">
                            <span class="text-white text-2xl font-bold">F</span>
                        </div>
                        <div class="absolute -inset-2 bg-gradient-to-br from-[#D4AF37]/20 to-transparent rounded-xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    <div>
                        <span class="font-serif text-3xl font-medium tracking-tight block">FiraHotel</span>
                        <span class="text-sm text-white/60 tracking-wider">ETHIOPIAN LUXURY</span>
                    </div>
                </a>
                
                <p class="text-white/70 text-sm leading-relaxed tracking-wide mb-8 max-w-xs">
                    Where timeless Ethiopian heritage meets contemporary luxury, creating unforgettable experiences since 2010.
                </p>
                
                <!-- Utility Links -->
                <div class="flex flex-wrap gap-3">
                    @foreach([
                        ['label' => 'Valet Parking', 'abbr' => 'VP', 'url' => '#parking'],
                        ['label' => 'Email', 'abbr' => 'EM', 'url' => 'mailto:reservations@firahotel.com'],
                        ['label' => 'WhatsApp', 'abbr' => 'WA', 'url' => 'https://wa.me/251911234567'],
                    ] as $social)
                    <a href="{{ $social['url'] }}" 
                       class="min-w-[3rem] h-12 px-3 flex items-center justify-center rounded-xl bg-white/5 backdrop-blur-sm border border-white/10 hover:bg-white/10 hover:border-[var(--color-gold)]/50 transition-all duration-300 text-sm font-semibold tracking-wide"
                       aria-label="{{ $social['label'] }}">
                        <span>{{ $social['abbr'] }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="font-serif text-lg font-medium mb-6 tracking-wider flex items-center gap-2">
                    <span>EXPLORE</span>
                    <div class="h-px flex-1 bg-gradient-to-r from-[#D4AF37] to-transparent"></div>
                </h4>
                <ul class="space-y-4">
                    @foreach([
                        ['route' => 'rooms.index', 'label' => 'Rooms & Suites'],
                        ['route' => 'experiences.index', 'label' => 'Experiences'],
                        ['route' => 'about', 'label' => 'Our Story'],
                        ['route' => 'contact', 'label' => 'Contact Us'],
                    ] as $link)
                        @if(Route::has($link['route']))
                        <li>
                            <a href="{{ route($link['route']) }}" 
                               class="text-white/60 hover:text-[#D4AF37] text-sm tracking-wide transition-all duration-300 flex items-center gap-3 group">
                                <svg class="w-1.5 h-1.5 bg-[#D4AF37] rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300" 
                                     viewBox="0 0 6 6"></svg>
                                <span class="group-hover:translate-x-2 transition-transform duration-300">{{ $link['label'] }}</span>
                            </a>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            
            <!-- Contact & Newsletter -->
            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Contact Info -->
                    <div>
                        <h4 class="font-serif text-lg font-medium mb-6 tracking-wider flex items-center gap-2">
                            <span>CONTACT</span>
                            <div class="h-px flex-1 bg-gradient-to-r from-[#D4AF37] to-transparent"></div>
                        </h4>
                        <div class="space-y-6">
                            <div class="flex items-start gap-4 group">
                                <div class="w-10 h-10 bg-gradient-to-br from-[#D4AF37]/10 to-transparent rounded-lg flex items-center justify-center">
                                    <span class="text-xl text-[#D4AF37]">.</span>
                                </div>
                                <div>
                                    <p class="text-sm text-white/60 tracking-wide">Addis Ababa, Ethiopia</p>
                                    <p class="text-xs text-white/40 mt-1">Central Business District</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-4 group">
                                <div class="w-10 h-10 bg-gradient-to-br from-[#D4AF37]/10 to-transparent rounded-lg flex items-center justify-center">
                                    <span class="text-xl text-[#D4AF37]">.</span>
                                </div>
                                <div>
                                    <a href="tel:+251112345678" class="text-sm text-white/60 hover:text-[#D4AF37] transition-colors duration-300 tracking-wide block">
                                        +251 11 234 5678
                                    </a>
                                    <p class="text-xs text-white/40 mt-1">24/7 Concierge</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-4 group">
                                <div class="w-10 h-10 bg-gradient-to-br from-[#D4AF37]/10 to-transparent rounded-lg flex items-center justify-center">
                                    <span class="text-xl text-[#D4AF37]">.</span>
                                </div>
                                <div>
                                    <a href="mailto:reservations@firahotel.com" class="text-sm text-white/60 hover:text-[#D4AF37] transition-colors duration-300 tracking-wide block">
                                        reservations@firahotel.com
                                    </a>
                                    <p class="text-xs text-white/40 mt-1">General Inquiries</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Newsletter -->
                    <div>
                        <h4 class="font-serif text-lg font-medium mb-6 tracking-wider flex items-center gap-2">
                            <span>NEWSLETTER</span>
                            <div class="h-px flex-1 bg-gradient-to-r from-[#D4AF37] to-transparent"></div>
                        </h4>
                        <p class="text-white/60 text-sm mb-6 leading-relaxed">
                            Subscribe for exclusive offers, luxury insights, and curated experiences.
                        </p>
                        <form x-data="{
                            email: '',
                            submitting: false,
                            success: false,
                            async submitForm() {
                                if (this.submitting) return;
                                this.submitting = true;
                                
                                try {
                                    // Simulate API call
                                    await new Promise(resolve => setTimeout(resolve, 1000));
                                    this.success = true;
                                    this.email = '';
                                    
                                    setTimeout(() => this.success = false, 3000);
                                } finally {
                                    this.submitting = false;
                                }
                            }
                        }" @submit.prevent="submitForm" class="space-y-4">
                            <div class="relative">
                                <input type="email" 
                                       x-model="email"
                                       required
                                       placeholder="Your email address"
                                       class="w-full px-5 py-3 bg-white/5 border border-white/10 rounded-lg text-sm placeholder-white/30 focus:outline-none focus:border-[#D4AF37] transition-colors duration-300">
                            </div>
                            <button type="submit" 
                                    :disabled="submitting"
                                    class="w-full px-6 py-3 bg-gradient-to-r from-[#D4AF37] to-[#B59A6A] text-[#0C0B0A] text-sm font-medium tracking-wider rounded-lg hover:opacity-90 transition-opacity duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                <span x-show="!submitting && !success">Subscribe</span>
                                <span x-show="submitting" class="flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Subscribing...
                                </span>
                                <span x-show="success" class="flex items-center justify-center gap-2">\n                                Subscribed!
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <!-- Bottom Bar -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-xs text-white/40 tracking-wider">
                (c) {{ date('Y') }} FiraHotel Luxury Collection. All rights reserved.
            </div>
            
            <div class="flex items-center gap-6">
                <a href="#" class="text-xs text-white/40 hover:text-white transition-colors duration-300 tracking-wider">Privacy Policy</a>
                <a href="#" class="text-xs text-white/40 hover:text-white transition-colors duration-300 tracking-wider">Terms of Service</a>
                <a href="#" class="text-xs text-white/40 hover:text-white transition-colors duration-300 tracking-wider">Accessibility</a>
                <a href="#" class="text-xs text-white/40 hover:text-white transition-colors duration-300 tracking-wider">Careers</a>
            </div>
            
            <div class="text-xs text-white/40 tracking-wider flex items-center gap-2">
                <span>Designed with</span>
                <span class="text-[#D4AF37] animate-pulse">FIRA</span>
                <span>in Ethiopia</span>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button x-data="{
        show: false,
        init() {
            window.addEventListener('scroll', () => {
                this.show = window.scrollY > 500;
            });
        },
        scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }"
    x-show="show"
    @click="scrollToTop"
    class="fixed bottom-8 right-8 z-40 p-4 bg-gradient-to-br from-[#D4AF37] to-[#B59A6A] text-white rounded-full shadow-2xl hover:shadow-3xl hover:scale-110 active:scale-95 transition-all duration-300 group"
    style="display: none;"
    aria-label="Back to top">
    <svg class="w-5 h-5 transform group-hover:-translate-y-1 transition-transform duration-300" 
         fill="none" 
         stroke="currentColor" 
         viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
    <div class="absolute -inset-1 bg-gradient-to-br from-[#D4AF37]/20 to-transparent rounded-full blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
</button>

<!-- Cookie Consent -->
<div x-data="{
        show: !localStorage.getItem('cookiesAccepted'),
        acceptCookies() {
            localStorage.setItem('cookiesAccepted', 'true');
            this.show = false;
        }
    }"
    x-show="show"
    x-transition
    class="fixed bottom-0 inset-x-0 z-40 p-6 bg-gradient-to-r from-[#0C0B0A] to-[#2C2A26] border-t border-[#D4AF37]/20 shadow-2xl"
    style="display: none;">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex-1">
                <p class="text-white/80 text-sm leading-relaxed">
                    We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.
                    <a href="#" class="text-[#D4AF37] hover:underline ml-1">Learn more</a>
                </p>
            </div>
            <div class="flex items-center gap-4">
                <button @click="acceptCookies"
                        class="px-6 py-2 bg-gradient-to-r from-[#D4AF37] to-[#B59A6A] text-[#0C0B0A] font-medium text-sm rounded-full hover:opacity-90 transition-opacity">
                    Accept All
                </button>
                <button @click="acceptCookies"
                        class="px-6 py-2 border border-white/20 text-white text-sm rounded-full hover:border-[#D4AF37] hover:text-[#D4AF37] transition-colors">
                    Necessary Only
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notifications -->
<div x-data="{
        notifications: [],
        addNotification(message, type = 'info') {
            const id = Date.now();
            this.notifications.push({ id, message, type });
            setTimeout(() => this.removeNotification(id), 5000);
        },
        removeNotification(id) {
            this.notifications = this.notifications.filter(n => n.id !== id);
        }
    }" 
    class="fixed top-24 right-4 z-50 space-y-3"
    @notification.window="addNotification($event.detail.message, $event.detail.type)">
    <template x-for="notification in notifications" :key="notification.id">
        <div x-show="true"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-x-full"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 translate-x-full"
             class="bg-white/95 backdrop-blur-sm border border-[#E5E3DC] rounded-xl shadow-2xl p-4 max-w-xs min-w-[300px]"
             :class="{
                 'border-[#10B981]/30': notification.type === 'success',
                 'border-[#F59E0B]/30': notification.type === 'warning',
                 'border-[#EF4444]/30': notification.type === 'error',
                 'border-[#D4AF37]/30': notification.type === 'info'
             }">
            <div class="flex items-start gap-3">
                <div class="w-2 h-2 rounded-full mt-2 flex-shrink-0"
                     :class="{
                         'bg-[#10B981]': notification.type === 'success',
                         'bg-[#F59E0B]': notification.type === 'warning',
                         'bg-[#EF4444]': notification.type === 'error',
                         'bg-[#D4AF37]': notification.type === 'info'
                     }"></div>
                <div class="flex-1 min-w-0">
                    <p x-text="notification.message" class="text-sm text-[#2C2A26] break-words"></p>
                </div>
                <button @click="removeNotification(notification.id)" 
                        class="text-[#2C2A26]/40 hover:text-[#2C2A26] flex-shrink-0">
                    &times;
                </button>
            </div>
        </div>
    </template>
</div>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- Custom Global JS -->
<script>
document.addEventListener('alpine:init', () => {
    // Initialize tooltips
    Alpine.data('tooltip', () => ({
        show: false,
        position: 'top',
        content: '',
        init() {
            this.$el.setAttribute('x-tooltip', '');
        },
        updatePosition() {
            const rect = this.$el.getBoundingClientRect();
            // Position calculation logic
        }
    }));
    
    // Initialize form validation with animations
    Alpine.data('form', () => ({
        submitting: false,
        success: false,
        error: false,
        async submit(event) {
            if (this.submitting) return;
            this.submitting = true;
            this.error = false;
            
            try {
                await this.$el.requestSubmit();
                this.success = true;
                setTimeout(() => this.success = false, 3000);
            } catch (e) {
                this.error = true;
                setTimeout(() => this.error = false, 3000);
            } finally {
                this.submitting = false;
            }
        }
    }));
    
    // Initialize parallax effect
    Alpine.data('parallax', () => ({
        speed: 0.5,
        init() {
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * this.speed;
                this.$el.style.transform = `translateY(${rate}px)`;
            });
        }
    }));
});

// Smooth scroll for anchor links with offset for header
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
        
        const target = document.querySelector(targetId);
        if (target) {
            const headerHeight = document.querySelector('header').offsetHeight;
            const targetPosition = target.offsetTop - headerHeight - 20;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Lazy loading for images with blur effect
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                
                // Load low-res first, then high-res
                const lowResSrc = img.dataset.lowres;
                const highResSrc = img.dataset.src || img.src;
                
                if (lowResSrc) {
                    img.src = lowResSrc;
                    img.classList.add('blur-sm');
                }
                
                // Load high-res image
                const highResImage = new Image();
                highResImage.src = highResSrc;
                highResImage.onload = () => {
                    img.src = highResSrc;
                    img.classList.remove('blur-sm', 'lazy');
                    img.classList.add('loaded');
                };
                
                observer.unobserve(img);
            }
        });
    }, {
        rootMargin: '50px 0px',
        threshold: 0.1
    });

    document.querySelectorAll('img.lazy').forEach(img => imageObserver.observe(img));
}

// Add active class to current page in navigation
document.addEventListener('DOMContentLoaded', () => {
    const currentPath = window.location.pathname;
    document.querySelectorAll('nav a[href]').forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('active');
        }
    });
});

// Keyboard navigation for accessibility
document.addEventListener('keydown', (e) => {
    // Skip if user is typing in input/textarea
    if (['INPUT', 'TEXTAREA', 'SELECT'].includes(document.activeElement.tagName)) return;
    
    // Close modals on Escape
    if (e.key === 'Escape') {
        const openModals = document.querySelectorAll('[x-show][x-data]');
        openModals.forEach(modal => {
            if (modal.__x && modal.__x.$data) {
                if (modal.__x.$data.mobileMenuOpen) modal.__x.$data.mobileMenuOpen = false;
                if (modal.__x.$data.languageMenuOpen) modal.__x.$data.languageMenuOpen = false;
            }
        });
    }
});

// Performance optimization: Defer non-critical CSS
document.addEventListener('readystatechange', () => {
    if (document.readyState === 'interactive') {
        // Load non-critical CSS
        const nonCriticalCSS = document.createElement('link');
        nonCriticalCSS.rel = 'stylesheet';
        nonCriticalCSS.href = '/css/non-critical.css';
        nonCriticalCSS.media = 'print';
        nonCriticalCSS.onload = () => {
            nonCriticalCSS.media = 'all';
        };
        document.head.appendChild(nonCriticalCSS);
    }
});

// Ensure header stays on top and visible
document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('header');
    if (header) {
        // Force header to stay on top
        header.style.position = 'fixed';
        header.style.top = '0';
        header.style.width = '100%';
        header.style.zIndex = '99999';
        header.style.background = 'rgba(10, 10, 10, 0.98)';
        header.style.backdropFilter = 'blur(12px)';
        header.style.borderBottom = '1px solid rgba(212, 175, 55, 0.15)';
        
        // Add scroll event listener
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }
});
</script>

</body>
</html>













