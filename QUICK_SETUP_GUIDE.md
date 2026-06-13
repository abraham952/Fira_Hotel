# FiraHotel - Quick Setup Guide
**Last Updated:** February 14, 2026

---

## 🚀 Quick Start (5 Minutes)

### 1. Install Dependencies
```bash
npm install
composer install
```

### 2. Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Update .env File
```env
# Database
DB_DATABASE=firahotel
DB_USERNAME=root
DB_PASSWORD=

# Email (Mailtrap for testing)
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_FROM_ADDRESS="reservations@firahotel.com"
MAIL_ENCRYPTION=tls

# Admin Dashboard
ADMIN_PASSWORD=admin123
```

### 4. Setup Database
```bash
php artisan migrate
php artisan db:seed
```

### 5. Build Assets
```bash
npm run build
```

### 6. Start Server
```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## 📧 Email Setup (Mailtrap)

### For Testing:
1. Sign up at https://mailtrap.io (free)
2. Go to "Email Testing" → "Inboxes"
3. Copy SMTP credentials
4. Update `.env`:
   ```env
   MAIL_HOST=sandbox.smtp.mailtrap.io
   MAIL_PORT=2525
   MAIL_USERNAME=your_username_here
   MAIL_PASSWORD=your_password_here
   ```
5. Test by creating a booking

### For Production:
Use real SMTP service (Gmail, SendGrid, AWS SES, etc.)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
```

---

## 🔐 Admin Dashboard Access

### Login:
- URL: `http://localhost:8000/admin/login`
- Password: `admin123` (or whatever you set in .env)

### Change Password:
Update in `.env`:
```env
ADMIN_PASSWORD=your-secure-password
```

Then clear config:
```bash
php artisan config:clear
```

---

## 🧪 Testing Features

### Test Booking Flow:
1. Go to homepage
2. Click "Book Now" or use booking widget
3. Select dates (try selecting past dates - should be blocked)
4. Fill guest details
5. Submit (watch loading spinner)
6. See success toast notification
7. Check Mailtrap for confirmation email
8. Try modifying booking (if >48hrs before check-in)
9. Try cancelling booking

### Test Admin Dashboard:
1. Go to `/admin/login`
2. Enter admin password
3. View bookings list
4. Use search: try guest name, email, or reference
5. Filter by status
6. Update booking status
7. Update payment status
8. Verify changes saved (see toast notification)

---

## 🎨 Customization

### Change Colors:
Edit `resources/css/app.css`:
```css
@theme {
  --color-linen: #FAF8F5;      /* Background */
  --color-charcoal: #1A1816;   /* Text */
  --color-brass: #C9A961;      /* Accent */
}
```

### Change Fonts:
Edit `resources/css/app.css`:
```css
@theme {
  --font-display: 'Your Display Font', serif;
  --font-body: 'Your Body Font', sans-serif;
}
```

### Update Hotel Info:
Edit `database/seeders/FiraHotelSeeder.php` and re-run:
```bash
php artisan db:seed --class=FiraHotelSeeder
```

---

## 🐛 Troubleshooting

### Emails Not Sending?
```bash
# Check logs
tail -f storage/logs/laravel.log

# Test email config
php artisan tinker
>>> Mail::raw('Test', function($msg) { $msg->to('test@example.com')->subject('Test'); });
```

### Admin Login Not Working?
```bash
# Clear config cache
php artisan config:clear

# Verify password in .env
cat .env | grep ADMIN_PASSWORD
```

### Assets Not Loading?
```bash
# Rebuild assets
npm run build

# Clear view cache
php artisan view:clear
```

### Database Issues?
```bash
# Reset database
php artisan migrate:fresh --seed
```

---

## 📱 Mobile Testing

### Test on Real Device:
```bash
# Find your local IP
ipconfig  # Windows
ifconfig  # Mac/Linux

# Start server on network
php artisan serve --host=0.0.0.0 --port=8000

# Access from phone
http://YOUR_IP:8000
```

---

## 🚀 Deployment

### Before Deploying:

1. **Update .env for production:**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourdomain.com
   ```

2. **Change admin password:**
   ```env
   ADMIN_PASSWORD=very-secure-password-here
   ```

3. **Configure real SMTP:**
   ```env
   MAIL_HOST=your-smtp-host.com
   MAIL_USERNAME=your-username
   MAIL_PASSWORD=your-password
   ```

4. **Optimize for production:**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm run build
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

5. **Set permissions:**
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

---

## 📊 Key Features

### ✅ Working Features:
- Multi-language (EN/AM/OM)
- Room browsing & booking
- Interactive date picker
- Email confirmations
- Booking modification (48hr policy)
- Booking cancellation (48hr policy)
- Admin dashboard
- Toast notifications
- Loading states
- SEO optimization
- Mobile responsive

### 🚧 Coming Soon:
- User authentication
- Image upload
- Real-time availability
- Virtual tours
- Analytics dashboard

---

## 📞 Support

### Check Documentation:
- `README.md` - Full documentation
- `IMPLEMENTATION_SUMMARY.md` - Recent changes
- `PROJECT_EVALUATION.md` - Project status
- `QUICKSTART.md` - Original quick start

### Common Commands:
```bash
# Development
npm run dev          # Watch assets
php artisan serve    # Start server

# Database
php artisan migrate  # Run migrations
php artisan db:seed  # Seed data

# Cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Production
npm run build
php artisan optimize
```

---

## ✅ Checklist

Before launching:
- [ ] Email sending works
- [ ] Admin dashboard accessible
- [ ] Bookings can be created
- [ ] Bookings can be modified
- [ ] Bookings can be cancelled
- [ ] Toast notifications appear
- [ ] Mobile menu works
- [ ] Date picker prevents past dates
- [ ] Loading states show on submit
- [ ] Admin password changed
- [ ] Production SMTP configured
- [ ] SSL certificate installed
- [ ] Database backed up
- [ ] Error logging configured

---

**You're all set!** 🎉

For detailed implementation notes, see `IMPLEMENTATION_SUMMARY.md`
