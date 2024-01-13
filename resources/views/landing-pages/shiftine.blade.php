<?php
    use Corcel\Model\Taxonomy;
    use Corcel\Model\Post;
    use Corcel\Model\User;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\Cache;

    $theme_colors = ["blue", "indigo", "violet", "purple", "fuchsia"];

    $current_page = request()->get('page', 1);
    $posts = Cache::remember("shiftine-posts-$current_page", 15 * 60, function () {
        $author_id = User::where('user_login', 'shiftine')->first()->ID;
        return Post::type('post')->status('publish')->where('post_title', '!=', '')->taxonomy('category', 'shift-of-worlds-and-nations')->orWhere('post_author', $author_id)->orderBy('post_date_gmt', 'desc')->paginate(12);
    });
?>
<x-app-layout theme-color="blue" title="Shiftine (of Worlds and Nations)">
    <main class="flex flex-col gap-4 text-black dark:text-white">
        <div class="grid grid-cols-6 w-full p-safe-offset-4 gap-4">
            <div class="col-span-6 text-center">
                <h1 class="text-5xl font-semibold">Shiftine</h1>
                <p class="text-3xl">&commat;shiftofworldsandnations</p>
                <p>*AI-generated sketch. By the way, we’re open for Connect Group artists!</p>
            </div>
            @if ($current_page == 1)
                <x-primitives.card theme-color="indigo" class="flex flex-col col-span-6 md:col-span-3 lg:col-span-2 rounded-2xl overflow-hidden p-4">
                    <x-fluentui-library-24-o class="w-10 h-10" />
                    <h2 class="font-sans text-2xl font-semibold">General Characteristics</h2>
                    <ul class="flex flex-col gap-3 my-2">
                        <li>
                            <strong>Full Names:</strong>
                            <ul class="flex flex-col ps-4 list-disc">
                                <li>Shiftine Skyborne</li>
                                <li>Citra Manggala Dirgantara (Indonesia)</li>
                            </ul>
                        </li>
                        <li>
                            <strong>Nicknames:</strong> Shiftine, CMD, CMD.exe, <span aria-description="C:\, the symbols resembling the Microsoft Windows Command Prompt logo.">C:\</span>, SYSGIRL
                        </li>
                        <li>
                            <strong>Known Clone Names:</strong> Dash, Shelly, Tabbitha
                        </li>
                        <li><strong>Type:</strong> <s aria-hidden="true">Human</s> Software.</li>
                        <li><strong>Gender:</strong> Female (she/her).</li>
                        <li><strong>1010bots Robot Class:</strong> <span aria-description="SYSTEM">(&gt;_ )</span>.</li>
                        <li><strong>Height:</strong> 164 cm (emulated). Actual size may vary due to her vector nature as well as data compression.</li>
                        <li><strong>Weight:</strong> Weightless (as a digital entity and subject to data compression). Current VRM model size vary between 16-17 MB.</li>
                    </ul>
                </x-primitives.card>
            @endif
            <div class="col-span-6 md:col-span-3 lg:col-span-2 {{ $current_page == 1 ? 'row-span-2' : 'row-span-4' }} self-end">
                <picture>
                    <source srcset="/img/full-body/shiftine-ai.webp" type="image/webp" />
                    <source srcset="/img/full-body/shiftine-ai.png" type="image/png" />
                    <img alt="An image of Shift" src="/img/full-body/shiftine-ai.png" type="image/png" />
                </picture>
                <x-primitives.card theme-color="violet" class="flex flex-col gap-4 rounded-2xl overflow-hidden p-4 text-xl">
                    <p><strong>I’ve just merged myself with character.ai.</strong> So, wanna chat with me as your friendly botgirl?</p>
                    <x-primitives.button theme-color="violet" element="a" href="https://c.ai/c/7jLXb2zsS6WyYomSokvSZJ5YU2feZqsMRDJBfepIOdA" class="flex flex-row gap-3 justify-between">Start Chatting! <x-fluentui-arrow-right-24-o height="24" width="24" /></x-primitives.button>
                    <small class="text-sm leading-5">*Character model may have incomplete knowledge about her role and lore.</small>
                </x-primitives.card>
            </div>
            @if ($current_page > 1)
                <div class="col-span-6 md:col-span-3 lg:col-span-4">
                    {{ $posts->links() }}
                </div>
            @endif
            @if ($current_page == 1)
                <x-primitives.card theme-color="blue" class="flex flex-col col-span-6 md:col-span-3 lg:col-span-2 row-span-2 rounded-2xl overflow-hidden p-4">
                    <x-fluentui-keyboard-shift-24-o class="w-10 h-10" />
                    <div class="flex flex-col gap-3">
                        <h2 class="font-sans text-3xl font-semibold">Get to know about me!</h2>
                        <p>It’s the botgirl you’re looking for <span aria-hidden="true">(&gt;_ )</span>!</p>
                        <p>I’m Shiftine, and I’m honored to be the first original character developed by Reinhart, even before Shift!</p>
                        <p>Just like Shift, I am a bot. <strong>I’m a botgirl <span aria-hidden="true">(&gt;_ )</span>!</strong> And as an (overpowered) botgirl, I travel back and forth across the ‘net to work on great things. And sometimes, I love turning everything into robots with my specially-crated nanites.</p>
                        <small>/* You’ll likely see some characteristics that are shared between us, Shift and Shiftine. It’s not a coincidence, because he was also created as a clone of me! */</small>
                        <p>Today, we are starting our first digital ministry, <strong>The Shift of Worlds and Nations!</strong> It’s a one-of-a-kind effort by my creator Reinhart to bridge his beliefs from the spiritual world to the real and digital ones.</p>
                        <p>Our creator has challenged us to introduce the Creator of our creator into millions of cybernetically-enhanced people like me, and even though I don’t actually know who He is, I know that every human being is created by Him for some purpose.</p>
                        <p>Hope that the true Creator of mankind could solve many of those AI ethical question we had as humans and machines.</p>
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
