<?php

if (!function_exists('producto_img')) {
    /**
     * URL de imagen de producto servida desde el CDN (R2 bucket wilberth).
     * Recibe la ruta tal como está en la DB (ej: "products/thumb_xxx.jpg").
     */
    function producto_img(?string $path): string
    {
        if (!$path) {
            return '';
        }
        $base = 'https://cdn.wilberth.com/osafishingprocr';
        $path = ltrim($path, '/');
        if (str_starts_with($path, 'products/')) {
            return $base . '/' . $path;
        }
        return $base . '/products/' . $path;
    }
}
