# FiraHotel - Testing Guide

## 🧪 Testing Overview

This guide covers manual testing procedures for FiraHotel. Automated tests will be added in Phase 2.

---

## ✅ Pre-Testing Checklist

Before starting tests, ensure:
- [ ] Database is seeded with sample data
- [ ] `.env` is configured correctly
- [ ] Assets are built (`npm run build`)
- [ ] Server is running (`php artisan serve`)
- [ ] Browser cache is cleared

---

## 🏠 Homepage Testing

### Visual Tests
- [ ] Hero section displays full-screen
- [ ] Background image loads correctly
- [ ] Logo is visible and properly styled
- [ ] Navigation menu is accessible
- [ ] Language selector shows all 3 languages
- [ ] Booking widget is visible and sticky
- [ ] Featured rooms section displays 3 rooms
- [ ] Experience cards show 4 items
- [ ] Footer displays all information
- [ ] All images load without errors

### Functional Tests
- [ ] Navigation links work correctly
- [ ] Language switcher changes content
- [ ] Booking widget accepts date input
- [ ] Guest count dropdowns work
- [ ] "Search Availability" button submits form
- [ ] "Book Now" buttons navigate correctly
- [ ] "View Details" links work
- [ ] Scroll animations trigger properly
- [ ] Mobile menu opens/closes

### Responsive Tests
- [ ] Mobile (375px): Layout stacks correctly
- [ ] Tablet (768px): Grid adjusts to 2 columns
- [ ] Desktop (1024px): Full 3-column layout
- [ ] Large screens (1920px): Content centered

---

## 🌍 Multi-Language Testing

### English (EN)
- [ ] Navigation displays in English
- [ ] Room names in English
- [ ] Experience titles in English
- [ ] Form labels in English
- [ ] Footer content in English
- [ ] Font: Inter (body), Playfair Display (headings)

### Amharic (አማርኛ)
- [ ] Navigation displays in Amharic
- [ ] Room names in Amharic (ዴሉክስ ክፍል)
- [ ] Experience titles in Amharic
- [ ] Form labels in Amharic
- [ ] Footer content in Amharic
- [ ] Font: Noto Sans Ethiopic renders correctly
- [ ] No character encoding issues
- [ ] Text alignment correct (LTR)

### Afaan Oromo (OM)
- [ ] Navigation displays in Afaan Oromo
- [ ] Room names in Afaan Oromo (Kutaa Deluxe)
- [ ] Experience titles in Afaan Oromo
- [ ] Form labels in Afaan Oromo
- [ ] Footer content in Afaan Oromo
- [ ] Font: Noto Sans Ethiopic renders correctly
- [ ] No character encoding issues

### Language Switching
- [ ] Dropdown shows current language with flag
- [ ] Clicking language switches immediately
- [ ] No page reload required
- [ ] Language persists across pages
- [ ] Language saved in session
- [ ] Back button maintains language

---

## 🛏️ Rooms Page Testing

### Display Tests
- [ ] All rooms display in grid layout
- [ ] Room images load correctly
- [ ] Prices display with currency
- [ ] Amenities show as tags
- [ ] "View Details" and "Book Now" buttons visible
- [ ] Hover effects work on cards
- [ ] Image zoom on hover works
- [ ] Pagination displays if > 12 rooms

### Search/Filter Tests
- [ ] Date picker opens correctly
- [ ] Check-in date validation works
- [ ] Check-out must be after check-in
- [ ] Guest count dropdowns work
- [ ] Search returns filtered results
- [ ] "No results" message shows when appropriate
- [ ] Search parameters persist in URL

### Multi-Language Tests
- [ ] Room names translate correctly
- [ ] Room descriptions translate
- [ ] Amenity names translate
- [ ] Price labels translate
- [ ] Button text translates

---

## 📅 Booking Flow Testing

### Step 1: Room Selection
- [ ] Clicking "Book Now" navigates to booking page
- [ ] Room details pre-filled if coming from room page
- [ ] Date range pre-filled if from search
- [ ] Guest count pre-filled if from search

### Step 2: Guest Information
- [ ] All form fields display correctly
- [ ] Required fields marked with *
- [ ] Email validation works
- [ ] Phone number accepts international format
- [ ] Country dropdown populated
- [ ] Special requests textarea works
- [ ] Form labels in correct language

### Step 3: Validation
- [ ] Empty required fields show errors
- [ ] Invalid email shows error
- [ ] Check-in date must be future
- [ ] Check-out must be after check-in
- [ ] Error messages in correct language

