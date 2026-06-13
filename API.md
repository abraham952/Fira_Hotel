# FiraHotel - API Documentation (Future Implementation)

## 🚀 Overview

This document outlines the planned REST API for FiraHotel, enabling third-party integrations, mobile apps, and channel managers.

**Status:** 📋 Planned (Not Yet Implemented)  
**Base URL:** `https://api.firahotel.com/v1`  
**Authentication:** Bearer Token (JWT)

---

## 🔐 Authentication

### POST /auth/login
Login and receive access token.

**Request:**
```json
{
  "email": "user@example.com",
  "password": "password123"
}
```

**Response:**
```json
{
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGc...",
  "token_type": "Bearer",
  "expires_in": 3600
}
```

### POST /auth/register
Register new user account.

---

## 🏨 Hotels

### GET /hotels
List all hotels.

**Query Parameters:**
- `locale` (string): Language code (en, am, om)
- `page` (int): Page number
- `per_page` (int): Items per page

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "name": "FiraHotel Addis Ababa",
      "slug": "firahotel-addis-ababa",
      "description": "Experience unparalleled luxury...",
      "star_rating": 5,
      "address": "Bole Road, Addis Ababa, Ethiopia",
      "phone": "+251 11 XXX XXXX",
      "email": "info@firahotel.com",
      "amenities": ["WiFi", "Pool", "Spa"],
      "images": ["url1", "url2"],
      "location": {
        "latitude": 9.0320,
        "longitude": 38.7469
      }
    }
  ],
  "meta": {
    "current_page": 1,
    "total": 1,
    "per_page": 15
  }
}
```

### GET /hotels/{id}
Get hotel details.

---

## 🛏️ Rooms

### GET /hotels/{hotel_id}/rooms
List rooms for a hotel.

**Query Parameters:**
- `locale` (string): Language code
- `check_in` (date): Check-in date (YYYY-MM-DD)
- `check_out` (date): Check-out date (YYYY-MM-DD)
- `adults` (int): Number of adults
- `children` (int): Number of children
- `room_type` (string): Filter by type (deluxe, suite, presidential)

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "name": "Deluxe Room",
      "description": "Spacious room with modern amenities...",
      "room_type": "deluxe",
      "capacity": 2,
      "beds": 1,
      "size_sqm": 35,
      "base_price": 250,
      "currency": "USD",
      "amenities": ["King Bed", "WiFi", "Mini Bar"],
      "images": ["url1", "url2"],
      "view_type": "city",
      "is_available": true,
      "available_rooms": 15
    }
  ]
}
```

### GET /rooms/{id}
Get room details.

### GET /rooms/{id}/availability
Check room availability for date range.

**Query Parameters:**
- `check_in` (date): Required
- `check_out` (date): Required

**Response:**
```json
{
  "available": true,
  "available_rooms": 15,
  "total_rooms": 20,
  "price_per_night": 250,
  "total_price": 750,
  "currency": "USD",
  "nights": 3
}
```

---

## 📅 Bookings

### POST /bookings
Create new booking.

**Request:**
```json
{
  "room_id": 1,
  "check_in": "2026-03-15",
  "check_out": "2026-03-18",
  "adults": 2,
  "children": 0,
  "guest": {
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "+1234567890",
    "country": "USA"
  },
  "special_requests": [
    "Late check-in",
    "High floor"
  ],
  "preferred_language": "en"
}
```

**Response:**
```json
{
  "id": 123,
  "booking_reference": "FH-ABC123XYZ",
  "status": "confirmed",
  "room": {
    "id": 1,
    "name": "Deluxe Room"
  },
  "check_in": "2026-03-15",
  "check_out": "2026-03-18",
  "nights": 3,
  "adults": 2,
  "children": 0,
  "total_price": 750,
  "currency": "USD",
  "payment_status": "pending",
  "created_at": "2026-02-09T10:30:00Z"
}
```

### GET /bookings/{id}
Get booking details.

### GET /bookings
List user's bookings.

**Query Parameters:**
- `status` (string): Filter by status (confirmed, cancelled, completed)
- `from_date` (date): Filter from date
- `to_date` (date): Filter to date

### PATCH /bookings/{id}
Update booking (modify dates, guests).

### DELETE /bookings/{id}
Cancel booking.

---

## 🎭 Experiences

### GET /hotels/{hotel_id}/experiences
List experiences for a hotel.

