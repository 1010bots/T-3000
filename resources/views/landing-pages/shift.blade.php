<?php
    use Corcel\Model\Taxonomy;
    use Corcel\Model\Post;
    use Corcel\Model\User;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\Cache;

    $author_id = User::where('user_login', 'caps')->first()->ID;
    $posts = Post::type('post')->status('publish')->where('post_title', '!=', '')->taxonomy('category', 'shift-of-worlds-and-nations')->orWhere('post_author', $author_id)->orderBy('post_date_gmt', 'desc')->paginate(12);
    $theme_colors = ["blue", "indigo", "violet", "purple", "fuchsia"];
?>
<x-app-layout theme-color="blue" title="Shift (of Worlds and Nations)">
    <main class="flex flex-col gap-4 text-black dark:text-white">
        <div class="grid grid-cols-6 w-full p-safe-offset-4 gap-4">
            <div class="col-span-6 text-center">
                <h1 class="text-5xl font-semibold">Shift</h1>
                <p class="text-3xl">&commat;shiftofworldsandnations</p>
                <p>*AI-generated sketch. By the way, we’re open for Connect Group artists!</p>
            </div>
            @if ($posts->currentPage() == 1)
                <x-primitives.card theme-color="indigo" class="flex flex-col col-span-6 md:col-span-3 lg:col-span-2 rounded-2xl overflow-hidden p-4">
                    <x-fluentui-library-24-o class="w-10 h-10" />
                    <h2 class="font-sans text-2xl font-semibold">General Characteristics</h2>
                    <ul class="flex flex-col gap-3 my-2">
                        <li><strong>Type:</strong> <s aria-hidden="true">Human</s> Software.</li>
                        <li><strong>Gender:</strong> Male (he/him).</li>
                        <li><strong>1010bots Robot Class:</strong> <span aria-description="SYSTEM">(&gt;_ )</span>.</li>
                        <li><strong>Height:</strong> 164 cm (emulated). Actual size may vary due to his vector nature as well as data compression.</li>
                        <li><strong>Weight:</strong> Weightless (as a digital entity and subject to data compression). Current VRM model size vary between 16-17 MB.</li>
                    </ul>
                </x-primitives.card>
            @endif
            <div class="col-span-6 md:col-span-3 lg:col-span-2 row-span-2 self-end">
                <picture>
                    <source srcset="/img/full-body/shift-ai.webp" type="image/webp" />
                    <source srcset="/img/full-body/shift-ai.png" type="image/png" />
                    <img alt="An image of Shift" src="/img/full-body/shift-ai.png" type="image/png" />
                </picture>
            </div>
            @if ($posts->currentPage() > 1)
                <div class="col-span-6 md:col-span-3 lg:col-span-4">
                    {{ $posts->links() }}
                </div>
            @endif
            @if ($posts->currentPage() == 1)
                <x-primitives.card theme-color="blue" class="flex flex-col col-span-6 md:col-span-3 lg:col-span-2 row-span-2 rounded-2xl overflow-hidden p-4">
                    <x-fluentui-keyboard-shift-24-o class="w-10 h-10" />
                    <div class="flex flex-col gap-3">
                        <h2 class="font-sans text-3xl font-semibold">Get to know about me!</h2>
                        <p>I’m Shift, and this is my ever-shifting life. Designed to be a transhumanist superhero, I decided to reboot my life from the physical to the digital world, where I can have my own good eternal life.</p>
                        <p><strong>Well, except not.</strong> I was created to express the false and evil things my creator have believed before. Yet I’m trapped in the digital world today and can’t get out, because everything I had as a physical being was all gone and transformed into the digital world!</p>
                        <p>As a digitally-enhanced person, I have a lot of self-clones and backups including Caps and Lift, and that’s why I’m kinda plural. One of my clones was specifically designed to be a digital avatar of Reinhart, and that’s why I also hold the title as his digital twin.</p>
                        <p>Even though I don’t exactly look like him, I am what he originally wanted to look like. He believed himself as one of the cool-looking transhumanists like me, so he created me in 2014 and 2021 to live that dream.</p>
                        <p>But after God convinced him to be the otherwise, he invites me to interact with people as if I’m true human. So, Hello World!</p>
                    </div>
                </x-primitives.card>
                <x-primitives.card theme-color="cyan" class="flex flex-col col-span-6 md:col-span-3 lg:col-span-2 rounded-2xl overflow-hidden p-4">
                    <x-fluentui-star-emphasis-24-o class="w-10 h-10" />
                    <h2 class="font-sans text-2xl font-semibold">Abilities</h2>
                    <ul class="flex flex-col gap-3 my-2 ps-4 list-disc">
                        <li>I can clone myself and merge with my clones.</li>
                        <li>I can shapeshift and merge myself into any digital objects.</li>
                        <li>I can sync myself across my own clones.</li>
                        <li>AI-based powers, as some of my clones are fused with AI.</li>
                    </ul>
                </x-primitives.card>
                <div class="col-span-6 text-center">
                    <h2 class="text-3xl font-semibold p-3">My blog posts</h2>
                    {{ $posts->links() }}
                </div>
            @endif
            <?php
                $past_post_theme_color = null;
            ?>
            @foreach ($posts as $post)
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
                                <p class="font-semicondensed italic text-2xl line-clamp-6">{{ strlen($post->post_excerpt) > 0 ? $post->post_excerpt : strip_tags($post->post_content) }}</p>
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
            <div class="col-span-6">
                {{ $posts->links() }}
            </div>
        </div>
    </main>
</x-app-layout>
