<?php
    use Carbon\Carbon;
?>
<x-app-layout>
    <script src="/js/fast-average-color.min.js"></script>
    <div class="m-auto px-safe-offset-6 py-6 max-w-6xl">
        <div class="my-4 text-black dark:text-white">
            <h1 class="text-3xl text-bold font-serif font-semibold break-words">{{ $index_title }}</h1>
        </div>
        <hr />
        <div class="py-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
            @foreach($posts as $post)
                <?php
                    $slug = '/blog/' . (new Carbon($post->post_date))->format('Y/m/d') . '/' .$post->post_name;
                ?>
                <a class="block aspect-h-1 aspect-w-1 overflow-hidden bg-white dark:bg-gray-800 rounded-xl shadow-lg" href="{{$slug}}" data-fac-container="{{$slug}}">
                    <div>
                        @if (isset($post->image))
                            <img src="{{$post->image}}" class="hidden" data-fac-image="{{$slug}}" />
                        @endif
                        <div class="p-2 sm:p-4">
                            <p class="font-semibold sm:text-lg line-clamp-3">{{ $post->title }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
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