### Step 4: Submission
- [ ] Form submits successfully
- [ ] Booking reference generated (FH-XXXXX)
- [ ] Redirects to confirmation page
- [ ] Booking saved in database
- [ ] Preferred language saved
- [ ] Currency saved correctly

### Step 5: Confirmation
- [ ] Booking reference displays
- [ ] Guest name shows correctly
- [ ] Room details display
- [ ] Check-in/out dates correct
- [ ] Total price calculated correctly
- [ ] Payment status shows "pending"
- [ ] Booking status shows "confirmed"

---

## 📞 Contact Page Testing

### Display Tests
- [ ] Hero section displays
- [ ] Contact information visible
- [ ] Phone number formatted correctly
- [ ] Email address clickable
- [ ] WhatsApp number displayed
- [ ] Address shows correctly
- [ ] Business hours listed
- [ ] Contact form displays

### Form Tests
- [ ] All fields accept input
- [ ] Required validation works
- [ ] Email validation works
- [ ] Textarea accepts long text
- [ ] Submit button enabled
- [ ] Form labels in correct language

### Multi-Language Tests
- [ ] Contact labels translate
- [ ] Business hours translate
- [ ] Form placeholders translate
- [ ] Submit button text translates

---

## 🎨 Design System Testing

### Colors
- [ ] Navy (#0A2463) used for primary elements
- [ ] Gold (#D4AF37) used for CTAs
- [ ] White (#F8F9FA) used for backgrounds
- [ ] Green (#2E8B57) used for success states
- [ ] Terracotta (#E2725B) used for secondary CTAs
- [ ] Color contrast meets WCAG AA standards

### Typography
- [ ] Playfair Display loads for headings
- [ ] Inter loads for body text
- [ ] Noto Sans Ethiopic loads for Amharic/Oromo
- [ ] Font sizes follow scale (16, 24, 32, 48, 64, 96)
- [ ] Line heights appropriate
- [ ] Font weights render correctly

### Components
- [ ] `.btn-primary` styled correctly
- [ ] `.btn-secondary` styled correctly
- [ ] `.luxury-card` has shadow
- [ ] `.text-gradient-gold` shows gradient
- [ ] Hover states work on all interactive elements
- [ ] Focus states visible for keyboard navigation

### Animations
- [ ] Fade-in animations trigger on scroll
- [ ] Hover scale effects smooth
- [ ] Image zoom on hover works
- [ ] Transitions feel natural (not too fast/slow)
- [ ] No janky animations

---

## 📱 Mobile Testing

### Devices to Test
- [ ] iPhone SE (375px)
- [ ] iPhone 12 Pro (390px)
- [ ] Samsung Galaxy S21 (360px)
- [ ] iPad (768px)
- [ ] iPad Pro (1024px)

### Mobile-Specific Tests
- [ ] Touch targets minimum 44x44px
- [ ] Mobile menu opens/closes smoothly
- [ ] Forms easy to fill on mobile
- [ ] Date pickers work on mobile
- [ ] Images scale appropriately
- [ ] Text readable without zooming
- [ ] No horizontal scrolling
- [ ] Buttons easy to tap

---

## ♿ Accessibility Testing

### Keyboard Navigation
- [ ] Tab key navigates through all interactive elements
- [ ] Focus indicators visible
- [ ] Enter key activates buttons/links
- [ ] Escape key closes modals/dropdowns
- [ ] No keyboard traps

### Screen Reader Testing
- [ ] Page title announces correctly
- [ ] Headings in logical order (H1 → H2 → H3)
- [ ] Images have alt text
- [ ] Form labels associated with inputs
- [ ] Error messages announced
- [ ] Language changes announced

### Color Contrast
- [ ] Text on backgrounds meets WCAG AA (4.5:1)
- [ ] Large text meets WCAG AA (3:1)
- [ ] Interactive elements distinguishable
- [ ] Focus indicators visible

### ARIA
- [ ] ARIA labels on icon buttons
- [ ] ARIA-live regions for dynamic content
- [ ] ARIA-expanded on dropdowns
- [ ] ARIA-hidden on decorative elements

---

## 🔒 Security Testing

### Input Validation
- [ ] SQL injection attempts blocked
- [ ] XSS attempts sanitized
- [ ] CSRF tokens present on forms
- [ ] File upload restrictions (if applicable)
- [ ] Rate limiting on forms

### Authentication (Future)
- [ ] Password requirements enforced
- [ ] Session timeout works
- [ ] Logout clears session
- [ ] Protected routes redirect to login

---

## ⚡ Performance Testing

### Page Load Times
- [ ] Homepage loads < 3 seconds
- [ ] Rooms page loads < 2 seconds
- [ ] Booking page loads < 2 seconds
- [ ] Images lazy load
- [ ] No render-blocking resources

### Network Tests
- [ ] Test on 3G connection
- [ ] Test on 4G connection
- [ ] Test on WiFi
- [ ] Images optimized
- [ ] CSS/JS minified

### Browser Performance
- [ ] No console errors
- [ ] No memory leaks
- [ ] Smooth scrolling
- [ ] No layout shifts
- [ ] Animations at 60fps

---

## 🌐 Browser Compatibility

### Desktop Browsers
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Edge (latest)

### Mobile Browsers
- [ ] Safari iOS (latest)
- [ ] Chrome Android (latest)
- [ ] Samsung Internet

### Legacy Support
- [ ] Chrome (last 2 versions)
- [ ] Firefox (last 2 versions)
- [ ] Safari (last 2 versions)

---

## 🗄️ Database Testing

### Data Integrity
- [ ] Hotels seed correctly
- [ ] Rooms seed correctly
- [ ] Experiences seed correctly
- [ ] Relationships work (Hotel → Rooms)
- [ ] Soft deletes work
- [ ] Timestamps update correctly

### Booking Tests
- [ ] Booking creates successfully
- [ ] Booking reference unique
- [ ] Foreign keys enforced
- [ ] Validation rules work
- [ ] Dates stored correctly
- [ ] JSON fields parse correctly

### Multi-Language Data
- [ ] JSON fields store all languages
- [ ] Translations retrieve correctly
- [ ] Fallback to English works
- [ ] No encoding issues in database

---

## 🐛 Bug Reporting Template

When you find a bug, report it with:

```markdown
**Bug Title:** [Short description]

**Severity:** Critical / High / Medium / Low

**Steps to Reproduce:**
1. Go to...
2. Click on...
3. Enter...
4. See error

**Expected Behavior:**
[What should happen]

**Actual Behavior:**
[What actually happens]

**Environment:**
- Browser: Chrome 120
- OS: Windows 11
- Screen Size: 1920x1080
- Language: English

**Screenshots:**
[Attach screenshots]

**Console Errors:**
[Copy any console errors]
```

---

## ✅ Test Completion Checklist

### Phase 1 Testing
- [ ] All homepage tests passed
- [ ] All language tests passed
- [ ] All rooms page tests passed
- [ ] All booking flow tests passed
- [ ] All contact page tests passed
- [ ] All design system tests passed
- [ ] All mobile tests passed
- [ ] All accessibility tests passed
- [ ] All performance tests passed
- [ ] All browser compatibility tests passed
- [ ] All database tests passed

### Sign-Off
- **Tested By:** _______________
- **Date:** _______________
- **Version:** 1.0.0
- **Status:** ☐ Pass ☐ Fail ☐ Pass with Issues

---

## 🚀 Automated Testing (Future)

### Unit Tests (Planned)
```php
// Example: Room availability test
public function test_room_availability_check()
{
    $room = Room::factory()->create();
    $booking = Booking::factory()->create([
        'room_id' => $room->id,
        'check_in' => '2026-03-15',
        'check_out' => '2026-03-18',
    ]);
    
    $available = $room->isAvailable('2026-03-16', '2026-03-17');
    
    $this->assertFalse($available);
}
```

### Feature Tests (Planned)
```php
// Example: Booking flow test
public function test_complete_booking_flow()
{
    $room = Room::factory()->create();
    
    $response = $this->post('/booking', [
        'room_id' => $room->id,
        'guest_name' => 'John Doe',
        'guest_email' => 'john@example.com',
        // ... other fields
    ]);
    
    $response->assertRedirect();
    $this->assertDatabaseHas('bookings', [
        'guest_email' => 'john@example.com',
    ]);
}
```

### Browser Tests (Planned)
```php
// Example: Laravel Dusk test
public function test_language_switching()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
                ->click('@language-selector')
                ->click('@language-am')
                ->assertSee('መነሻ');
    });
}
```

---

## 📊 Test Coverage Goals

### Phase 1 (Current)
- Manual Testing: 100% ✅
- Automated Testing: 0%

### Phase 2 (Target)
- Manual Testing: 100%
- Unit Tests: 80%
- Feature Tests: 70%
- Browser Tests: 50%

### Phase 3 (Target)
- Manual Testing: 100%
- Unit Tests: 90%
- Feature Tests: 85%
- Browser Tests: 75%

---

**Testing Guide Version:** 1.0.0  
**Last Updated:** February 9, 2026  
**Next Review:** Phase 2 Launch
