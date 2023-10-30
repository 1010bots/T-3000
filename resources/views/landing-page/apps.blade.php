<?php
    use App\Models\Product;
    use App\Models\ProductPublisher;
    use App\Models\Publisher;

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
?>
<x-app-layout>
    <main class="text-black dark:text-white">
        <div class="m-4 text-center">
            <h1 class="text-3xl text-bold font-serif font-semibold break-words">Apps and Services</h1>
        </div>
        <div class="m-4 text-center">
            <h2 class="my-2 text-2xl text-bold font-serif font-semibold break-words">Currently building and maintaining...</h2>
            <div class="py-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
                @foreach ($featured_apps as $app)
                    <div class="block @if ($app->_compiled->image_type == 'cover' && $app->_compiled->image_src != null) aspect-h-9 aspect-w-16 @endif sm:aspect-h-9 aspect-w-16 overflow-hidden bg-white dark:bg-gray-800 rounded-xl shadow-lg text-lg">
                        @if ($app->_compiled->image_type == 'cover' && $app->_compiled->image_src != null)
                            <picture>
                                <img alt="Cover image for {{ $app->name }}" src="{{ $app->_compiled->image_src }}" height="1080" width="1920" class="h-full w-full aspect-h-9 aspect-w-16 bg-no-repeat object-cover" />
                            </picture>
                        @endif
                        <div class="p-4 flex flex-col items-center justify-center h-full">
                            @if ($app->_compiled->image_type == 'icon' && $app->_compiled->image_src != null)
                                <div class="mb-2 flex items-center justify-center w-full">
                                    <picture>
                                        <img alt="Icon for {{ $app->name }}" src="{{ $app->_compiled->image_src }}" height="40" width="40" class="me-2 bg-no-repeat rounded-lg object-cover" />
                                    </picture>
                                    <h3 class="@if ($app->_compiled->types['library'] ?? false) font-mono text-gr-lime-400 dark:text-dm-lime-100 @endif text-xl font-semibold">{{ $app->name }}</h3>
                                </div>
                                <p class="line-clamp-2">{{ $app->description }}</p>
                            @else
                                <h3 class="@if ($app->_compiled->types['library'] ?? false) font-mono text-gr-lime-400 dark:text-dm-lime-100 @endif text-xl font-semibold mb-2">{{ $app->name }}</h3>
                                <p class="line-clamp-2 lg:line-clamp-3">{{ $app->description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="m-4 text-center">
            <h2 class="my-2 text-2xl text-bold font-serif font-semibold break-words">Previously worked on...</h2>
            <div class="py-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
                @foreach ($retired_apps as $app)
                    <div class="block @if ($app->_compiled->image_type == 'cover' && $app->_compiled->image_src != null) aspect-h-9 aspect-w-16 @endif sm:aspect-h-9 aspect-w-16 overflow-hidden bg-white dark:bg-gray-800 rounded-xl shadow-lg text-lg">
                        @if ($app->_compiled->image_type == 'cover' && $app->_compiled->image_src != null)
                            <picture>
                                <img alt="Cover image for {{ $app->name }}" src="{{ $app->_compiled->image_src }}" height="1080" width="1920" class="h-full w-full aspect-h-9 aspect-w-16 bg-no-repeat object-cover" />
                            </picture>
                        @endif
                        <div class="p-4 flex flex-col items-center justify-center h-full">
                            @if ($app->_compiled->image_type == 'icon' && $app->_compiled->image_src != null)
                                <div class="mb-2 flex items-center justify-center w-full">
                                    <picture>
                                        <img alt="Icon for {{ $app->name }}" src="{{ $app->_compiled->image_src }}" height="36" width="36" class="me-2 bg-no-repeat rounded-lg object-cover" />
                                    </picture>
                                    <h3 class="@if ($app->_compiled->types['library'] ?? false) font-mono text-gr-lime-400 dark:text-dm-lime-100 @endif text-xl font-semibold">{{ $app->name }}</h3>
                                </div>
                                <p class="line-clamp-2">{{ $app->description }}</p>
                            @else
                                <h3 class="@if ($app->_compiled->types['library'] ?? false) font-mono text-gr-lime-400 dark:text-dm-lime-100 @endif text-xl font-semibold mb-2">{{ $app->name }}</h3>
                                <p class="line-clamp-3">{{ $app->description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</x-app-layout>
