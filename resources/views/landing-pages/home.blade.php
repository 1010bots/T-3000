<?php
    use App\Models\Product;
    use App\Models\ProductPublisher;
    use App\Models\Publisher;
    use Corcel\Model\Post;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\Cache;

    $theme_colors = ['violet', 'fuchsia', 'orange'];

    $posts = Cache::remember('home-latest-posts', 15 * 60, function () {
        return Post::type('post')->status('publish')->where('post_title', '!=', '')->orderBy('post_date_gmt', 'desc')->take(5)->get();
    });
    $publisher = Publisher::where('slug', env('OWNER_SLUG', 'admin'))->first();
    $app_ids = [];
    foreach (ProductPublisher::where('publisher_id', $publisher->id)->get() as $pp) {
        array_push($app_ids, $pp->product_id);
    }
    $apps = Product::whereIn('id', $app_ids)->where('status', 'PUBLISHED')->orderBy('name', 'asc')->get();

    $featured_apps = [];
    $retired_apps = [];

    foreach ($apps as $app) {
        $app->_compiled = new stdClass();
        $app->_compiled->image_type = null;

        /* Background */
        $app->_compiled->image_src = null;
        $app->_compiled->image_srcset = null;
        $app->_compiled->image_src_dark = null;
        $app->_compiled->image_srcset_dark = null;

        /* Foreground */
        $app->_compiled->image_src_fg = null;
        $app->_compiled->image_srcset_fg = null;
        $app->_compiled->image_src_fg_dark = null;
        $app->_compiled->image_srcset_fg_dark = null;

        if ($app->images && $app->images_schema_version == 1) {
            $app->_compiled->image_data = $image_data = $app->images;
            $app->_compiled->image_type = $image_type = $image_data['preferred_type'];

            $app->_compiled->image_src = $image_data[$image_type]['src'];
            $app->_compiled->image_srcset = $image_data[$image_type]['srcset'] ?? null;
            $app->_compiled->image_src_dark = $image_data[$image_type]['srcDark'] ?? null;
            $app->_compiled->image_srcset_dark = $image_data[$image_type]['srcsetDark'] ?? null;

            $app->_compiled->image_src_fg = $image_data[$image_type]['srcFg'] ?? null;
            $app->_compiled->image_srcset_fg = $image_data[$image_type]['srcsetFg'] ?? null;
            $app->_compiled->image_src_fg_dark = $image_data[$image_type]['srcFgDark'] ?? null;
            $app->_compiled->image_srcset_fg_dark = $image_data[$image_type]['srcsetFgDark'] ?? null;
        }

        $app->_compiled->types = [];
        foreach (explode(' ', $app->type) as $type) {
            $app->_compiled->types[$type] = true;
        }

        if ($app->_compiled->types['retired'] ?? false) {
            array_push($retired_apps, $app);
        } else {
            array_push($featured_apps, $app);
        }
    }

    $recommended_sites = [
        [
            "name" => "Bumi Laras Selatan",
            "description" => "Our new brand typeface",
            "site" => "/bumi-laras-selatan",
        ],
        [
            "name" => "Jocelyne's Website",
            "description" => "Under construction",
            "site" => "https://jow.my.id",
        ],
        [
            "name" => "Kenangan.com",
            "description" => "Kirim dan bagikan hadiah tanpa ribet!",
            "site" => "https://kenangan.com/?utm_source=reinhart1010",
        ],
    ];

    $community_resources = [
        [
            "name" => "Formulir Doa Pelepasan",
            "description" => "Dapat diisi secara elektronik",
            "site" => "/form-doa-pelepasan",
        ],
        [
            "name" => "Our PGP Keys",
            "description" => "pgp.reinhart1010.id",
            "site" => "https://pgp.reinhart1010.id/",
        ],
        [
            "name" => "Our Standard Color Palette",
            "description" => "s.reinhart1010.id/colors",
            "site" => "https://s.reinhart1010.id/colors",
        ],
        [
            "name" => "Shift's Digital Garden",
            "description" => "shift.reinhart1010.id",
            "site" => "https://shift.reinhart1010.id/",
        ],
    ];
