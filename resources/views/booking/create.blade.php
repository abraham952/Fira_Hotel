@extends('layouts.app')

@section('title', __('messages.book_now'))

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .flatpickr-calendar {
        background: white;
        border: 1px solid #E5E3DC;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(26, 24, 22, 0.15);
        font-family: var(--font-body);
    }
    .flatpickr-day.selected {
        background: var(--color-brass);
        border-color: var(--color-brass);
    }
    .flatpickr-day:hover {
        background: var(--color-soft-brass);
    }
</style>
@endpush

@section('content')

<section class="pt-6">
    <div class="max-w-4xl mx-auto px-5">
        <div class="luxury-card p-6 md:p-8" data-reveal>
            <p class="text-xs uppercase tracking-[0.3em] text-brass">Reservation</p>
            <h1 class="font-display text-4xl md:text-5xl mt-4">{{ __('messages.book_now') }}</h1>
            <p class="mt-3 text-sm text-charcoal-70 measure">
                A calm, guided flow. Confirm your dates and we handle the rest.
            </p>
        </div>
    </div>
</section>

<section class="mt-8">
    <div class="max-w-4xl mx-auto px-5">
        <form action="{{ route('booking.store') }}" method="POST" class="space-y-8">
            @csrf

            @if($room)
                <input type="hidden" name="room_id" value="{{ $room->id }}">
                <div class="luxury-card p-6" data-reveal>
                    <p class="text-xs uppercase tracking-[0.3em] text-brass">Selected Room</p>
                    <div class="mt-4 flex flex-col sm:flex-row gap-4">
                        @if($room->images && count($room->images) > 0)
                            <img src="{{ $room->images[0] }}" alt="{{ $room->getTranslatedName() }}" class="h-32 w-full sm:w-40 object-cover rounded-2xl" loading="lazy" decoding="async">
                        @endif
                        <div>
                            <h2 class="font-display text-2xl">{{ $room->getTranslatedName() }}</h2>
                            <p class="mt-2 text-sm text-charcoal-70">{{ $room->size_sqm }} sqm | {{ $room->capacity }} guests</p>
                            <p class="mt-3 text-sm uppercase tracking-[0.2em] text-brass">${{ number_format($room->base_price, 0) }} per night</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="luxury-card p-6" data-reveal>
                    <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">Select Room</label>
                    <select name="room_id" required class="calm-input">
                        <option value="">Choose a room...</option>
                        @foreach(\App\Models\Room::where('is_available', true)->get() as $r)
                            <option value="{{ $r->id }}">{{ $r->getTranslatedName() }} - ${{ number_format($r->base_price, 0) }}/night</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="luxury-card p-6" data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Dates And Guests</p>
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.check_in') }}</label>
                        <input type="text" 
                               id="check_in" 
                               name="check_in" 
                               value="{{ request('check_in') }}" 
                               required 
                               readonly
                               placeholder="Select check-in date"
                               class="calm-input cursor-pointer">
                        @error('check_in')
                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.check_out') }}</label>
                        <input type="text" 
                               id="check_out" 
                               name="check_out" 
                               value="{{ request('check_out') }}" 
                               required 
                               readonly
                               placeholder="Select check-out date"
                               class="calm-input cursor-pointer">
                        @error('check_out')
                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.adults') }}</label>
                        <select name="adults" required class="calm-input">
                            @for($i = 1; $i <= 4; $i++)
                                <option value="{{ $i }}" {{ request('adults') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.children') }}</label>
                        <select name="children" class="calm-input">
                            @for($i = 0; $i <= 4; $i++)
                                <option value="{{ $i }}" {{ request('children') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>

            <div class="luxury-card p-6" data-reveal>
                <p class="text-xs uppercase tracking-[0.3em] text-brass">Guest Details</p>
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.full_name') }}</label>
                        <input type="text" name="guest_name" value="{{ old('guest_name') }}" required class="calm-input">
                        @error('guest_name')
                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.email') }}</label>
                        <input type="email" name="guest_email" value="{{ old('guest_email') }}" required class="calm-input">
                        @error('guest_email')
                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.phone') }}</label>
                        <input type="tel" name="guest_phone" value="{{ old('guest_phone') }}" required placeholder="+251 9XX XXX XXX" class="calm-input">
                        @error('guest_phone')
                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.country') }}</label>
                        <select name="guest_country" required class="calm-input">
                            <option value="">Select country...</option>
                            <option value="Ethiopia" {{ old('guest_country') == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                            <option value="USA" {{ old('guest_country') == 'USA' ? 'selected' : '' }}>United States</option>
                            <option value="UK" {{ old('guest_country') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                            <option value="Canada" {{ old('guest_country') == 'Canada' ? 'selected' : '' }}>Canada</option>
                            <option value="Germany" {{ old('guest_country') == 'Germany' ? 'selected' : '' }}>Germany</option>
                            <option value="France" {{ old('guest_country') == 'France' ? 'selected' : '' }}>France</option>
                            <option value="Other" {{ old('guest_country') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('guest_country')
                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs uppercase tracking-[0.3em] text-charcoal-70 mb-2">{{ __('messages.special_requests') }}</label>
                        <textarea name="special_requests[0]" rows="4" class="calm-input" placeholder="Any special requests or requirements...">{{ old('special_requests.0') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <a href="{{ route('rooms.index') }}" class="text-xs uppercase tracking-[0.3em] text-charcoal-70 hover:text-brass transition-colors">
                    ← Back to Rooms
                </a>
                <button type="submit" 
                        id="submitBtn"
                        class="btn-primary min-h-[44px] relative overflow-hidden">
                    <span id="btnText">{{ __('messages.confirm_booking') }}</span>
                    <span id="btnLoader" class="hidden">
                        <svg class="animate-spin h-5 w-5 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing...
                    </span>
                </button>
            </div>
        </form>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Flatpickr for check-in
    const checkInPicker = flatpickr("#check_in", {
        minDate: "today",
        dateFormat: "Y-m-d",
        disableMobile: false,
        onChange: function(selectedDates, dateStr, instance) {
            // Update check-out minimum date
            checkOutPicker.set('minDate', new Date(selectedDates[0].getTime() + 86400000)); // +1 day
            
            // If check-out is before new check-in, clear it
            if (checkOutPicker.selectedDates[0] && checkOutPicker.selectedDates[0] <= selectedDates[0]) {
                checkOutPicker.clear();
            }
        }
    });

    // Initialize Flatpickr for check-out
    const checkOutPicker = flatpickr("#check_out", {
        minDate: new Date(Date.now() + 86400000), // Tomorrow
        dateFormat: "Y-m-d",
        disableMobile: false
    });

    // Form submission with loading state
    const form = document.querySelector('form');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnLoader = document.getElementById('btnLoader');

    form.addEventListener('submit', function(e) {
        // Show loading state
        submitBtn.disabled = true;
        btnText.classList.add('hidden');
        btnLoader.classList.remove('hidden');
    });
});
</script>
@endpush


