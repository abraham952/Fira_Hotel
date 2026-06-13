# FiraHotel - Luxury Multi-Lingual Hotel Platform

A world-class, multi-lingual digital ecosystem for luxury hospitality built with Laravel 12 and Tailwind CSS 4.

## Features

### Core Functionality
- ✅ **Multi-Language Support**: English, Amharic (አማርኛ), Afaan Oromo
- ✅ **Luxury Design System**: Custom Tailwind theme with Playfair Display & Inter fonts
- ✅ **Room Management**: Multiple room types with availability checking
- ✅ **Booking System**: Complete booking flow with confirmation
- ✅ **Experience Packages**: Spa, dining, cultural tours
- ✅ **Responsive Design**: Mobile-first approach with elegant animations

### Design Highlights
- **Color Palette**: Deep Navy (#0A2463), Champagne Gold (#D4AF37), Marble White
- **Typography**: Playfair Display (headings), Inter (body), Noto Sans Ethiopic (Amharic/Oromo)
- **Animations**: Smooth transitions, fade-in effects, hover states
- **Accessibility**: WCAG-compliant color contrasts, semantic HTML

## Installation

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL/MariaDB

### Setup Steps

1. **Install Dependencies**
```bash
composer install
npm install
```

2. **Environment Configuration**
```bash
copy .env.example .env
php artisan key:generate
```

3. **Database Setup**
Update `.env` with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=firahotel
DB_USERNAME=root
DB_PASSWORD=
```

4. **Run Migrations & Seed Data**
```bash
php artisan migrate
php artisan db:seed --class=FiraHotelSeeder
```

5. **Build Assets**
```bash
npm run build
```

6. **Start Development Server**
```bash
php artisan serve
```

Visit: `http://localhost:8000`

## Project Structure

```
app/
├── Models/
│   ├── Hotel.php          # Multi-lingual hotel model
│   ├── Room.php           # Room with availability
│   ├── Booking.php        # Booking management
│   └── Experience.php     # Spa, dining, tours
├── Http/
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   ├── RoomController.php
│   │   ├── BookingController.php
│   │   ├── ExperienceController.php
│   │   └── LocaleController.php
│   └── Middleware/
│       └── SetLocale.php  # Language switching

resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php  # Main layout with nav & footer
│   ├── home.blade.php     # Homepage with hero & sections
│   └── ...
├── css/
│   └── app.css            # Luxury design system
└── js/
    └── app.js

lang/
├── en/messages.php        # English translations
├── am/messages.php        # Amharic translations
└── om/messages.php        # Afaan Oromo translations

config/
└── localization.php       # Multi-language configuration
```

## Multi-Language System

### Switching Languages
Languages can be switched via the navigation dropdown. The system supports:
- **English (en)**: Default, LTR
- **Amharic (am)**: አማርኛ, LTR with Ethiopic script
- **Afaan Oromo (om)**: Afaan Oromoo, LTR with Latin script

### Adding Translations
1. Add keys to `lang/{locale}/messages.php`
2. Use in Blade: `{{ __('messages.key') }}`
3. Models use JSON columns for multi-lingual content

### Database Content
Models like Hotel, Room, Experience store translations in JSON:
```php
'name' => [
    'en' => 'Deluxe Room',
    'am' => 'ዴሉክስ ክፍል',
    'om' => 'Kutaa Deluxe',
]
```

## Design System

### Colors
```css
--color-navy-deep: #0A2463      /* Primary brand color */
--color-gold-champagne: #D4AF37  /* Accent/CTA color */
--color-marble-white: #F8F9FA    /* Background */
--color-forest-green: #2E8B57    /* Success/eco */
--color-terracotta: #E2725B      /* Secondary CTA */
```

### Typography
```css
.font-display    /* Playfair Display - Headings */
.font-body       /* Inter - Body text */
.font-ethiopic   /* Noto Sans Ethiopic - Amharic/Oromo */
```

### Components
```html
<button class="btn-primary">Book Now</button>
<button class="btn-secondary">Learn More</button>
<div class="luxury-card">...</div>
<h1 class="text-gradient-gold">FiraHotel</h1>
```

## Key Routes

```
GET  /                          # Homepage
GET  /rooms                     # Room listing
GET  /rooms/search              # Search availability
GET  /rooms/{id}                # Room details
GET  /experiences               # Experience packages
GET  /booking                   # Booking form
POST /booking                   # Create booking
GET  /booking/{id}/confirmation # Booking confirmation
GET  /locale/{locale}           # Switch language
```

## Database Schema

### Hotels
- Multi-lingual name, description, address
- Contact info (email, phone, WhatsApp)
- Geolocation, star rating, amenities

### Rooms
- Multi-lingual name, description
- Room type, capacity, size, price
- Amenities, images, availability

### Bookings
- Guest information
- Check-in/out dates
- Payment & booking status
- Preferred language & currency

### Experiences
- Multi-lingual name, description
- Category (spa, dining, cultural)
- Price, duration

## Next Steps (Phase 2-4)

### Phase 2: Advanced Booking
- [ ] Real-time availability calendar
- [ ] Payment gateway integration
- [ ] Email/SMS confirmations
- [ ] Guest portal

### Phase 3: Personalization
- [ ] User accounts & loyalty program
- [ ] Booking history
- [ ] Personalized recommendations
- [ ] Currency conversion API

### Phase 4: Analytics & Admin
- [ ] Admin dashboard
- [ ] Booking analytics
- [ ] Revenue management
- [ ] Multi-property support

## Technologies

- **Backend**: Laravel 12 (PHP 8.2)
- **Frontend**: Tailwind CSS 4, Alpine.js
- **Database**: MySQL
- **Build**: Vite
- **Fonts**: Google Fonts (Playfair Display, Inter, Noto Sans Ethiopic)

## License

Proprietary - FiraHotel © 2026

---

**Built with ❤️ for Ethiopian Hospitality Excellence**
