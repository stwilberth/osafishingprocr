{{-- Componente para implementar Schema.org para la organización --}}
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Osa Fishing Pro CR",
  "image": "{{ asset('images/osa_transparent_circle.png') }}",
  "@id": "https://osafishingprocr.com",
  "url": "https://osafishingprocr.com",
  "telephone": "+50660283248",
  "priceRange": "₡₡₡",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Zona Sur",
    "addressLocality": "Península de Osa",
    "addressRegion": "Puntarenas",
    "postalCode": "60701",
    "addressCountry": "CR"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 8.5333,
    "longitude": -83.4667
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday"
    ],
    "opens": "08:00",
    "closes": "18:00"
  },
  "sameAs": [
    "https://www.facebook.com/osafishingprocr",
    "https://www.instagram.com/osafishingprocr"
  ],
  "description": "Tienda especializada en equipos de pesca para pescadores recreativos de la zona sur de Costa Rica. Cañas, carretes y señuelos ideales para pesca de consumo en ríos y mar de la Península de Osa.",
  "areaServed": {
    "@type": "GeoCircle",
    "geoMidpoint": {
      "@type": "GeoCoordinates",
      "latitude": 8.5333,
      "longitude": -83.4667
    },
    "geoRadius": "50000"
  },
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://osafishingprocr.com/products?search={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>