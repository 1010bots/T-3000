<?php
    use Carbon\Carbon;
    $createdAt = new Carbon($post->created_at);
    $updatedAt = new Carbon($post->updated_at);
?>
<x-app-layout title="{{ $post->post_title }}">
    <style scoped>
        article main a, article main b, article main strong {
            color: #007391;
            font-weight: 700;
        }
        article main a:active, article main a:hover {
            color: #00446C;
        }
        article main a::after {
            background-color: #007391;
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
        article main a:active::after, article main a:hover::after {
            background-color: #00446C;
        }
        article main figure figcaption {
            font-family: ui-serif, Constantia, "Bitstream Charter", Charter, "STIX Two Text", "Libertinus Serif", "Linux Libertine O", "Linux Libertine G", "Linux Libertine", "DejaVu Serif", "Bitstream Vera Serif", "Roboto Serif", "Noto Serif", "Times New Roman", serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", "Noto Emoji", Symbola;
            font-size: 1rem;
            font-style: italic;
            line-height: 1.5;
            margin-bottom: 0.5rem;
            margin-top: 0.5rem;
            text-align: center;
        }
        article main h1, article main .h1 {
            font-family: ui-serif, Constantia, "Bitstream Charter", Charter, "STIX Two Text", "Libertinus Serif", "Linux Libertine O", "Linux Libertine G", "Linux Libertine", "DejaVu Serif", "Bitstream Vera Serif", "Roboto Serif", "Noto Serif", "Times New Roman", serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", "Noto Emoji", Symbola;
            font-size: 2.25rem;
            font-weight: 600;
            line-height: 2.5rem;
        }
        article main h2, article main .h2 {
            font-family: ui-serif, Constantia, "Bitstream Charter", Charter, "STIX Two Text", "Libertinus Serif", "Linux Libertine O", "Linux Libertine G", "Linux Libertine", "DejaVu Serif", "Bitstream Vera Serif", "Roboto Serif", "Noto Serif", "Times New Roman", serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", "Noto Emoji", Symbola;
            font-size: 1.875rem;
            font-weight: 600;
            line-height: 2.25rem;
        }
        article main h3, article main .h3 {
            font-family: ui-serif, Constantia, "Bitstream Charter", Charter, "STIX Two Text", "Libertinus Serif", "Linux Libertine O", "Linux Libertine G", "Linux Libertine", "DejaVu Serif", "Bitstream Vera Serif", "Roboto Serif", "Noto Serif", "Times New Roman", serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", "Noto Emoji", Symbola;
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 2rem;
        }
        article main h4, article main .h4 {
            font-family: ui-serif, Constantia, "Bitstream Charter", Charter, "STIX Two Text", "Libertinus Serif", "Linux Libertine O", "Linux Libertine G", "Linux Libertine", "DejaVu Serif", "Bitstream Vera Serif", "Roboto Serif", "Noto Serif", "Times New Roman", serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", "Noto Emoji", Symbola;
            font-size: 1.25rem;
            font-weight: 600;
            line-height: 1.75rem;
        }
        article main h5, article main .h5 {
            font-family: ui-serif, Constantia, "Bitstream Charter", Charter, "STIX Two Text", "Libertinus Serif", "Linux Libertine O", "Linux Libertine G", "Linux Libertine", "DejaVu Serif", "Bitstream Vera Serif", "Roboto Serif", "Noto Serif", "Times New Roman", serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", "Noto Emoji", Symbola;
            font-size: 1.125rem;
            font-weight: 600;
            line-height: 1.75rem;
        }
        article main h6, article main .h6 {
            font-family: ui-serif, Constantia, "Bitstream Charter", Charter, "STIX Two Text", "Libertinus Serif", "Linux Libertine O", "Linux Libertine G", "Linux Libertine", "DejaVu Serif", "Bitstream Vera Serif", "Roboto Serif", "Noto Serif", "Times New Roman", serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", "Noto Emoji", Symbola;
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5rem;
        }
        article main p {
            margin-bottom: 1rem;
            margin-top: 1rem;
        }
        @media screen and (prefers-color-scheme: dark) {
            article main a, article main b, article main strong {
                color: #98E3EC;
            }
            article main a::after {
                background-color: #98E3EC;
            }
            article main a:active, article main a:hover {
                color: #00B7C8;
            }
            article main a:active::after, article main a:hover::after {
                background-color: #00B7C8;
            }
        }
    </style>
    <article class="m-auto p-6 max-w-2xl">
        <div class="my-4 text-black dark:text-white">
            <p class="m-0 text-xl">{{ $createdAt->format('j F Y') }}
            @if ($createdAt != $updatedAt)
                &bull; (Updated {{ $updatedAt->format('j F Y') }})
            @endif
            </p>
            <h1 class="text-3xl text-bold font-serif font-semibold break-words">{{ $post->post_title }}</h1>
            <x-share-buttons title="{{ $post->post_title }}" description="{{ $post->post_excerpt }}" class="my-2" />
        </div>
        <hr>
        <x-alerts.new-site />
        {{-- <x-alerts.consent-required /> --}}
        <main class="text-lg text-gray-900 dark:text-gray-100">
            {!! $post->post_content ?? $post->content !!}
        </main>
        <x-alerts.new-site />
        <script src="/js/smartquotes.js"></script>
        <script>smartquotes();</script>
    </article>
</x-app-layout>
