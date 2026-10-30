<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://domain.com</loc>
        <lastmod>2025-06-10</lastmod>
    </url>
    @foreach($posts as $post)
    <url>
        <loc>https://domain.com/posts/{{ $post->slug }}</loc>
        <lastmod>{{$post->updated_at->format('Y-m-d ')}}</lastmod>
    </url>
    @endforeach
</urlset>