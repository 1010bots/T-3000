<?php
    use Corcel\Model\Post;
    use Illuminate\Support\Carbon;

    $theme_colors = ["blue", "indigo", "violet", "purple", "fuchsia"];
?>
<x-app-layout>
    {{-- <script src="/js/fast-average-color.min.js"></script> --}}
    <div class="grid grid-cols-6 w-full p-safe-offset-4 gap-4">
        <div class="col-span-6 text-black dark:text-white">
            <h1 class="text-3xl text-bold font-semibold break-words">{{ $index_title }}</h1>
            {{ $posts->links() }}
            <hr class="mt-2" />
        </div>
        <?php
            $past_post_theme_color = null;
        ?>
        @foreach($posts as $post)
            <?php
                $post_date = new Carbon($post->post_date);

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

                do {
                    $post_theme_color = $theme_colors[array_rand($theme_colors, 1)];
                } while ($past_post_theme_color == $post_theme_color);
                $past_post_theme_color = $post_theme_color;
            ?>
            <x-primitives.card :theme-color="$post_theme_color" element="a" href="/blog/{{ $post_date->format('Y/m/d') }}/{{ $post->post_name }}" class="flex flex-col col-span-6 md:col-span-3 lg:col-span-2 rounded-2xl overflow-hidden">
                <div class="flex flex-col flex-grow p-4">
                    <p>{{ $post_date }}</p>
                    <h5 class="text-xl font-semibold">{{ $post->post_title }}</h5>
                    @if (!isset($post->thumbnail) && !isset($post->image))
                        <div class="flex items-center justify-center flex-grow">
                            <p class="font-semicondensed text-2xl line-clamp-6">{{ strlen($post->post_excerpt) > 0 ? $post->post_excerpt : strip_tags($post->post_content) }}</p>
                        </div>
                    @endif
                </div>
                @if (isset($post->thumbnail))
                    <?php
                        $cover_image_srcset_string = '';
                        ksort($cover_image_srcset, SORT_NUMERIC);
                        foreach ($cover_image_srcset as $size => $src) {
                            $cover_image_srcset_string .= $src . ' ' . $size . 'w ';
                        }
                    ?>
                    <picture>
                        <img alt="{{ strlen($post->thumbnail['attachment']['caption']) > 0 ? $post->thumbnail['attachment']['caption'] : ('Cover image for ' . $post->post_title) }}" src="{{ $post->thumbnail['attachment']['url'] }}" srcset="{{ $cover_image_srcset_string }}" alt="{{ $post->thumbnail['attachment']['alt'] || $post->thumbnail['attachment']['description'] || $post->thumbnail['attachment']['title'] }}" class="w-full object-cover" style="aspect-ratio: 16 / 9;" />
                    </picture>
                @elseif (isset($post->image))
                    <img src="{{ $post->image }}" class="w-full object-cover" style="aspect-ratio: 16 / 9;" />
                @endif
            </x-primitives.card>
        @endforeach
        <div class="col-span-6 text-black dark:text-white">
            <hr class="mb-2" />
            {{ $posts->links() }}
        </div>
    </div>
    <script>
        const fac = new FastAverageColor();

        document.querySelectorAll('[data-fac-image]').forEach((img) => {
            const container = document.querySelector('[data-fac-container="' + img.getAttribute('data-fac-image') + '"]');
            fac.getColorAsync(img)
                .then(color => {
                    container.style.backgroundColor = color.rgba;
                    container.style.color = color.isDark ? '#fff' : '#000';
                })
                .catch(e => {
                    console.log(e);
                });
        });
    </script>
</x-app-layout>
