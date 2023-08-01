<?php
    use Illuminate\Support\Carbon;
    $created_at = new Carbon($post->post_date);
    $created_at_gmt = new Carbon($post->post_date_gmt);
    $updated_at = new Carbon($post->post_modified);
    $updated_at_gmt = new Carbon($post->post_modified_gmt);
    $canonical = null;
    if ($post->post_type == 'post') {
        $canonical = env('APP_URL', 'http://127.0.0.1') . '/blog/' . $created_at->format('Y/m/d') . '/' . $post->post_name;
    } else {
        $canonical = env('APP_URL', 'http://127.0.0.1') . '/' . $post->post_name;
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
<!-- (>_ ): XHTML 1.0 Basic is intended for full oEmbed compatibility, see https://oembed.com/#section2 -->
<!-- (#_ ): But CSS3 is still used to render this embed stuff -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.0//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic10.dtd">
<html>
    <head>
        <title>{{ $post->post_title }} - {{ config('app.name', 'Laravel') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.bunny.net/" />
        <link rel="preconnect" href="https://reinhart1010.github.io/" />
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Bebas+Neue&display=swap" type="text/css" />
        <link rel="stylesheet" href="https://reinhart1010.github.io/nacelle/nacelle.lite.min.css" type="text/css" />
        <style>
            body {
                background-color: #ffffff; /* ($_ ): Fignting against transparent iframes */
                display: flex;
                flex-direction: column;
                font-family: Nacelle, Aileron, "Helvetica Neue", sans-serif;
                flex-wrap: nowrap;
                height: 100vh;
                justify-content: center;
                margin: 0;
                width: 100vw;
            }
            img.cover {
                flex: 1 1 auto;
                height: 100px; /* (#_ ): Will be readjusted with flex */
                object-fit: cover;
                min-width: 100%;
            }
            .caption {
                color: #000000;
                cursor: pointer;
                padding: 1rem;
                text-decoration: none;
            }
            .caption h1 {
                margin-bottom: 1rem;
                margin-top: 1rem;
                margin-block: 1rem;
            }
            .logotype {
                font-family: "Bebas Neue", sans-serif;
                font-size: 2rem;
                letter-spacing: 0.025em;
                text-align: right;
            }
            .title {
                font-size: 3rem;
                font-weight: 200;
            }
        </style>
    </head>
    <body>
        @if (isset($post->thumbnail))
            <?php
                $cover_image_srcset_string = '';
                ksort($cover_image_srcset, SORT_NUMERIC);
                foreach ($cover_image_srcset as $size => $src) {
                    $cover_image_srcset_string .= $src . ' ' . $size . 'w ';
                }
            ?>
            <img src="{{ $post->thumbnail['attachment']['url'] }}" srcset="{{ $cover_image_srcset_string }}" alt="{{ $post->thumbnail['attachment']['alt'] || $post->thumbnail['attachment']['description'] || $post->thumbnail['attachment']['title'] }}" class="cover" />
        @elseif (isset($post->image))
            <img src="{{ $post->image }}" class="cover" />
        @endif
        <a class="caption" href="{{ $canonical }}">
            <h1 class="title">{{ $post->post_title }}</h1>
            <div class="logotype">REINHART1010</div>
        </a>
    </body>
</html>