?>
<x-app-layout :theme-color="$theme_colors[0]" >
    <main class="flex flex-col gap-4 text-black dark:text-white">
        <div class="grid grid-cols-6 w-full p-safe-offset-4 gap-4">
            <x-primitives.card :theme-color="$theme_colors[0]" class="flex flex-col col-span-6 md:col-span-3 lg:col-span-4 row-span-2 rounded-2xl overflow-hidden">
                <!-- Not definitely us, but Shift and Shiftine, the OG bot and botgirl created by Reinhart. My sister suggested placing an AI-generated picture here instead of real-life photos, so here it is (>_ )! -->
                <picture>
                    {{-- <source srcset="/img/hero/new-card.jxl" type="image/jxl" />
                    <source srcset="/img/hero/new-card.avif" type="image/avif" />
                    <source srcset="/img/hero/new-card.heic" type="image/heic" />
                    <source srcset="/img/hero/new-card.webp" type="image/webp" />
                    <source srcset="/img/hero/new-card.jpg" type="image/jpg" />
                    <img alt="Shift and Shiftine" src="/img/hero/new-card.jpg" width="1920" height="1080" class="w-full h-auto" /> --}}
                    <img alt="Shift and Shiftine" src="https://blogarchive.reinhart1010.id/wp-content/uploads/2024/01/AOG-Conference-2024-reinhart1010.id-header.jpg" width="1920" height="1080" class="w-full h-auto" />
                </picture>
                <div class="flex flex-col p-4 flex-1 gap-2 bg-gradient-to-b">
                    <h1 class="font-sans-display text-4xl font-medium">
                        Reinhart is a person who
                        <strong class="font-bold text-transparent bg-clip-text bg-gradient-to-tr dark:bg-gradient-to-bl from-dm-violet-500 to-dm-violet-200">loves</strong>
                        and
                        <strong class="font-bold text-transparent bg-clip-text bg-gradient-to-tr dark:bg-gradient-to-bl from-dm-violet-500 to-dm-violet-200">works</strong>
                        with God and technology.
                    </h1>
                    {{-- <p class="text-xl">He currently works as a spirit, man, and robot in a mission to re-establish the relationship and authority of God to humanity, and humanity to their creations.</p> --}}
                    <p class="text-xl">By the way, he, his friends and bots will join together in <strong class="text-dm-violet-500 dark:text-dm-violet-200"">Army of God Conference 2024</strong>. How about you?</p>
                    <div class="flex flex-col sm:flex-row md:flex-col lg:flex-row gap-3">
                        <x-primitives.button theme-color="violet" element="a" href="https://gms.church/aogconference?utm_source=reinhart1010&utm_medium=website" target="_blank" class="flex flex-row gap-2 justify-between items-center">
                            <x-fluentui-ticket-diagonal-24-o class="w-6 h-6" />
                            Get Tickets
                            <x-fluentui-arrow-right-24 class="w-6 h-6" />
                        </x-primitives.button>
                        <x-primitives.button theme-color="violet" element="a" href="https://www.instagram.com/aogmsyouth" target="_blank" class="flex flex-row gap-2 justify-between items-center">
                            <x-simpleicon-instagram class="w-6 h-6" />
                            Follow on Instagram
                            <x-fluentui-arrow-right-24 class="w-6 h-6" />
                        </x-primitives.button>
                    </div>
                </div>
            </x-primitives.card>
            <x-primitives.card :theme-color="$theme_colors[2]" class="col-span-6 md:col-span-3 lg:col-span-2 p-4 rounded-2xl">
                <x-fluentui-compass-northwest-24-o class="w-10 h-10" />
                <h2 class="font-sans-display text-2xl font-semibold">Looking for these?</h2>
                <ul class="mt-2">
                    @foreach ($recommended_sites as $i => $site)
                        @if ($i > 0)
                            <li aria-hidden="true">
                                <hr class="my-2 border-black/10 dark:border-white/10" aria-hidden="true" />
                            </li>
                        @endif
                        <li>
                            <a href="{{ $site["site"] }}">
                                <p class="font-semibold text-lg">{{ $site["name"] }}</p>
                                <p class="text-sm">{{ $site["description"] ?? $site["site"] }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </x-primitives.card>
            <x-primitives.card :theme-color="$theme_colors[1]" class="col-span-6 md:col-span-3 lg:col-span-2 p-4 rounded-2xl">
                <x-fluentui-chat-multiple-24-o class="w-10 h-10" />
                <h2 class="font-sans-display text-2xl font-semibold">Latest Blogs</h2>
                <ul class="mt-2">
                    @foreach ($posts as $i => $post)
                        <?php
                            $post_date = new Carbon($post->post_date);
                        ?>
                        @if ($i > 0)
                            <hr class="my-2 border-black/10 dark:border-white/10" aria-hidden="true" />
                        @endif
                        <li>
                            <a href="/blog/{{ $post_date->format('Y/m/d') }}/{{ $post->post_name }}">
                                <p class="font-semibold text-lg">{{ $post["title"] }}</p>
                                <p class="text-sm">{{ $post_date->format('d M Y') }}</p>
                            </a>
                        </li>
                    @endforeach
                    <li>
                        <hr class="my-2 border-black/10 dark:border-white/10" aria-hidden="true" />
                        <a href="/blog" class="flex flex-row gap-1 items-center">
                            <p class="font-medium text-lg">View All</p>
                            <x-fluentui-arrow-right-24 class="w-6 h-6" />
                        </a>
                    </li>
                </ul>
            </x-primitives.card>
            <a href="/for-recruiters" class="col-span-6 md:col-span-2 p-4 rounded-2xl bg-dm-violet-400 dark:bg-dm-violet-700 text-white">
                <x-fluentui-people-audience-24-o class="w-10 h-10" />
                <h2 class="font-sans-display text-2xl font-semibold">Interested to get me into your team?</h2>
            </a>
            <x-primitives.card :theme-color="$theme_colors[0]" class="col-span-6 md:col-span-4 row-span-2 p-4 rounded-2xl">
                <x-fluentui-apps-24-o class="w-10 h-10" />
                <h2 class="font-sans-display text-2xl font-semibold">Apps, Products, and Services</h2>
                <hr class="my-2 border-black/10 dark:border-white/10" aria-hidden="true" />
                <ul class="mt-2 grid sm:grid-cols-2 gap-4">
                    @foreach ($featured_apps as $i => $app)
                        <li>
                            <a href="{{ $app["url"] }}">
                                <p class="font-semibold text-lg">{{ $app["name"] }}</p>
                                <p class="text-sm">{{ $app["description"] ?? $app["url"] }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </x-primitives.card>
            <x-primitives.card :theme-color="$theme_colors[1]" class="col-span-6 md:col-span-2 p-4 rounded-2xl">
                <x-fluentui-library-24-o class="w-10 h-10" />
                <h2 class="font-sans-display text-2xl font-semibold">Community Resources</h2>
                <ul class="mt-2">
                    @foreach ($community_resources as $i => $site)
                        @if ($i > 0)
                            <li aria-hidden="true">
                                <hr class="my-2 border-black/10 dark:border-white/10" aria-hidden="true" />
                            </li>
                        @endif
                        <li>
                            <a href="{{ $site["site"] }}">
                                <p class="font-semibold text-lg">{{ $site["name"] }}</p>
                                <p class="text-sm">{{ $site["description"] ?? $site["site"] }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </x-primitives.card>
        </div>
    </main>
</x-app-layout>
