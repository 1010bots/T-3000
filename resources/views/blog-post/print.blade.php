<?php
    use Illuminate\Support\Carbon;
    use chillerlan\QRCode\QRCode;
    $created_at = new Carbon($post->post_date);
    $created_at_gmt = new Carbon($post->post_date_gmt);
    $updated_at = new Carbon($post->post_modified);
    $updated_at_gmt = new Carbon($post->post_modified_gmt);
    $canonical = null;
    if ($post->post_type == 'post') {
        $canonical = env('APP_URL', 'http://127.0.0.1') . '/blog/' . $created_at->format('Y/m/d') . '/' . $post->post_name;
    }

    // Post Metadata
    $post_meta = [];
    if (isset($post->meta)) {
        foreach ($post->meta as $meta) {
            $post_meta[$meta['meta_key']] = $meta['value'];
        }
    }

    // Post Cover Image
    $cover_image_srcset = []; $cover_image_og = null;
    if (isset($post->thumbnail)) {
        foreach ($post->thumbnail['attachment']['meta'] as $meta) {
            if ($meta['meta_key'] != '_wp_attachment_metadata' || !isset($meta['value']) || !isset($meta['value']['sizes'])) continue;
            preg_match('/([\s\S]+?)\/wp-content\/uploads\/(\d+)\/(\d+)\//', $post->thumbnail['attachment']['url'], $url_parts);
            if (count($url_parts) == 0) continue;
            foreach ($meta['value']['sizes'] as $type => $size) {
                if ($type == 'thumbnail') continue;
                if ($type == 'post-thumbnail') $cover_image_og = $url_parts[1] . '/wp-content/uploads/' . $url_parts[2] . '/' . $url_parts[3] . '/' . $size['file'];
                $cover_image_srcset[$size['width']] = $url_parts[1] . '/wp-content/uploads/' . $url_parts[2] . '/' . $url_parts[3] . '/' . $size['file'];
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->post_title }}</title>
    <meta name="robots" content="noindex">
    <style>
        body {
            font-family: "Liberation Sans", Arimo, Helvetica, Arial, sans-serif;
        }
        .header {
            display: flex;
            align-items: center;
        }
        article main figure {
            margin-bottom: 1rem;
            margin-top: 1rem;
        }
        article main figure figcaption {
            font-size: 1rem;
            font-style: italic;
            line-height: 1.5;
            margin-bottom: 0.5rem;
            margin-top: 0.5rem;
            text-align: center;
        }
        article main img {
            border-radius: 0.75rem;
            max-width: 100%;
        }
        article main p {
            margin-bottom: 1rem;
            margin-top: 1rem;
        }
        article main ul {
            list-style-type: "+ ";
        }
        article main ol {
            list-style-type: decimal;
            margin-inline-start: 2rem;
        }

        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <article>
        <div class="header">
            <div>
                <h1 class="post-title">{{ $post->post_title }}
                    <button class="print-button" onclick="window.print()">🖨️ Print this page</button></h1>
                <b class="post-date">reinhart1010.id &ndash; {{ $created_at->format('j F Y') }}
                    @if ($created_at != $updated_at)
                        &bull; (Updated {{ $updated_at->format('j F Y') }})
                    @endif
                </b>
                <p>From <a href="{{$canonical}}">{{$canonical}}</a>. Scan the QR Code<sup>&reg;</sup> to view the article in your device or web browser.</p>
            </div>
            <img src="{{(new QRCode)->render($canonical)}}" alt="QR Code" height="160" width="160" />
        </div>
        <small>Content may subject to copyright. Visit the original website to view copyright and licensing terms of this post. QR Code is a registered trademark of DENSO WAVE, Inc. in Japan and other countries.</small>
        <hr />
        <main>
            {!! $post->content !!}
        </main>
    </article>
</body>
</html>
