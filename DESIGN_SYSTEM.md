# FiraHotel - Design System Guide

## 🎨 Brand Identity

### Brand Essence
**FiraHotel** embodies the perfect fusion of Ethiopian hospitality and international luxury standards. Our design language reflects:
- Timeless elegance
- Cultural authenticity
- Modern sophistication
- Warm hospitality

---

## 🌈 Color Palette

### Primary Colors

#### Deep Navy
```
HEX: #0A2463
RGB: 10, 36, 99
Usage: Primary brand color, headers, navigation
Emotion: Trust, stability, luxury
```

#### Champagne Gold
```
HEX: #D4AF37
RGB: 212, 175, 55
Usage: CTAs, accents, highlights
Emotion: Luxury, prestige, warmth
```

#### Marble White
```
HEX: #F8F9FA
RGB: 248, 249, 250
Usage: Backgrounds, cards, sections
Emotion: Cleanliness, space, elegance
```

### Secondary Colors

#### Forest Green
```
HEX: #2E8B57
RGB: 46, 139, 87
Usage: Success states, eco-initiatives
Emotion: Nature, growth, sustainability
```

#### Terracotta
```
HEX: #E2725B
RGB: 226, 114, 91
Usage: Secondary CTAs, alerts
Emotion: Warmth, energy, Ethiopian earth
```

### Neutral Colors

```
Gray 50:  #F9FAFB
Gray 100: #F3F4F6
Gray 200: #E5E7EB
Gray 300: #D1D5DB
Gray 400: #9CA3AF
Gray 500: #6B7280
Gray 600: #4B5563
Gray 700: #374151
Gray 800: #1F2937
Gray 900: #111827
```

---

## 📝 Typography

### Font Families

#### Display Font - Playfair Display
```css
font-family: 'Playfair Display', serif;
```
**Usage:** Headlines, hero text, luxury emphasis  
**Weights:** 400, 500, 600, 700, 800  
**Character:** Elegant, sophisticated, timeless

#### Body Font - Inter
```css
font-family: 'Inter', sans-serif;
```
**Usage:** Body text, navigation, forms  
**Weights:** 300, 400, 500, 600, 700  
**Character:** Clean, modern, highly readable

#### Ethiopic Font - Noto Sans Ethiopic
```css
font-family: 'Noto Sans Ethiopic', sans-serif;
```
**Usage:** Amharic and Afaan Oromo text  
**Weights:** 300, 400, 500, 600, 700  
**Character:** Authentic, clear, culturally appropriate

### Type Scale

```
Hero:        96px / 6rem    (font-display, bold)
H1:          64px / 4rem    (font-display, bold)
H2:          48px / 3rem    (font-display, semibold)
H3:          32px / 2rem    (font-display, semibold)
H4:          24px / 1.5rem  (font-display, medium)
H5:          20px / 1.25rem (font-body, semibold)
Body Large:  18px / 1.125rem (font-body, regular)
Body:        16px / 1rem    (font-body, regular)
Body Small:  14px / 0.875rem (font-body, regular)
Caption:     12px / 0.75rem (font-body, regular)
```

### Line Heights

```
Tight:   1.2  (Headlines)
Normal:  1.5  (Body text)
Relaxed: 1.75 (Long-form content)
Loose:   2.0  (Captions, labels)
```

---

## 📐 Spacing System

### Base Unit: 8px

```
0:   0px
1:   4px   (0.25rem)
2:   8px   (0.5rem)
3:   12px  (0.75rem)
4:   16px  (1rem)
5:   20px  (1.25rem)
6:   24px  (1.5rem)
8:   32px  (2rem)
10:  40px  (2.5rem)
12:  48px  (3rem)
16:  64px  (4rem)
20:  80px  (5rem)
24:  96px  (6rem)
```

### Layout Spacing

```
Section Gap:     96px (6rem)
Module Gap:      64px (4rem)
Component Gap:   32px (2rem)
Element Gap:     16px (1rem)
Tight Gap:       8px  (0.5rem)
```

