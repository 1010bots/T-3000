<?php
    use Illuminate\Support\Carbon;
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
<x-app-layout :canonical="$canonical" :description="$post->post_excerpt" :keywords="$post->keywords_str" :oembed="true" :og-article-published-time="$created_at->toIso8601String()" :og-article-modified-time="$updated_at->toIso8601String()" :og-image="$cover_image_og" og-type="article" :title="$post->post_title" theme-color="violet">
    <style scoped>
        article main a {
            color: #6932BB;
            font-weight: 700;
        }
        article main a::after {
            background-color: #6932BB;
            bottom: 0;
            content: "";
            display: inline-block;
            height: 1rem;
            margin-bottom: calc(-1.1em + 1rem);
            mask: url("data:image/svg+xml,%3Csvg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9.75 4H10.2662C12.3292 4 14 5.67984 14 7.75C14 9.75338 12.4353 11.3912 10.4706 11.4948L10.2729 11.5L9.75667 11.5046C9.34247 11.5082 9.00371 11.1755 8.99997 10.7613C8.99665 10.3816 9.276 10.0653 9.64162 10.0124L9.74333 10.0046L10.2662 10C11.499 10 12.5 8.99355 12.5 7.75C12.5 6.55827 11.5807 5.58428 10.419 5.50519L10.2662 5.5H9.75C9.33579 5.5 8.99997 5.16421 8.99997 4.75C8.99997 4.3703 9.28215 4.05651 9.64823 4.00685L9.75 4H10.2662H9.75ZM5.7523 4H6.25C6.66421 4 7 4.33579 7 4.75C7 5.1297 6.71785 5.44349 6.35177 5.49315L6.25 5.5H5.7523C4.50839 5.5 3.5 6.50839 3.5 7.7523C3.5 8.94437 4.42611 9.92015 5.59809 9.99939L5.7523 10.0046H6.25C6.66421 10.0046 7 10.3404 7 10.7546C7 11.1343 6.71785 11.4481 6.35177 11.4977L6.25 11.5046H5.7523C3.67996 11.5046 2 9.82463 2 7.7523C2 5.74681 3.57332 4.10879 5.55302 4.0052L5.7523 4H6.25H5.7523ZM5.75 7H10.25C10.6642 7 11 7.33579 11 7.75C11 8.1297 10.7178 8.44349 10.3518 8.49315L10.25 8.5H5.75C5.33579 8.5 5 8.16421 5 7.75C5 7.3703 5.28215 7.05651 5.64823 7.00685L5.75 7H10.25H5.75Z' fill='currentColor'/%3E%3C/svg%3E") no-repeat center;
            -webkit-mask: url("data:image/svg+xml,%3Csvg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9.75 4H10.2662C12.3292 4 14 5.67984 14 7.75C14 9.75338 12.4353 11.3912 10.4706 11.4948L10.2729 11.5L9.75667 11.5046C9.34247 11.5082 9.00371 11.1755 8.99997 10.7613C8.99665 10.3816 9.276 10.0653 9.64162 10.0124L9.74333 10.0046L10.2662 10C11.499 10 12.5 8.99355 12.5 7.75C12.5 6.55827 11.5807 5.58428 10.419 5.50519L10.2662 5.5H9.75C9.33579 5.5 8.99997 5.16421 8.99997 4.75C8.99997 4.3703 9.28215 4.05651 9.64823 4.00685L9.75 4H10.2662H9.75ZM5.7523 4H6.25C6.66421 4 7 4.33579 7 4.75C7 5.1297 6.71785 5.44349 6.35177 5.49315L6.25 5.5H5.7523C4.50839 5.5 3.5 6.50839 3.5 7.7523C3.5 8.94437 4.42611 9.92015 5.59809 9.99939L5.7523 10.0046H6.25C6.66421 10.0046 7 10.3404 7 10.7546C7 11.1343 6.71785 11.4481 6.35177 11.4977L6.25 11.5046H5.7523C3.67996 11.5046 2 9.82463 2 7.7523C2 5.74681 3.57332 4.10879 5.55302 4.0052L5.7523 4H6.25H5.7523ZM5.75 7H10.25C10.6642 7 11 7.33579 11 7.75C11 8.1297 10.7178 8.44349 10.3518 8.49315L10.25 8.5H5.75C5.33579 8.5 5 8.16421 5 7.75C5 7.3703 5.28215 7.05651 5.64823 7.00685L5.75 7H10.25H5.75Z' fill='currentColor'/%3E%3C/svg%3E") no-repeat center;
            width: 1rem;
        }
        article main a[target="_blank"]::after {
            mask: url("data:image/svg+xml,%3Csvg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M4.13332 3.69238C4.46915 2.70798 5.4019 2 6.5 2H11.5C12.8807 2 14 3.11929 14 4.5V9.5C14 10.5981 13.2921 11.5308 12.3077 11.8667V12.2308C12.3077 12.5665 12.1906 12.9937 11.9162 13.3469C11.6272 13.7191 11.1682 14.0001 10.5385 14.0001H4.76923C3.22385 14.0001 2 12.7761 2 11.2308V5.46161C2 4.91317 2.19723 4.45581 2.54568 4.13948C2.88637 3.8302 3.33074 3.69238 3.76923 3.69238H4.13332ZM4 4.69238H3.76923C3.53343 4.69238 3.34318 4.7661 3.21783 4.8799C3.10025 4.98664 3 5.1639 3 5.46161V11.2308C3 12.2239 3.77615 13.0001 4.76923 13.0001H10.5385C10.8375 13.0001 11.0131 12.8795 11.1265 12.7335C11.2546 12.5686 11.3077 12.3612 11.3077 12.2308V12H6.5C5.11929 12 4 10.8807 4 9.5V4.69238ZM8 6H9.29289L6.64645 8.64645C6.45118 8.84171 6.45118 9.15829 6.64645 9.35355C6.84171 9.54882 7.15829 9.54882 7.35355 9.35355L10 6.70711V8C10 8.27614 10.2239 8.5 10.5 8.5C10.7761 8.5 11 8.27614 11 8V5.5C11 5.22386 10.7761 5 10.5 5H8C7.72386 5 7.5 5.22386 7.5 5.5C7.5 5.77614 7.72386 6 8 6Z' fill='currentColor'/%3E%3C/svg%3E") no-repeat center;
            -webkit-mask: url("data:image/svg+xml,%3Csvg width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M4.13332 3.69238C4.46915 2.70798 5.4019 2 6.5 2H11.5C12.8807 2 14 3.11929 14 4.5V9.5C14 10.5981 13.2921 11.5308 12.3077 11.8667V12.2308C12.3077 12.5665 12.1906 12.9937 11.9162 13.3469C11.6272 13.7191 11.1682 14.0001 10.5385 14.0001H4.76923C3.22385 14.0001 2 12.7761 2 11.2308V5.46161C2 4.91317 2.19723 4.45581 2.54568 4.13948C2.88637 3.8302 3.33074 3.69238 3.76923 3.69238H4.13332ZM4 4.69238H3.76923C3.53343 4.69238 3.34318 4.7661 3.21783 4.8799C3.10025 4.98664 3 5.1639 3 5.46161V11.2308C3 12.2239 3.77615 13.0001 4.76923 13.0001H10.5385C10.8375 13.0001 11.0131 12.8795 11.1265 12.7335C11.2546 12.5686 11.3077 12.3612 11.3077 12.2308V12H6.5C5.11929 12 4 10.8807 4 9.5V4.69238ZM8 6H9.29289L6.64645 8.64645C6.45118 8.84171 6.45118 9.15829 6.64645 9.35355C6.84171 9.54882 7.15829 9.54882 7.35355 9.35355L10 6.70711V8C10 8.27614 10.2239 8.5 10.5 8.5C10.7761 8.5 11 8.27614 11 8V5.5C11 5.22386 10.7761 5 10.5 5H8C7.72386 5 7.5 5.22386 7.5 5.5C7.5 5.77614 7.72386 6 8 6Z' fill='currentColor'/%3E%3C/svg%3E") no-repeat center;
        }
        article main a:active, article main a:hover {
            color: #46009B;
        }
        article main a:active::after, article main a:hover::after {
            background-color: #46009B;
        }
        article main b, article main strong {
            color: #A7005E;
            font-weight: 700;
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
        article main h1, article main .h1 {
            font-size: 2.25rem;
            font-weight: 600;
            line-height: 2.5rem;
            margin-bottom: 1rem;
            margin-top: 1rem;
        }
        article main h2, article main .h2 {
            font-size: 1.875rem;
            font-weight: 600;
            line-height: 2.25rem;
            margin-bottom: 1rem;
            margin-top: 1rem;
        }
        article main h3, article main .h3 {
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 2rem;
            margin-bottom: 1rem;
            margin-top: 1rem;
        }
        article main h4, article main .h4 {
            font-size: 1.25rem;
            font-weight: 600;
            line-height: 1.75rem;
            margin-bottom: 1rem;
            margin-top: 1rem;
        }
        article main h5, article main .h5 {
            font-size: 1.125rem;
            font-weight: 600;
            line-height: 1.75rem;
            margin-bottom: 1rem;
            margin-top: 1rem;
        }
        article main h6, article main .h6 {
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5rem;
            margin-bottom: 1rem;
            margin-top: 1rem;
        }
        article main blockquote {
            padding-left: 1rem;
            padding-inline-start: 1rem;
            border-color: #D8CBFF;
            border-style: solid;
            border-left-width: 0.5rem;
            border-inline-start-width: 0.5rem;
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
            margin-inline-start: 2rem;
        }
        article main ol {
            list-style-type: decimal;
            margin-inline-start: 2rem;
        }
        @media screen and (prefers-color-scheme: dark) {
            article main a {
                color: #D8CBFF;
            }
            article main a::after {
                background-color: #D8CBFF;
            }
            article main a:active, article main a:hover {
                color: #A990E6;
            }
            article main a:active::after, article main a:hover::after {
                background-color: #A990E6;
            }
            article main b, article main strong {
                color: #FEC0D6;
            }
        }
    </style>
    <article class="m-auto py-6 max-w-2xl">
        <div class="my-4 px-safe-offset-6 text-black dark:text-white">
            <p class="m-0 text-xl">{{ $created_at->format('j F Y') }}
            @if ($created_at != $updated_at)
                &bull; (Updated {{ $updated_at->format('j F Y') }})
            @endif
            </p>
            <h1 class="text-3xl text-bold font-semibold break-words">{{ $post->post_title }}</h1>
        </div>
        <x-share-buttons :title="$post->post_title" :description="$post->post_excerpt" :cover-image-url="$cover_image_og" class="my-2 px-safe-offset-6" />
        @if (isset($post->thumbnail))
            <?php
                $cover_image_srcset_string = '';
                ksort($cover_image_srcset, SORT_NUMERIC);
                foreach ($cover_image_srcset as $size => $src) {
                    $cover_image_srcset_string .= $src . ' ' . $size . 'w ';
                }
            ?>
            <picture>
                <img alt="{{ strlen($post->thumbnail['attachment']['caption']) > 0 ? $post->thumbnail['attachment']['caption'] : ('Cover image for ' . $post->post_title) }}" src="{{ $post->thumbnail['attachment']['url'] }}" srcset="{{ $cover_image_srcset_string }}" alt="{{ $post->thumbnail['attachment']['alt'] || $post->thumbnail['attachment']['description'] || $post->thumbnail['attachment']['title'] }}" class="h-auto w-full rounded-xl" />
            </picture>
        @elseif (isset($post->image))
            <img src="{{ $post->image }}" class="h-auto w-full rounded-xl" />
        @else
            <hr aria-hidden="true">
        @endif
        {{-- <x-alerts.consent-required class="mx-safe-offset-6" /> --}}
        @if (isset($post->terms['kind']) && count($post->terms['kind']) > 0)
            @switch (array_keys($post->terms['kind'])[0])
                @case ('reply')
                    @if (isset($post_meta['mf2_in-reply-to']))
                        <div class="mx-safe-offset-6 my-4 p-4 rounded-xl bg-gr-violet-50/50 dark:bg-dm-violet-900/50 hover:bg-gr-violet-50 dark:hover:bg-gr-violet-900 text-gr-violet-900 dark:text-white border-2 border-gr-violet-500 dark:border-dm-violet-50 shadow-lg shadow-dm-violet-400/50 dark:shadow-dm-violet-200/50 hover:shadow-dm-violet-200/75 dark:hover:shadow-dm-violet-200/75 ease-out duration-200 will-change-auto hover:will-change-scroll" style="border-style: inset;">
                            <p>
                                <x-fluentui-comment-note-24-o class="h-8 w-8" />
                                This post is a reply to
                                <a href="{{ $post_meta['mf2_in-reply-to']['properties']['properties']['url'][0] }}" target="_blank" class="font-bold text-gr-violet-600 dark:text-gr-violet-100 active:text-gr-violet-800 dark:active:text-gr-violet-300 hover:text-gr-violet-800 dark:hover:text-gr-violet-300">
                                    {{ $post_meta['mf2_in-reply-to']['properties']['properties']['name'][0] }}<x-fluentui-window-new-16 class="inline-block h-4 w-4" />
                                </a>
                                @if (isset($post_meta['mf2_in-reply-to']['properties']['properties']['author']))
                                    <?php
                                        $author = $post_meta['mf2_in-reply-to']['properties']['properties']['author']['properties'];
                                    ?>
                                    by
                                    @if (isset($author['url']) && count($author['url']) > 0)
                                        <a href="{{ $author['url'][0] }}" target="_blank" class="font-bold text-gr-violet-600 dark:text-gr-violet-100 active:text-gr-violet-800 dark:active:text-gr-violet-300 hover:text-gr-violet-800 dark:hover:text-gr-violet-300">
                                            {{ $author['name'][0] }}<x-fluentui-window-new-16 class="inline-block h-4 w-4" />
                                        </a>
                                    @else
                                        <strong class="font-bold text-gr-violet-600 dark:text-gr-violet-100">
                                            {{ $author['name'][0] }}
                                        </strong>
                                    @endif
                                @endif
                            </i>
                        </div>
                    @endif
                    @break
                @default
            @endswitch
        @endif
        <main class="mx-safe-offset-6 text-gray-900 dark:text-gray-100">
            {!! $post->post_content ?? $post->content !!}
        </main>
        <x-share-buttons :title="$post->post_title" :description="$post->post_excerpt" :cover-image-url="$cover_image_og" class="my-2 px-safe-offset-6" />
        <script src="/js/smartquotes.js"></script>
        <script>smartquotes();</script>
    </article>
</x-app-layout>