**Query Parameters:**
- `locale` (string): Language code
- `category` (string): Filter by category (spa, dining, cultural, adventure)

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "name": "Traditional Coffee Ceremony",
      "description": "Experience authentic Ethiopian coffee...",
      "category": "cultural",
      "price": 25,
      "currency": "USD",
      "duration_minutes": 90,
      "images": ["url1"]
    }
  ]
}
```

### GET /experiences/{id}
Get experience details.

### POST /experiences/{id}/book
Book an experience.

---

## 💳 Payments

### POST /payments/intent
Create payment intent (Stripe).

**Request:**
```json
{
  "booking_id": 123,
  "amount": 750,
  "currency": "USD"
}
```

**Response:**
```json
{
  "client_secret": "pi_xxx_secret_xxx",
  "payment_intent_id": "pi_xxx"
}
```

### POST /payments/confirm
Confirm payment.

### GET /payments/{id}
Get payment details.

---

## 👤 User Profile

### GET /user/profile
Get authenticated user profile.

### PATCH /user/profile
Update user profile.

### GET /user/bookings
Get user's booking history.

### GET /user/preferences
Get user preferences (language, currency).

### PATCH /user/preferences
Update user preferences.

---

## 🌍 Localization

### GET /locales
List supported locales.

**Response:**
```json
{
  "data": [
    {
      "code": "en",
      "name": "English",
      "native": "English",
      "flag": "🇬🇧",
      "dir": "ltr"
    },
    {
      "code": "am",
      "name": "Amharic",
      "native": "አማርኛ",
      "flag": "🇪🇹",
      "dir": "ltr"
    },
    {
      "code": "om",
      "name": "Afaan Oromo",
      "native": "Afaan Oromoo",
      "flag": "🇪🇹",
      "dir": "ltr"
    }
  ]
}
```

### GET /currencies
List supported currencies.

### GET /currencies/convert
Convert currency.

**Query Parameters:**
- `from` (string): Source currency (USD)
- `to` (string): Target currency (ETB)
- `amount` (float): Amount to convert

---

## 📊 Analytics (Admin Only)

### GET /admin/analytics/bookings
Get booking analytics.

### GET /admin/analytics/revenue
Get revenue analytics.

### GET /admin/analytics/occupancy
Get occupancy rates.

---

## 🔔 Webhooks

### Booking Events
- `booking.created`
- `booking.confirmed`
- `booking.cancelled`
- `booking.completed`

### Payment Events
- `payment.succeeded`
- `payment.failed`
- `payment.refunded`

**Webhook Payload:**
```json
{
  "event": "booking.confirmed",
  "timestamp": "2026-02-09T10:30:00Z",
  "data": {
    "booking_id": 123,
    "booking_reference": "FH-ABC123XYZ",
    "status": "confirmed"
  }
}
```

---

## 📝 Error Responses

### Standard Error Format
```json
{
  "error": {
    "code": "ROOM_NOT_AVAILABLE",
    "message": "The selected room is not available for the chosen dates",
    "details": {
      "room_id": 1,
      "check_in": "2026-03-15",
      "check_out": "2026-03-18"
    }
  }
}
```

### HTTP Status Codes
- `200` - Success
- `201` - Created
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Validation Error
- `429` - Too Many Requests
- `500` - Internal Server Error

---

## 🔒 Rate Limiting

- **Authenticated:** 1000 requests/hour
- **Unauthenticated:** 100 requests/hour

**Headers:**
```
X-RateLimit-Limit: 1000
X-RateLimit-Remaining: 999
X-RateLimit-Reset: 1612886400
```

---

## 📦 SDKs (Planned)

### JavaScript/TypeScript
```javascript
import FiraHotel from '@firahotel/sdk';

const client = new FiraHotel({
  apiKey: 'your-api-key',
  locale: 'en'
});

const rooms = await client.rooms.list({
  hotelId: 1,
  checkIn: '2026-03-15',
  checkOut: '2026-03-18'
});
```

### PHP
```php
use FiraHotel\Client;

$client = new Client([
    'api_key' => 'your-api-key',
    'locale' => 'en'
]);

$rooms = $client->rooms->list([
    'hotel_id' => 1,
    'check_in' => '2026-03-15',
    'check_out' => '2026-03-18'
]);
```

---

## 🧪 Testing

### Sandbox Environment
**Base URL:** `https://sandbox-api.firahotel.com/v1`

### Test Credentials
```
Email: test@firahotel.com
Password: test123
API Key: test_sk_xxx
```

### Test Cards (Stripe)
- Success: `4242 4242 4242 4242`
- Decline: `4000 0000 0000 0002`

---

## 📚 Implementation Roadmap

### Phase 1: Core API (Q2 2026)
- [ ] Authentication endpoints
- [ ] Hotels & Rooms endpoints
- [ ] Basic booking flow
- [ ] JWT authentication

### Phase 2: Advanced Features (Q3 2026)
- [ ] Payment integration
- [ ] Webhooks
- [ ] User profiles
- [ ] Experience bookings

### Phase 3: Analytics & Admin (Q4 2026)
- [ ] Admin endpoints
- [ ] Analytics API
- [ ] Reporting endpoints
- [ ] Bulk operations

### Phase 4: SDKs & Tools (Q1 2027)
- [ ] JavaScript SDK
- [ ] PHP SDK
- [ ] API documentation portal
- [ ] Postman collection

---

**API Version:** 1.0.0 (Planned)  
**Last Updated:** February 9, 2026  
**Status:** 📋 Design Phase
