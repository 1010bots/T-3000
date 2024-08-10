<?php
    use Illuminate\Support\Carbon;
    $created_at = new Carbon($post->post_date);
    $created_at_gmt = new Carbon($post->post_date_gmt);
    $updated_at = new Carbon($post->post_modified);
    $updated_at_gmt = new Carbon($post->post_modified_gmt);
    $canonical = null;
    $rich_result_schema = [];
    if ($post->post_type == 'post') {
        $canonical = env('APP_URL', 'http://127.0.0.1') . '/blog/' . $created_at->format('Y/m/d') . '/' . $post->post_name;
        $rich_result_schema = [
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => [
                [
                    "@type" => "ListItem",
                    "position" => 1,
                    "name" => "Blogs",
                    "item" => env('APP_URL', 'http://127.0.0.1') . '/blog/'
                ],
                [
                    "@type" => "ListItem",
                    "position" => 2,
                    "name" => $post->post_title,
                    "item" => $canonical,
                ],
            ],
        ];
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

    // Avatar of the poster
    $author_avatar = $author->avatar;
    if (isset($author->meta) && isset($author->meta->simple_local_avatar)) {
        $parsed_json = unserialize($author->meta->simple_local_avatar);
        if (isset($parsed_json["192"])) {
            $author_avatar = $parsed_json["192"];
        } else if (isset($parsed_json["128"])) {
            $author_avatar = $parsed_json["128"];
        } else if (isset($parsed_json["96"])) {
            $author_avatar = $parsed_json["96"];
        }
    }

?>
<x-app-layout :canonical="$canonical" :description="$post->post_excerpt" :json-ld="$rich_result_schema" :keywords="$post->keywords_str" :oembed="true" :og-article-published-time="$created_at->toIso8601String()" :og-article-modified-time="$updated_at->toIso8601String()" :og-image="$cover_image_og" og-type="article" :title="$post->post_title" theme-color="violet">
    <article class="reinhart1010-article | h-entry | m-auto py-6 max-w-2xl">
        <div class="my-4 px-safe-offset-6 text-black dark:text-white">
            <p class="m-0 text-xl"><time class="dt-published" datetime="{{ $created_at->format(DateTime::ATOM) }}" title="{{ $created_at->format(DateTime::ATOM) }}">{{ $created_at->format('j F Y') }}</time>
            @if ($created_at != $updated_at)
                &bull; (Updated <time class="dt-updated" datetime="{{ $updated_at->format(DateTime::ATOM) }}" title="{{ $updated_at->format(DateTime::ATOM) }}">{{ $updated_at->format('j F Y') }}</time>)
            @endif
            </p>
            <h1 class="p-name | font-sans-display text-3xl text-bold font-semibold break-words">{{ $post->post_title }}</h1>
            <div class="p-author h-card | flex flex-row my-2 gap-2 items-center">
                <img class="u-photo | w-16 h-16 rounded-full" src="{{ $author_avatar }}" alt="{{ $author->display_name }}'s profile picture" />
                <div class="flex flex-col gap-1">
                    <p class="m-0 text-xl"><span class="p-name | font-semibold">{{ $author->display_name }}</span> (<span class="p-nickname">&#64;{{ $author->login }}</span>)</p>
                    @if (isset($taxonomies) && (count($taxonomies->categories) + count($taxonomies->tags) > 0))
                        <p class="flex flex-row flex-wrap gap-1 items-center text-sm">
                            <span>Published on</span>
                            @foreach ($taxonomies->categories as $item)
                                <a class="p-category | px-2 py-1 text-center text-black dark:text-white bg-rc-violet-50 dark:bg-dm-violet-700 border-0 py-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" rel="category" href="/blog/category/{{ $item->term->slug }}">{{ $item->term->name }}</a>
                            @endforeach
                            @foreach ($taxonomies->tags as $item)
                                <a class="p-category | px-2 py-1 text-center text-black dark:text-white bg-rc-fuchsia-50 dark:bg-dm-fuchsia-700 border-0 py-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-fuchsia-200 dark:active:ring-dm-fuchsia-200 hover:ring-dm-fuchsia-200 dark:hover:ring-dm-fuchsia-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" rel="tag" href="/blog/tag/{{ $item->term->slug }}">#{{ $item->term->slug }}</a>
                            @endforeach
                        </p>
                    @endif
                </div>
            </div>
        </div>
        @if ($post->post_type == 'post' && strlen($post->post_content ?? $post->content) >= 1500)
            <x-share-buttons :title="$post->post_title" :description="$post->post_excerpt" :cover-image-url="$cover_image_og" class="my-2 px-safe-offset-6" />
        @endif
        @if (isset($post->thumbnail))
            <?php
                $cover_image_srcset_string = '';
                ksort($cover_image_srcset, SORT_NUMERIC);
                foreach ($cover_image_srcset as $size => $src) {
                    $cover_image_srcset_string .= $src . ' ' . $size . 'w ';
                }
            ?>
            <picture>
                <img class="u-featured | h-auto w-full rounded-xl"  alt="{{ strlen($post->thumbnail['attachment']['caption']) > 0 ? $post->thumbnail['attachment']['caption'] : ('Cover image for ' . $post->post_title) }}" src="{{ $post->thumbnail['attachment']['url'] }}" srcset="{{ $cover_image_srcset_string }}" alt="{{ $post->thumbnail['attachment']['alt'] || $post->thumbnail['attachment']['description'] || $post->thumbnail['attachment']['title'] }}" />
            </picture>
        @elseif (isset($post->image))
            <img class="u-featured | h-auto w-full rounded-xl" src="{{ $post->image }}" />
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
        <main class="e-content | mx-safe-offset-6 text-gray-900 dark:text-gray-100">
            {!! $post->post_content ?? $post->content !!}
        </main>
        <x-share-buttons :title="$post->post_title" :description="$post->post_excerpt" :cover-image-url="$cover_image_og" class="my-2 px-safe-offset-6" />
        <script src="/js/smartquotes.js"></script>
        <script>smartquotes();</script>
    </article>
</x-app-layout>
