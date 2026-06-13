<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Experience;
use Illuminate\Database\Seeder;

class FiraHotelSeeder extends Seeder
{
    public function run(): void
    {
        // Create Main Hotel
        $hotel = Hotel::create([
            'name' => [
                'en' => 'FiraHotel Addis Ababa',
                'am' => 'ፊራሆቴል አዲስ አበባ',
                'om' => 'FiraHotel Finfinnee',
            ],
            'description' => [
                'en' => 'Experience unparalleled luxury in the heart of Addis Ababa. FiraHotel combines Ethiopian hospitality with world-class amenities.',
                'am' => 'በአዲስ አበባ መሃል ላይ ያልተመሳሰለ ቅንጦት ይለማመዱ። ፊራሆቴል የኢትዮጵያን መስተንግዶ ከዓለም አቀፍ አገልግሎቶች ጋር ያጣምራል።',
                'om' => 'Qananii wal hin fakkaanne gidduu Finfinnee keessatti muuxannoo. FiraHotel keessummummaa Itoophiyaa fi tajaajila addunyaa walitti fida.',
            ],
            'slug' => 'firahotel-addis-ababa',
            'email' => 'info@firahotel.com',
            'phone' => '+251 11 XXX XXXX',
            'whatsapp' => '+251 9XX XXX XXX',
            'address' => [
                'en' => 'Bole Road, Addis Ababa, Ethiopia',
                'am' => 'ቦሌ መንገድ፣ አዲስ አበባ፣ ኢትዮጵያ',
                'om' => 'Daandii Bole, Finfinnee, Itoophiyaa',
            ],
            'latitude' => 9.0320,
            'longitude' => 38.7469,
            'star_rating' => 5,
            'amenities' => ['WiFi', 'Pool', 'Spa', 'Restaurant', 'Bar', 'Gym', 'Parking', 'Concierge'],
            'images' => [
                'https://images.unsplash.com/photo-1566073771259-6a8506099945',
                'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb',
            ],
        ]);

        // Create Rooms
        $rooms = [
            [
                'name' => [
                    'en' => 'Deluxe Room',
                    'am' => 'ዴሉክስ ክፍል',
                    'om' => 'Kutaa Deluxe',
                ],
                'description' => [
                    'en' => 'Spacious room with modern amenities and city views. Perfect for business or leisure travelers.',
                    'am' => 'ሰፊ ክፍል ከዘመናዊ አገልግሎቶች እና የከተማ እይታዎች ጋር። ለንግድ ወይም ለመዝናኛ ተጓዦች ፍጹም።',
                    'om' => 'Kutaa bal\'aa tajaajila ammayyaa fi ilaalcha magaalaa qabu. Imaltootaa daldalaa fi bashannanaaf gaarii.',
                ],
                'room_type' => 'deluxe',
                'capacity' => 2,
                'beds' => 1,
                'size_sqm' => 35,
                'base_price' => 250,
                'amenities' => ['King Bed', 'WiFi', 'Mini Bar', 'Safe', 'TV', 'Air Conditioning'],
                'view_type' => 'city',
                'total_rooms' => 20,
            ],
            [
                'name' => [
                    'en' => 'Executive Suite',
                    'am' => 'ኤግዚክዩቲቭ ስዊት',
                    'om' => 'Suite Executive',
                ],
                'description' => [
                    'en' => 'Luxurious suite with separate living area, premium amenities, and stunning panoramic views.',
                    'am' => 'የተለየ የመኖሪያ ቦታ፣ ከፍተኛ አገልግሎቶች እና አስደናቂ የፓኖራማ እይታዎች ያለው ቅንጦት ስዊት።',
                    'om' => 'Suite qananii bakka jireenyaa addaa, tajaajila olaanaa fi ilaalcha dinqisiisaa qabu.',
                ],
                'room_type' => 'suite',
                'capacity' => 3,
                'beds' => 1,
                'size_sqm' => 55,
                'base_price' => 450,
                'amenities' => ['King Bed', 'Living Room', 'WiFi', 'Mini Bar', 'Safe', 'TV', 'Spa Bath', 'Balcony'],
                'view_type' => 'city',
                'total_rooms' => 10,
            ],
            [
                'name' => [
                    'en' => 'Presidential Suite',
                    'am' => 'ፕሬዚዳንሻል ስዊት',
                    'om' => 'Suite Presidential',
                ],
                'description' => [
                    'en' => 'The pinnacle of luxury. Expansive suite with private dining, butler service, and exclusive amenities.',
                    'am' => 'የቅንጦት ጫፍ። ግላዊ የመመገቢያ ቦታ፣ የባትለር አገልግሎት እና ልዩ አገልግሎቶች ያለው ሰፊ ስዊት።',
                    'om' => 'Fiixee qananii. Suite bal\'aa nyaata dhuunfaa, tajaajila butler fi tajaajila addaa qabu.',
                ],
                'room_type' => 'presidential',
                'capacity' => 4,
                'beds' => 2,
                'size_sqm' => 120,
                'base_price' => 1200,
                'amenities' => ['2 King Beds', 'Living Room', 'Dining Room', 'Kitchen', 'WiFi', 'Mini Bar', 'Safe', 'Multiple TVs', 'Spa Bath', 'Private Terrace', 'Butler Service'],
                'view_type' => 'panoramic',
                'total_rooms' => 2,
            ],
        ];

        foreach ($rooms as $roomData) {
            $hotel->rooms()->create($roomData);
        }

        // Create Experiences
        $experiences = [
            [
                'name' => [
                    'en' => 'Traditional Coffee Ceremony',
                    'am' => 'ባህላዊ የቡና ስነ-ስርዓት',
                    'om' => 'Aadaa Buna Aadaa',
                ],
                'description' => [
                    'en' => 'Experience the authentic Ethiopian coffee ceremony, a cultural tradition dating back centuries.',
                    'am' => 'ለብዙ መቶ ዘመናት የሚመለስ የባህል ወግ የሆነውን እውነተኛ የኢትዮጵያ የቡና ስነ-ስርዓት ይለማመዱ።',
                    'om' => 'Aadaa buna Itoophiyaa dhugaa, aadaa jaarraa dhibbaa duubatti deebi\'u muuxannoo.',
                ],
                'category' => 'cultural',
                'price' => 25,
                'duration_minutes' => 90,
            ],
            [
                'name' => [
                    'en' => 'Luxury Spa Treatment',
                    'am' => 'የቅንጦት ስፓ ህክምና',
                    'om' => 'Yaalii Spa Qananii',
                ],
                'description' => [
                    'en' => 'Rejuvenate with our signature spa treatments combining traditional Ethiopian healing with modern techniques.',
                    'am' => 'ባህላዊ የኢትዮጵያ ህክምናን ከዘመናዊ ቴክኒኮች ጋር በማጣመር በእኛ የፊርማ ስፓ ህክምናዎች ያድሱ።',
                    'om' => 'Yaalii spa mallattoo keenya kan yaalii aadaa Itoophiyaa fi tooftaa ammayyaa walitti fidu fayyadamuun haaromfamaa.',
                ],
                'category' => 'spa',
                'price' => 150,
                'duration_minutes' => 120,
            ],
            [
                'name' => [
                    'en' => 'Ethiopian Culinary Experience',
                    'am' => 'የኢትዮጵያ የምግብ ማብሰያ ልምድ',
                    'om' => 'Muuxannoo Nyaata Itoophiyaa',
                ],
                'description' => [
                    'en' => 'Discover the rich flavors of Ethiopian cuisine with our expert chefs in an interactive cooking class.',
                    'am' => 'በእኛ ባለሙያ ሼፎች ጋር በተለዋዋጭ የምግብ ማብሰያ ክፍል ውስጥ የኢትዮጵያ ምግብ ሀብታም ጣዕሞችን ያግኙ።',
                    'om' => 'Mi\'a badhaadhaa nyaata Itoophiyaa chef ogummaa keenya waliin daree nyaata qopheessuu wal-qunnamtii keessatti argadhu.',
                ],
                'category' => 'dining',
                'price' => 80,
                'duration_minutes' => 180,
            ],
            [
                'name' => [
                    'en' => 'City Cultural Tour',
                    'am' => 'የከተማ ባህላዊ ጉብኝት',
                    'om' => 'Daawwannaa Aadaa Magaalaa',
                ],
                'description' => [
                    'en' => 'Explore Addis Ababa\'s rich history and vibrant culture with our knowledgeable local guides.',
                    'am' => 'የአዲስ አበባን ሀብታም ታሪክ እና ደማቅ ባህል በእኛ እውቀት ባላቸው የአካባቢ መመሪያዎች ጋር ያስሱ።',
                    'om' => 'Seenaa badhaadhaa fi aadaa jireenyaa Finfinnee qajeelchitoota naannoo beekumsa qaban keenya waliin qoradhaa.',
                ],
                'category' => 'cultural',
                'price' => 60,
                'duration_minutes' => 240,
            ],
        ];

        foreach ($experiences as $expData) {
            $hotel->experiences()->create($expData);
        }
    }
}
