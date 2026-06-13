@props([
    'title' => 'FiraHotel - Ethiopian Luxury Hospitality',
    'description' => 'Experience Ethiopian luxury hospitality at FiraHotel. Premium accommodations, authentic experiences, and world-class service in the heart of Addis Ababa.',
    'image' => asset('Images/IMG_6115.PNG'),
    'url' => url()->current(),
    'type' => 'website'
])

<!-- Primary Meta Tags -->
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="FiraHotel, Ethiopia hotel, Addis Ababa luxury hotel, Ethiopian hospitality, luxury accommodation Ethiopia, hotel booking Ethiopia, premium hotel Addis Ababa">
<meta name="author" content="FiraHotel">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ $url }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $type }}">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:site_name" content="FiraHotel">
<meta property="og:locale" content="{{ app()->getLocale() }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $url }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ $image }}">

<!-- Additional SEO -->
<meta name="geo.region" content="ET-AA">
<meta name="geo.placename" content="Addis Ababa">
<meta name="geo.position" content="9.0320;38.7469">
<meta name="ICBM" content="9.0320, 38.7469">

<!-- Schema.org markup for Google -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Hotel",
  "name": "FiraHotel",
  "description": "{{ $description }}",
  "image": "{{ $image }}",
  "url": "{{ config('app.url') }}",
  "telephone": "+251112345678",
  "email": "reservations@firahotel.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Central Business District",
    "addressLocality": "Addis Ababa",
    "addressCountry": "ET"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "9.0320",
    "longitude": "38.7469"
  },
  "priceRange": "$$$$",
  "starRating": {
    "@type": "Rating",
    "ratingValue": "5"
  },
  "amenityFeature": [
    {
      "@type": "LocationFeatureSpecification",
      "name": "Free WiFi"
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Spa"
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Restaurant"
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "24/7 Concierge"
    }
  ]
}
</script>
