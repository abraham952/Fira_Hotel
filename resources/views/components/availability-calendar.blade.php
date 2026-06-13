@props(['room', 'availability' => []])

<div class="bg-white rounded-2xl shadow-lg border border-[#E5E3DC] p-6" x-data="availabilityCalendar()">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="font-serif text-2xl text-[#1A1816] mb-1">Availability Calendar</h3>
            <p class="text-sm text-[#6B6560]">Select your preferred dates</p>
        </div>
        <div class="flex items-center gap-2">
            <button @click="previousMonth" class="p-2 hover:bg-[#FAF8F5] rounded-lg transition-colors">
                <svg class="w-5 h-5 text-[#6B6560]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <span class="text-sm font-medium text-[#1A1816] min-w-[120px] text-center" x-text="currentMonthYear"></span>
            <button @click="nextMonth" class="p-2 hover:bg-[#FAF8F5] rounded-lg transition-colors">
                <svg class="w-5 h-5 text-[#6B6560]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Calendar Grid -->
    <div class="grid grid-cols-7 gap-2">
        <!-- Day Headers -->
        <template x-for="day in ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']">
            <div class="text-center text-xs font-semibold text-[#6B6560] tracking-wider uppercase py-2" x-text="day"></div>
        </template>

        <!-- Calendar Days -->
        <template x-for="day in calendarDays" :key="day.date">
            <button 
                type="button"
                @click="selectDate(day)"
                :disabled="!day.available || day.isPast"
                :class="{
                    'bg-[#D4AF37] text-white': day.isSelected,
                    'bg-[#FAF8F5] text-[#1A1816] hover:bg-[#E5E3DC]': day.available && !day.isSelected && !day.isPast,
                    'bg-gray-100 text-gray-400 cursor-not-allowed': !day.available || day.isPast,
                    'opacity-40': !day.isCurrentMonth
                }"
                class="aspect-square rounded-lg flex flex-col items-center justify-center text-sm font-medium transition-all duration-200 relative group"
            >
                <span x-text="day.day"></span>
                <span x-show="day.available && !day.isPast" class="text-[10px] text-[#6B6560] group-hover:text-[#1A1816]" x-text="'$' + day.price"></span>
            </button>
        </template>
    </div>

    <!-- Legend -->
    <div class="mt-6 pt-6 border-t border-[#E5E3DC] flex flex-wrap gap-4 text-xs">
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 bg-[#D4AF37] rounded"></div>
            <span class="text-[#6B6560]">Selected</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 bg-[#FAF8F5] border border-[#E5E3DC] rounded"></div>
            <span class="text-[#6B6560]">Available</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 bg-gray-100 rounded"></div>
            <span class="text-[#6B6560]">Unavailable</span>
        </div>
    </div>

    <!-- Selected Dates Display -->
    <div x-show="checkIn || checkOut" class="mt-6 p-4 bg-[#FAF8F5] rounded-xl">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-[10px] font-semibold text-[#6B6560] tracking-wider uppercase mb-1">Check-in</p>
                <p class="text-sm font-medium text-[#1A1816]" x-text="checkIn || 'Select date'"></p>
            </div>
            <div>
                <p class="text-[10px] font-semibold text-[#6B6560] tracking-wider uppercase mb-1">Check-out</p>
                <p class="text-sm font-medium text-[#1A1816]" x-text="checkOut || 'Select date'"></p>
            </div>
        </div>
        <div x-show="checkIn && checkOut" class="mt-4 pt-4 border-t border-[#E5E3DC]">
            <div class="flex items-center justify-between">
                <span class="text-sm text-[#6B6560]">Total nights:</span>
                <span class="text-sm font-semibold text-[#1A1816]" x-text="totalNights"></span>
            </div>
            <div class="flex items-center justify-between mt-2">
                <span class="text-sm text-[#6B6560]">Total price:</span>
                <span class="text-lg font-semibold text-[#D4AF37]" x-text="'$' + totalPrice"></span>
            </div>
        </div>
    </div>
</div>

<script>
function availabilityCalendar() {
    return {
        currentMonth: new Date().getMonth(),
        currentYear: new Date().getFullYear(),
        checkIn: null,
        checkOut: null,
        availability: @json($availability),
        
        get currentMonthYear() {
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            return `${months[this.currentMonth]} ${this.currentYear}`;
        },
        
        get calendarDays() {
            const firstDay = new Date(this.currentYear, this.currentMonth, 1);
            const lastDay = new Date(this.currentYear, this.currentMonth + 1, 0);
            const prevLastDay = new Date(this.currentYear, this.currentMonth, 0);
            
            const days = [];
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            // Previous month days
            for (let i = firstDay.getDay() - 1; i >= 0; i--) {
                const date = new Date(this.currentYear, this.currentMonth, -i);
                days.push(this.createDayObject(date, false));
            }
            
            // Current month days
            for (let i = 1; i <= lastDay.getDate(); i++) {
                const date = new Date(this.currentYear, this.currentMonth, i);
                days.push(this.createDayObject(date, true));
            }
            
            // Next month days
            const remainingDays = 42 - days.length;
            for (let i = 1; i <= remainingDays; i++) {
                const date = new Date(this.currentYear, this.currentMonth + 1, i);
                days.push(this.createDayObject(date, false));
            }
            
            return days;
        },
        
        createDayObject(date, isCurrentMonth) {
            const dateStr = date.toISOString().split('T')[0];
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            return {
                date: dateStr,
                day: date.getDate(),
                isCurrentMonth,
                available: this.availability[dateStr]?.available ?? true,
                price: this.availability[dateStr]?.price ?? {{ $room->base_price }},
                isPast: date < today,
                isSelected: dateStr === this.checkIn || dateStr === this.checkOut
            };
        },
        
        selectDate(day) {
            if (!day.available || day.isPast) return;
            
            if (!this.checkIn || (this.checkIn && this.checkOut)) {
                this.checkIn = day.date;
                this.checkOut = null;
            } else if (day.date > this.checkIn) {
                this.checkOut = day.date;
            } else {
                this.checkIn = day.date;
                this.checkOut = null;
            }
        },
        
        get totalNights() {
            if (!this.checkIn || !this.checkOut) return 0;
            const start = new Date(this.checkIn);
            const end = new Date(this.checkOut);
            return Math.ceil((end - start) / (1000 * 60 * 60 * 24));
        },
        
        get totalPrice() {
            return this.totalNights * {{ $room->base_price }};
        },
        
        previousMonth() {
            if (this.currentMonth === 0) {
                this.currentMonth = 11;
                this.currentYear--;
            } else {
                this.currentMonth--;
            }
        },
        
        nextMonth() {
            if (this.currentMonth === 11) {
                this.currentMonth = 0;
                this.currentYear++;
            } else {
                this.currentMonth++;
            }
        }
    }
}
</script>