---

## 🎯 Components

### Buttons

#### Primary Button
```html
<button class="btn-primary">Book Now</button>
```
**Style:**
- Background: Champagne Gold (#D4AF37)
- Text: Deep Navy (#0A2463)
- Padding: 16px 32px
- Border Radius: 6px
- Font Weight: 600
- Hover: Lighter gold (#F4E5C3)
- Transform: Scale 1.05 on hover

#### Secondary Button
```html
<button class="btn-secondary">Learn More</button>
```
**Style:**
- Background: Deep Navy (#0A2463)
- Text: White
- Padding: 16px 32px
- Border Radius: 6px
- Font Weight: 600
- Hover: Lighter navy (#1a3a7d)

### Cards

#### Luxury Card
```html
<div class="luxury-card">
  <!-- Content -->
</div>
```
**Style:**
- Background: White
- Border Radius: 8px
- Shadow: 0 10px 40px rgba(10, 36, 99, 0.1)
- Hover Shadow: 0 20px 60px rgba(10, 36, 99, 0.15)
- Transition: 500ms ease

### Text Effects

#### Gold Gradient Text
```html
<h1 class="text-gradient-gold">FiraHotel</h1>
```
**Style:**
- Gradient: 135deg, #D4AF37 → #F4E5C3
- Background Clip: Text
- Text Fill: Transparent

---

## 🖼️ Imagery Guidelines

### Photography Style

**Do:**
- High-resolution (minimum 1920px wide)
- Natural lighting
- Warm color tones
- Show Ethiopian cultural elements
- Include people enjoying experiences
- Professional composition

**Don't:**
- Over-saturated colors
- Heavy filters
- Stock photo clichés
- Poor lighting
- Cluttered backgrounds

### Image Ratios

```
Hero Images:     16:9  (1920x1080)
Room Cards:      4:3   (800x600)
Gallery:         3:2   (1200x800)
Thumbnails:      1:1   (400x400)
Experience Cards: 16:9 (800x450)
```

---

## 🎭 Animations

### Timing Functions

```css
/* Smooth ease */
transition: all 300ms ease;

/* Luxury ease */
transition: all 500ms cubic-bezier(0.4, 0, 0.2, 1);

/* Bounce */
transition: transform 300ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
```

### Common Animations

#### Fade In Up
```css
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
```

#### Hover Scale
```css
.hover-scale {
  transition: transform 300ms ease;
}
.hover-scale:hover {
  transform: scale(1.05);
}
```

#### Image Zoom
```css
.image-zoom {
  overflow: hidden;
}
.image-zoom img {
  transition: transform 700ms ease;
}
.image-zoom:hover img {
  transform: scale(1.1);
}
```

---

## 📱 Responsive Breakpoints

```css
/* Mobile First Approach */

/* Small devices (phones) */
@media (min-width: 640px) { /* sm */ }

/* Medium devices (tablets) */
@media (min-width: 768px) { /* md */ }

/* Large devices (desktops) */
@media (min-width: 1024px) { /* lg */ }

/* Extra large devices */
@media (min-width: 1280px) { /* xl */ }

/* 2K displays */
@media (min-width: 1536px) { /* 2xl */ }
```

---

## 🎨 Usage Examples

### Hero Section
```html
<section class="relative h-screen flex items-center justify-center">
  <div class="absolute inset-0 bg-gradient-to-r from-[#0A2463]/80 to-[#0A2463]/60"></div>
  <div class="relative z-20 text-center text-white">
    <h1 class="font-display text-6xl font-bold mb-6">
      Welcome to FiraHotel
    </h1>
    <p class="text-xl mb-8">
      Where Luxury Meets Ethiopian Hospitality
    </p>
    <button class="btn-primary">Book Now</button>
  </div>
</section>
```

### Room Card
```html
<div class="luxury-card overflow-hidden group">
  <div class="relative h-64 overflow-hidden">
    <img src="room.jpg" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
    <div class="absolute top-4 right-4 bg-[#D4AF37] text-[#0A2463] px-4 py-2 rounded-full font-semibold">
      From $250/night
    </div>
  </div>
  <div class="p-6">
    <h3 class="font-display text-2xl font-bold text-[#0A2463] mb-2">
      Deluxe Suite
    </h3>
    <p class="text-gray-600 mb-4">
      45 sqm • King Bed • City View
    </p>
    <button class="btn-primary w-full">View Details</button>
  </div>
</div>
```

### Navigation
```html
<nav class="fixed w-full top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-between items-center h-20">
      <a href="/" class="font-display text-3xl font-bold text-[#0A2463]">
        Fira<span class="text-gradient-gold">Hotel</span>
      </a>
      <!-- Navigation items -->
    </div>
  </div>
</nav>
```

---

## ♿ Accessibility

### Color Contrast Ratios

```
Navy on White:     12.5:1 (AAA) ✅
Gold on Navy:      4.8:1  (AA)  ✅
White on Navy:     12.5:1 (AAA) ✅
Gray 600 on White: 5.7:1  (AA)  ✅
```

### Focus States

```css
/* Keyboard focus */
.focus-visible:focus {
  outline: 2px solid #D4AF37;
  outline-offset: 2px;
}

/* Button focus */
button:focus-visible {
  ring: 2px solid #D4AF37;
  ring-offset: 2px;
}
```

### Screen Reader Support

```html
<!-- Skip to main content -->
<a href="#main" class="sr-only focus:not-sr-only">
  Skip to main content
</a>

<!-- Descriptive alt text -->
<img src="room.jpg" alt="Spacious deluxe room with king bed and city view">

<!-- ARIA labels -->
<button aria-label="Close menu">×</button>
```

---

## 🌍 Multi-Language Considerations

### Font Switching

```css
/* English */
.lang-en { font-family: 'Inter', sans-serif; }

/* Amharic & Oromo */
.lang-am,
.lang-om { font-family: 'Noto Sans Ethiopic', sans-serif; }

/* Display text */
.font-display { font-family: 'Playfair Display', serif; }
```

### Text Direction

```css
/* LTR (English, Oromo) */
[dir="ltr"] { text-align: left; }

/* RTL support (if needed) */
[dir="rtl"] { text-align: right; }
```

---

## 📦 Component Library

### Available Classes

```css
/* Typography */
.font-display      /* Playfair Display */
.font-body         /* Inter */
.font-ethiopic     /* Noto Sans Ethiopic */
.text-gradient-gold /* Gold gradient text */

/* Buttons */
.btn-primary       /* Gold CTA button */
.btn-secondary     /* Navy button */

/* Cards */
.luxury-card       /* Elevated card with shadow */

/* Animations */
.animate-fade-in-up /* Fade in from bottom */
.hover-scale       /* Scale on hover */
```

---

## 🎯 Design Principles

### 1. Luxury First
Every element should feel premium and intentional.

### 2. Cultural Authenticity
Incorporate Ethiopian elements without stereotypes.

### 3. Clarity Over Complexity
Simple, elegant solutions over complicated designs.

### 4. Performance Matters
Beautiful designs that load fast.

### 5. Accessibility Always
Inclusive design for all users.

---

## 📚 Resources

### Fonts
- [Playfair Display](https://fonts.google.com/specimen/Playfair+Display)
- [Inter](https://fonts.google.com/specimen/Inter)
- [Noto Sans Ethiopic](https://fonts.google.com/noto/specimen/Noto+Sans+Ethiopic)

### Tools
- [Tailwind CSS](https://tailwindcss.com)
- [Color Contrast Checker](https://webaim.org/resources/contrastchecker/)
- [Coolors](https://coolors.co) - Color palette generator

### Inspiration
- Luxury hotel websites
- Ethiopian cultural design
- Modern minimalism
- Boutique hospitality

---

**Design System Version:** 1.0.0  
**Last Updated:** February 9, 2026  
**Maintained By:** FiraHotel Design Team
