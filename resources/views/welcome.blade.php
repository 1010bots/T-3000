<?php
    use Illuminate\Support\Carbon;
    use Corcel\Model\Post;
    use Illuminate\Support\Facades\Cache;

    $posts = Cache::remember('home-latest-posts', 15 * 60, function () {
        return Post::type('post')->status('publish')->where('post_title', '!=', '')->orderBy('post_date_gmt', 'desc')->take(7)->get();
    });
?>
<x-app-layout :navbar="false">
    <style scoped>
        @import url('https://fonts.bunny.net/css2?family=Lora:ital,wght@1,600&display=swap');
        .text-sinetron {
            color: #ffffff;
            font-family: Lora, serif;
            font-style: italic;
            font-weight: 600;
            letter-spacing: -0.075em;
            text-shadow: 2px 0 #000, -2px 0 #000, 0 2px #000, 0 -2px #000, 1px 1px #000, -1px -1px #000, 1px -1px #000, -1px 1px #000;
        }
        .text-sinetron .caps {
            font-size: 1.5em;
        }
        .text-sinetron .not-caps {
            display: inline-block;
            letter-spacing: -0.05em;
            padding-bottom: 0.2em;
            vertical-align: bottom;
        }
    </style>
    <picture>
        <source srcset="/img/hero/main-desktop-dark.avif" media="(prefers-color-scheme:dark) and (min-width: 800px)" type="image/avif" />
        <source srcset="/img/hero/main-desktop-dark.heic" media="(prefers-color-scheme:dark) and (min-width: 800px)" type="image/heic" />
        <source srcset="/img/hero/main-desktop-dark.webp" media="(prefers-color-scheme:dark) and (min-width: 800px)" type="image/webp" />
        <source srcset="/img/hero/main-desktop-dark.jpg" media="(prefers-color-scheme:dark) and (min-width: 800px)" type="image/jpg" />
        <source srcset="/img/hero/main-desktop-dark.avif" media="(prefers-color-scheme:dark)" type="image/avif" />
        <source srcset="/img/hero/main-desktop-dark.heic" media="(prefers-color-scheme:dark)" type="image/heic" />
        <source srcset="/img/hero/main-desktop-dark.webp" media="(prefers-color-scheme:dark)" type="image/webp" />
        <source srcset="/img/hero/main-desktop-dark.jpg" media="(prefers-color-scheme:dark)" type="image/jpg" />
        <source srcset="/img/hero/main-desktop-light.avif" media="(prefers-color-scheme:light) and (min-width: 800px)" type="image/avif" />
        <source srcset="/img/hero/main-desktop-light.heic" media="(prefers-color-scheme:light) and (min-width: 800px)" type="image/heic" />
        <source srcset="/img/hero/main-desktop-light.webp" media="(prefers-color-scheme:light) and (min-width: 800px)" type="image/webp" />
        <source srcset="/img/hero/main-desktop-light.jpg" media="(prefers-color-scheme:light) and (min-width: 800px)" type="image/jpg" />
        <source srcset="/img/hero/main-mobile-light.avif" media="(prefers-color-scheme:light)" type="image/avif" />
        <source srcset="/img/hero/main-mobile-light.heic" media="(prefers-color-scheme:light)" type="image/heic" />
        <source srcset="/img/hero/main-mobile-light.webp" media="(prefers-color-scheme:light)" type="image/webp" />
        <source srcset="/img/hero/main-mobile-light.jpg" media="(prefers-color-scheme:light)" type="image/jpg" />
        <img alt="" src="/img/hero/main-desktop-light.jpg" height="1080" width="1920" class="fixed top-0 h-screen w-full bg-no-repeat object-cover" />
    </picture>
    <div class="absolute top-0 w-full">
        @livewire('navigation-menu')
        <div class="px-safe-offset-6 pt-8 bg-hero text-center text-white">
            <x-alerts.new-site class="relative z-index-5 backdrop-blur" />
            <p class="mx-auto my-4 font-serif text-2xl font-semibold italic">Multitalent Software, Hardware, Life, and Reality Developer</p>
            {{-- <div class="flex my-4 justify-center">
                <div class="w-64 font-serif text-center">
                    <span class="flex flex-wrap justify-center">
                        <x-fluentui-star-24 height="24" width="24" />
                        <x-fluentui-star-24 height="24" width="24" />
                        <x-fluentui-star-24 height="24" width="24" />
                        <x-fluentui-star-24 height="24" width="24" />
                        <x-fluentui-star-24 height="24" width="24" />
                    </span>
                    <span class="font-bold italic">“(#- )”</span>
                    <span class="italic">(#_ )</span>
                </div>
                <div class="w-64 font-serif text-center">
                    <span class="flex justify-center">
                        <x-fluentui-star-24 height="24" width="24" />
                        <x-fluentui-star-24 height="24" width="24" />
                        <x-fluentui-star-24 height="24" width="24" />
                        <x-fluentui-star-24 height="24" width="24" />
                        <x-fluentui-star-24 height="24" width="24" />
                    </span>
                    <span class="font-bold italic">“harga kualitas fungsi produk”</span>
                    <span class="italic">(Pengguna Bukalapak, 2018)</span>
                </div>
            </div> --}}
            <p class="my-4">/* Yeah, the binary, <strong class="inline-block font-bold">(&gt;_ )</strong> guy who was born on <span class="text-ocr">10<small class="text-xs">/</small>10<small class="text-xs">/20</small>01</span> */</p>
            <picture>
                <source srcset="/img/full-body/augmented-dark.avif 1x, /img/full-body/augmented-dark@2x.avif 2x" media="(prefers-color-scheme:dark)" type="image/avif" />
                <source srcset="/img/full-body/augmented-dark.heic 1x, /img/full-body/augmented-dark@2x.heic 2x" media="(prefers-color-scheme:dark)" type="image/heic" />
                <source srcset="/img/full-body/augmented-dark.webp 1x, /img/full-body/augmented-dark@2x.webp 2x" media="(prefers-color-scheme:dark)" type="image/webp" />
                <source srcset="/img/full-body/augmented-dark.png 1x, /img/full-body/augmented-dark@2x.png 2x" media="(prefers-color-scheme:dark)" type="image/png" />
                <source srcset="/img/full-body/augmented-light.avif 1x, /img/full-body/augmented-light@2x.avif 2x" media="(prefers-color-scheme:light)" type="image/avif" />
                <source srcset="/img/full-body/augmented-light.heic 1x, /img/full-body/augmented-light@2x.heic 2x" media="(prefers-color-scheme:light)" type="image/heic" />
                <source srcset="/img/full-body/augmented-light.webp 1x, /img/full-body/augmented-light@2x.webp 2x" media="(prefers-color-scheme:light)" type="image/webp" />
                <source srcset="/img/full-body/augmented-light.png 1x, /img/full-body/augmented-light@2x.png 2x" media="(prefers-color-scheme:light)" type="image/png" />
                <img alt="Reinhart the bot wannabe" src="/img/full-body/augmented-light.png" srcset="/img/full-body/augmented-light.png 1x, /img/full-body/augmented-light@2x.png 2x" height="718" width="269" class="inline w-64" />
            </picture>
            <h1 class="relative top-0 text-4xl md:text-5xl lg:text-6xl text-sinetron" style="margin-top: -300px;">
                <span class="inline-block">
                    <span class="caps">R</span><span class="not-caps">einhart</span>
                </span>
                <span class="inline-block">
                    <span class="caps">P</span><span class="not-caps">reviano</span>
                </span>
                <span class="inline-block">
                    <span class="caps">K</span><span class="not-caps">oentjoro.,</span>
                </span>
                <span class="inline-block">
                    ¾
                </span>
                <span class="inline-block">
                    <span class="caps">S</span><span class="not-caps">.</span>
                </span>
                <span class="inline-block">
                    <span class="caps">K</span><span class="not-caps">om.</span>
                </span>
            </h1>
        </div>
        <div class="max-w-2xl mb-8 mt-4 mx-auto px-safe-offset-6 text-white">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                <a href="/about" class="flex gap-1 justify-center items-center z-index-5 backdrop-blur p-4 rounded-xl bg-gr-cyan-50/50 dark:bg-dm-cyan-900/50 hover:bg-gr-cyan-50/75 dark:hover:bg-gr-cyan-900/75 text-xl font-semibold text-center text-gr-cyan-900 dark:text-white border-2 border-gr-cyan-500 dark:border-dm-cyan-50 shadow-lg shadow-dm-cyan-500/50 dark:shadow-dm-cyan-200/50 hover:shadow-dm-cyan-200 dark:hover:shadow-dm-cyan-200 ease-out duration-200 will-change-auto hover:will-change-scroll {{ $class ?? '' }}" style="border-style: inset;">
                    <span class="min-w-fit">
                        <x-fluentui-person-24-o class="inline-block h-6 w-6" />
                    </span>
                    About Me (&gt;_ )
                </a>
                <a href="/bots" class="flex gap-1 justify-center items-center z-index-5 backdrop-blur p-4 rounded-xl bg-gr-cyan-50/50 dark:bg-dm-cyan-900/50 hover:bg-gr-cyan-50/75 dark:hover:bg-gr-cyan-900/75 text-xl font-semibold text-center text-gr-cyan-900 dark:text-white border-2 border-gr-cyan-500 dark:border-dm-cyan-50 shadow-lg shadow-dm-cyan-500/50 dark:shadow-dm-cyan-200/50 hover:shadow-dm-cyan-200 dark:hover:shadow-dm-cyan-200 ease-out duration-200 will-change-auto hover:will-change-scroll {{ $class ?? '' }}" style="border-style: inset;">
                    <span class="min-w-fit">
                        <x-fluentui-bot-24-o class="inline-block h-6 w-6" />
                    </span>
                    Me & My Bots
                </a>
                <a href="/portfolio" class="flex gap-1 justify-center items-center z-index-5 backdrop-blur p-4 rounded-xl bg-gr-cyan-50/50 dark:bg-dm-cyan-900/50 hover:bg-gr-cyan-50/75 dark:hover:bg-gr-cyan-900/75 text-xl font-semibold text-center text-gr-cyan-900 dark:text-white border-2 border-gr-cyan-500 dark:border-dm-cyan-50 shadow-lg shadow-dm-cyan-500/50 dark:shadow-dm-cyan-200/50 hover:shadow-dm-cyan-200 dark:hover:shadow-dm-cyan-200 ease-out duration-200 will-change-auto hover:will-change-scroll {{ $class ?? '' }}" style="border-style: inset;">
                    <span class="min-w-fit">
                        <x-fluentui-book-arrow-clockwise-24-o class="inline-block h-6 w-6" />
                    </span>
                    My Portfolio
                </a>
                <a href="/apps" class="flex gap-1 justify-center items-center z-index-5 backdrop-blur p-4 rounded-xl bg-gr-cyan-50/50 dark:bg-dm-cyan-900/50 hover:bg-gr-cyan-50/75 dark:hover:bg-gr-cyan-900/75 text-xl font-semibold text-center text-gr-cyan-900 dark:text-white border-2 border-gr-cyan-500 dark:border-dm-cyan-50 shadow-lg shadow-dm-cyan-500/50 dark:shadow-dm-cyan-200/50 hover:shadow-dm-cyan-200 dark:hover:shadow-dm-cyan-200 ease-out duration-200 will-change-auto hover:will-change-scroll {{ $class ?? '' }}" style="border-style: inset;">
                    <span class="min-w-fit">
                        <x-fluentui-apps-24-o class="inline-block h-6 w-6" />
                    </span>
                    Our Apps and Tools
                </a>
                <a href="/blog" class="flex gap-1 justify-center items-center z-index-5 backdrop-blur p-4 rounded-xl bg-gr-cyan-50/50 dark:bg-dm-cyan-900/50 hover:bg-gr-cyan-50/75 dark:hover:bg-gr-cyan-900/75 text-xl font-semibold text-center text-gr-cyan-900 dark:text-white border-2 border-gr-cyan-500 dark:border-dm-cyan-50 shadow-lg shadow-dm-cyan-500/50 dark:shadow-dm-cyan-200/50 hover:shadow-dm-cyan-200 dark:hover:shadow-dm-cyan-200 ease-out duration-200 will-change-auto hover:will-change-scroll {{ $class ?? '' }}" style="border-style: inset;">
                    <span class="min-w-fit">
                        <x-fluentui-news-24-o class="inline-block h-6 w-6" />
                    </span>
                    Our Blogs and News
                </a>
                <a href="/contact" class="flex gap-1 justify-center items-center z-index-5 backdrop-blur p-4 rounded-xl bg-gr-cyan-50/50 dark:bg-dm-cyan-900/50 hover:bg-gr-cyan-50/75 dark:hover:bg-gr-cyan-900/75 text-xl font-semibold text-center text-gr-cyan-900 dark:text-white border-2 border-gr-cyan-500 dark:border-dm-cyan-50 shadow-lg shadow-dm-cyan-500/50 dark:shadow-dm-cyan-200/50 hover:shadow-dm-cyan-200 dark:hover:shadow-dm-cyan-200 ease-out duration-200 will-change-auto hover:will-change-scroll {{ $class ?? '' }}" style="border-style: inset;">
                    <span class="min-w-fit">
                        <x-fluentui-chat-24-o class="inline-block h-6 w-6" />
                    </span>
                    Contact Us
                </a>
            </div>
        </div>
        <div class="max-w-2xl mb-8 mt-4 mx-auto px-safe-offset-6 text-white">
            <h2 class="font-serif font-bold text-3xl md:text-2xl">Latest Posts</h2>
            <hr class="my-2 border-white" />
            @foreach ($posts as $post)
                <?php
                    $post_date = new Carbon($post->post_date);
                ?>
                <a class="flex gap-1 text-lg" href="/blog/{{ $post_date->format('Y/m/d') }}/{{ $post->post_name }}">
                    <div class="m">
                        @switch (array_keys($post->terms['kind'])[0])
                            @case ('article')
                                <x-fluentui-news-24-o class="h-6 w-6" />
                                @break
                            @case ('like')
                                <x-fluentui-thumb-like-24-o class="h-6 w-6" />
                                @break
                            @case ('note')
                                <x-fluentui-note-add-24-o class="h-6 w-6" />
                                @break
                            @case ('reply')
                                <x-fluentui-comment-note-24-o class="h-6 w-6" />
                                @break
                            @case ('repost')
                                <x-fluentui-arrow-repeat-all-24-o class="h-6 w-6" />
                                @break
                            @case ('rsvp')
                                <x-fluentui-calendar-clock-24-o class="h-6 w-6" />
                                @break
                            @case ('video')
                                <x-fluentui-video-clip-24-o class="h-6 w-6" />
                                @break
                            @default
                                <x-fluentui-more-horizontal-24-o class="h-6 w-6" />
                                @break
                        @endswitch
                    </div>
                    <b class="flex-grow">{{ $post['title'] }}</b>
                    <p class="min-w-fit text-end">{{ $post_date->format('d M') }}</p>
                </a>
            @endforeach
        </div>
        <div class="max-w-2xl mb-8 mt-4 mx-auto px-safe-offset-6 text-white">
            <h2 class="font-serif font-bold text-3xl md:text-2xl">($_ ) Community Resources</h2>
            <hr class="my-2 border-white" />
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                <a href="https://threads.net/reinhart1010" class="flex gap-1 justify-center items-center z-index-5 backdrop-blur p-4 rounded-xl bg-gr-fuchsia-50/50 dark:bg-dm-fuchsia-900/50 hover:bg-gr-fuchsia-50/75 dark:hover:bg-gr-fuchsia-900/75 text-xl font-semibold text-center text-gr-fuchsia-900 dark:text-white border-2 border-gr-fuchsia-500 dark:border-dm-fuchsia-50 shadow-lg shadow-dm-fuchsia-500/50 dark:shadow-dm-fuchsia-200/50 hover:shadow-dm-fuchsia-200 dark:hover:shadow-dm-fuchsia-200 ease-out duration-200 will-change-auto hover:will-change-scroll {{ $class ?? '' }}" style="border-style: inset;">
                    <span class="min-w-fit">
                        <x-fluentui-heart-24-o class="inline-block h-6 w-6" />
                    </span>
                    @reinhart1010 is now on Threads!
                </a>
                <a href="https://maps.reinhart1010.id" class="flex gap-1 justify-center items-center z-index-5 backdrop-blur p-4 rounded-xl bg-gr-fuchsia-50/50 dark:bg-dm-fuchsia-900/50 hover:bg-gr-fuchsia-50/75 dark:hover:bg-gr-fuchsia-900/75 text-xl font-semibold text-center text-gr-fuchsia-900 dark:text-white border-2 border-gr-fuchsia-500 dark:border-dm-fuchsia-50 shadow-lg shadow-dm-fuchsia-500/50 dark:shadow-dm-fuchsia-200/50 hover:shadow-dm-fuchsia-200 dark:hover:shadow-dm-fuchsia-200 ease-out duration-200 will-change-auto hover:will-change-scroll {{ $class ?? '' }}" style="border-style: inset;">
                    <span class="min-w-fit">
                        <x-fluentui-globe-location-24-o class="inline-block h-6 w-6" />
                    </span>
                    Convert and share map links across 15+ map sites and apps
                </a>
                <a href="https://nix.reinhart1010.id" class="flex gap-1 justify-center items-center z-index-5 backdrop-blur p-4 rounded-xl bg-gr-fuchsia-50/50 dark:bg-dm-fuchsia-900/50 hover:bg-gr-fuchsia-50/75 dark:hover:bg-gr-fuchsia-900/75 text-xl font-semibold text-center text-gr-fuchsia-900 dark:text-white border-2 border-gr-fuchsia-500 dark:border-dm-fuchsia-50 shadow-lg shadow-dm-fuchsia-500/50 dark:shadow-dm-fuchsia-200/50 hover:shadow-dm-fuchsia-200 dark:hover:shadow-dm-fuchsia-200 ease-out duration-200 will-change-auto hover:will-change-scroll {{ $class ?? '' }}" style="border-style: inset;">
                    <span class="min-w-fit">
                        <x-fluentui-document-question-mark-24-o class="inline-block h-6 w-6" />
                    </span>
                    Get help when working with command-line, the ($_ ) way
                </a>
                <a href="https://binusmayadown.reinhart1010.id" class="flex gap-1 justify-center items-center z-index-5 backdrop-blur p-4 rounded-xl bg-gr-fuchsia-50/50 dark:bg-dm-fuchsia-900/50 hover:bg-gr-fuchsia-50/75 dark:hover:bg-gr-fuchsia-900/75 text-xl font-semibold text-center text-gr-fuchsia-900 dark:text-white border-2 border-gr-fuchsia-500 dark:border-dm-fuchsia-50 shadow-lg shadow-dm-fuchsia-500/50 dark:shadow-dm-fuchsia-200/50 hover:shadow-dm-fuchsia-200 dark:hover:shadow-dm-fuchsia-200 ease-out duration-200 will-change-auto hover:will-change-scroll {{ $class ?? '' }}" style="border-style: inset;">
                    <span class="min-w-fit">
                        <x-fluentui-chart-multiple-24-o class="inline-block h-6 w-6" />
                    </span>
                    World Class University aja masih bisa down, kalau kamu?
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
