# FiraHotel - Quick Start Guide

## 🚀 Fast Setup (5 minutes)

### Option 1: Automated Setup (Windows)
```bash
setup.bat
```
This will install all dependencies, set up the environment, and seed sample data.

### Option 2: Manual Setup

1. **Install Dependencies**
```bash
composer install
npm install
```

2. **Configure Environment**
```bash
copy .env.example .env
php artisan key:generate
```

3. **Update Database Settings in .env**
```env
DB_DATABASE=firahotel
DB_USERNAME=root
DB_PASSWORD=your_password
```

4. **Run Migrations & Seed Data**
```bash
php artisan migrate
php artisan db:seed --class=FiraHotelSeeder
```

5. **Build Assets & Start Server**
```bash
npm run build
php artisan serve
```

6. **Visit** → http://localhost:8000

---

## 🎨 What You'll See

### Homepage Features
- ✅ Hero section with luxury design
- ✅ Floating booking widget
- ✅ Featured rooms showcase
- ✅ Experience packages
- ✅ Multi-language navigation (EN/አማርኛ/Afaan Oromoo)

### Sample Data Included
- **1 Hotel**: FiraHotel Addis Ababa
- **3 Room Types**: Deluxe ($250), Executive Suite ($450), Presidential ($1,200)
- **4 Experiences**: Coffee Ceremony, Spa, Culinary Class, City Tour
- **All content in 3 languages**: English, Amharic, Afaan Oromo

---

## 🌍 Testing Multi-Language

1. Click the language dropdown in navigation (🇬🇧 English)
2. Select:
   - **🇬🇧 English** - Default
   - **🇪🇹 አማርኛ** - Amharic with Ethiopic script
   - **🇪🇹 Afaan Oromoo** - Oromo with Latin script

All UI elements, navigation, and database content will switch languages instantly!

---

## 📱 Key Pages to Explore

| Page | URL | Features |
|------|-----|----------|
| **Home** | `/` | Hero, booking widget, featured rooms |
| **Rooms** | `/rooms` | Room listing with filters |
| **Room Details** | `/rooms/{id}` | Full room info, gallery, booking |
| **Experiences** | `/experiences` | Spa, dining, cultural tours |
| **Booking** | `/booking` | Complete booking form |
| **Contact** | `/contact` | Contact info & form |

---

## 🎯 Quick Tests

### Test Booking Flow
1. Go to homepage
2. Fill booking widget (check-in, check-out, guests)
3. Click "Search Availability"
4. Select a room → "Book Now"
5. Fill guest details → "Confirm Booking"
6. See confirmation page with booking reference

### Test Language Switching
1. Switch to Amharic (አማርኛ)
2. Notice:
   - Navigation changes to Amharic
   - Room names display in Amharic
   - All UI text translates
   - Font switches to Noto Sans Ethiopic

### Test Room Search
1. Enter dates in booking widget
2. Select 2 adults, 1 child
3. Click "Search Availability"
4. See filtered results based on capacity

---

## 🛠️ Development Mode

For hot-reload during development:

**Terminal 1:**
```bash
npm run dev
```

**Terminal 2:**
```bash
php artisan serve
```

Changes to CSS/JS will auto-reload!

---

## 📊 Database Structure

### Hotels Table
```
- Multi-lingual name, description, address (JSON)
- Contact: email, phone, WhatsApp
- Location: latitude, longitude
- Amenities, images, star rating
```

### Rooms Table
```
- Multi-lingual name, description (JSON)
- Type: deluxe, suite, presidential
- Pricing, capacity, size
- Amenities, images, availability
```

### Bookings Table
```
- Guest information
- Check-in/out dates
- Payment & booking status
- Preferred language & currency
```

### Experiences Table
```
- Multi-lingual name, description (JSON)
- Category: spa, dining, cultural, adventure
- Price, duration
```

---

## 🎨 Design System Quick Reference

### Colors
```css
Navy:      #0A2463  /* Primary brand */
Gold:      #D4AF37  /* Accent/CTA */
White:     #F8F9FA  /* Background */
Green:     #2E8B57  /* Success */
Terracotta:#E2725B  /* Secondary CTA */
```

### Typography Classes
```html
<h1 class="font-display">Luxury Heading</h1>
<p class="font-body">Body text</p>
<p class="font-ethiopic">አማርኛ text</p>
<h2 class="text-gradient-gold">Gold Gradient</h2>
```

### Component Classes
```html
<button class="btn-primary">Book Now</button>
<button class="btn-secondary">Learn More</button>
<div class="luxury-card">Card content</div>
```

---

## 🔧 Common Tasks

### Add New Translation
1. Edit `lang/en/messages.php`
2. Add key: `'new_key' => 'English text'`
3. Add same key to `lang/am/messages.php` and `lang/om/messages.php`
4. Use in Blade: `{{ __('messages.new_key') }}`

### Add New Room
```php
php artisan tinker
```
```php
$hotel = Hotel::first();
$hotel->rooms()->create([
    'name' => ['en' => 'New Room', 'am' => '...', 'om' => '...'],
    'description' => ['en' => '...', 'am' => '...', 'om' => '...'],
    'room_type' => 'deluxe',
    'capacity' => 2,
    'beds' => 1,
    'size_sqm' => 40,
    'base_price' => 300,
    'amenities' => ['WiFi', 'TV', 'Mini Bar'],
    'view_type' => 'city',
    'total_rooms' => 5,
]);
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

---

## 🐛 Troubleshooting

### "Class not found" errors
```bash
composer dump-autoload
```

### CSS not loading
```bash
npm run build
```

### Database connection error
1. Check MySQL is running
2. Verify .env database credentials
3. Create database: `CREATE DATABASE firahotel;`

### Migration errors
```bash
php artisan migrate:fresh --seed
```
⚠️ This will delete all data and reseed!

---

## 📚 Next Steps

1. **Customize Content**: Update hotel info, room descriptions
2. **Add Images**: Replace placeholder images with real photos
3. **Payment Integration**: Add Stripe/PayPal for bookings
4. **Email Notifications**: Set up booking confirmations
5. **Admin Panel**: Build dashboard for managing bookings

---

## 💡 Pro Tips

- Use `php artisan tinker` to interact with models
- Check `storage/logs/laravel.log` for errors
- Use browser DevTools to inspect responsive design
- Test on mobile devices for touch interactions
- Use `php artisan route:list` to see all routes

---

**Need Help?** Check the full README.md for detailed documentation!

**Built with ❤️ for Ethiopian Hospitality Excellence**
