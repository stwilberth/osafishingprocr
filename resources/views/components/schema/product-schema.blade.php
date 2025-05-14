{{-- Componente para implementar Schema.org para productos --}}
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "{{ $product->name }}",
  "image": [
    @if ($product->images->count() > 0)
      "{{ asset('storage/products/' . $product->images->first()->url) }}"
    @else
      "{{ asset('images/no_image.jpg') }}"
    @endif
  ],
  "description": "{{ $product->description }}",
  "sku": "{{ $product->id }}",
  "brand": {
    "@type": "Brand",
    "name": "{{ $product->brand->name }}"
  },
  "offers": {
    "@type": "Offer",
    "url": "{{ url()->current() }}",
    "priceCurrency": "CRC",
    "price": "{{ $product->price }}",
    "priceValidUntil": "{{ now()->addMonths(6)->format('Y-m-d') }}",
    "availability": "{{ $product->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}",
    "seller": {
      "@type": "Organization",
      "name": "Osa Fishing Pro CR"
    }
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.8",
    "reviewCount": "5"
  },
  "areaServed": {
    "@type": "Place",
    "name": "Zona Sur de Costa Rica",
    "address": {
      "@type": "PostalAddress",
      "addressRegion": "Puntarenas",
      "addressCountry": "Costa Rica"
    }
  }
}
</script>