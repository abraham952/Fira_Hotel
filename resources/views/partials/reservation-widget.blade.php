<section id="reserve" class="relative -mt-32 z-40 pb-32">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="relative bg-white/90 backdrop-blur-3xl rounded-[2rem] overflow-visible border border-white/20 shadow-[0_32px_64px_-16px_rgba(0,0,0,0.15)]">
                
                <div class="absolute -top-12 -right-12 w-64 h-64 bg-[#D4AF37]/5 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-12 -left-12 w-64 h-64 bg-[#C9A961]/5 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="relative z-10 p-8 lg:p-12">
                    
                    <div class="text-center mb-10">
                        <div class="inline-flex items-center gap-2 bg-[#D4AF37]/10 border border-[#D4AF37]/20 rounded-full px-4 py-1.5 mb-6">
                            <div class="w-1.5 h-1.5 bg-[#D4AF37] rounded-full animate-pulse"></div>
                            <span class="text-[10px] font-bold text-[#1A1816] tracking-[0.2em] uppercase">Instant Confirmation</span>
                        </div>
                        
                        <h2 class="font-serif text-3xl sm:text-4xl text-[#1A1816] mb-3 tracking-tight">
                            Reserve Your Experience
                        </h2>
                        <p class="text-[#6B6560] text-sm max-w-xl mx-auto leading-relaxed">
                            Secure the best available rates for your stay at FiraHotel.
                        </p>
                    </div>

                    <form action="{{ route('rooms.search') }}" method="GET" class="space-y-10">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            
                            <div class="space-y-3">
                                <label class="block text-[10px] font-bold text-[#1A1816] tracking-[0.15em] uppercase ml-1">Arrival</label>
                                <div class="relative group">
                                    <input type="date" name="check_in" id="check_in" required
                                           min="{{ date('Y-m-d') }}"
                                           class="w-full h-14 pl-12 pr-4 bg-[#FAF8F5] border border-gray-100 rounded-xl text-sm font-medium focus:ring-2 focus:ring-[#D4AF37]/20 focus:border-[#D4AF37] transition-all outline-none">
                                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label class="block text-[10px] font-bold text-[#1A1816] tracking-[0.15em] uppercase ml-1">Departure</label>
                                <div class="relative group">
                                    <input type="date" name="check_out" id="check_out" required
                                           min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                           class="w-full h-14 pl-12 pr-4 bg-[#FAF8F5] border border-gray-100 rounded-xl text-sm font-medium focus:ring-2 focus:ring-[#D4AF37]/20 focus:border-[#D4AF37] transition-all outline-none">
                                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="space-y-3 lg:col-span-2">
                                <label class="block text-[10px] font-bold text-[#1A1816] tracking-[0.15em] uppercase ml-1">Guests & Travel Party</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="relative">
                                        <select name="adults" class="w-full h-14 pl-12 pr-8 bg-[#FAF8F5] border border-gray-100 rounded-xl text-sm font-medium appearance-none focus:ring-2 focus:ring-[#D4AF37]/20 focus:border-[#D4AF37] outline-none cursor-pointer">
                                            @for($i = 1; $i <= 6; $i++)
                                                <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'Adult' : 'Adults' }}</option>
                                            @endfor
                                        </select>
                                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div class="relative">
                                        <select name="children" class="w-full h-14 pl-12 pr-8 bg-[#FAF8F5] border border-gray-100 rounded-xl text-sm font-medium appearance-none focus:ring-2 focus:ring-[#D4AF37]/20 focus:border-[#D4AF37] outline-none cursor-pointer">
                                            @for($i = 0; $i <= 4; $i++)
                                                <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'Child' : 'Children' }}</option>
                                            @endfor
                                        </select>
                                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center gap-4 pt-4">
                            <button type="submit" class="w-full sm:w-auto px-16 py-5 bg-[#1A1B1E] text-white font-bold text-xs tracking-[0.2em] uppercase rounded-full hover:bg-[#D4AF37] hover:shadow-[0_20px_40px_-10px_rgba(212,175,55,0.4)] transition-all duration-500 transform active:scale-95">
                                Check Availability
                            </button>
                            <span class="text-[10px] text-gray-400 uppercase tracking-widest">Best Rate Guarantee • Secure Booking</span>
                        </div>
                    </form>

                    <div class="mt-16 pt-8 border-t border-gray-100 grid grid-cols-2 md:grid-cols-4 gap-8">
                        @foreach([
                            ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Best Rate', 'sub' => 'Guaranteed'],
                            ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => '24/7 Service', 'sub' => 'Concierge'],
                            ['icon' => 'M5 13l4 4L19 7', 'label' => 'Free WiFi', 'sub' => 'High-speed'],
                            ['icon' => 'M12 6v12m-3-2.818l.879.659c1.546 1.16 3.74.905 5.025-.506a4.5 4.5 0 000-6.338L14.025 7.506a4.501 4.501 0 00-5.025-.506l-.879.66', 'label' => 'Flexible', 'sub' => 'Cancellation']
                        ] as $f)
                        <div class="flex items-center gap-3">
                            <div class="text-[#D4AF37]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $f['icon'] }}"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-[11px] font-bold text-[#1A1816] uppercase tracking-wider leading-none">{{ $f['label'] }}</div>
                                <div class="text-[10px] text-gray-400 uppercase tracking-tighter">{{ $f['sub'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // UX Enhancement: Ensure check-out is always after check-in
    const checkIn = document.getElementById('check_in');
    const checkOut = document.getElementById('check_out');

    checkIn.addEventListener('change', () => {
        const arrivalDate = new Date(checkIn.value);
        arrivalDate.setDate(arrivalDate.getDate() + 1);
        
        const minDeparture = arrivalDate.toISOString().split('T')[0];
        checkOut.min = minDeparture;
        if(checkOut.value < minDeparture) {
            checkOut.value = minDeparture;
        }
    });
</script>