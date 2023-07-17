<?php
    use App\Helpers;
    $regulation_list = [
        ['California Consumer Privacy Act (CCPA)', 'State of California (United States)'],
        ['General Data Protection Regulation (GDPR)', 'European Union'],
        ['Private Electronic System Operator (ESO/PSE)', 'Republic of Indonesia'],
    ];

    $citizen_list = [
        ['Australia', 'au'],
        ['Canada', 'ca'],
        ['People\'s Republic of China (including Hong Kong, SAR, and Macau, SAR)', 'cn'],
        ['European Union (or the European Economic Area / EEA)', 'eu'],
        ['Indonesia', 'id'],
        ['Japan', 'jp'],
        ['New Zealand', 'nz'],
        ['Saudi Arabia', 'sa'],
        ['United Kingdom', 'uk'],
        ['United States of America', 'us'],
    ];
    
    // GDPR classification: Necessary, Functional, Analytics, Performance, Advertisement, Others
    $required_cookies = [
        [
            'name' => 'reinhart_previano_k_session',
            'host' => 'reinhart1010.id',
            'type' => 'authentication',
            'description' => 'Session token, which may be used to ensure you’re logged in.',
            'duration' => 2 * 60 * 60,
            'url' => 'https://laravel.com/docs/10.x/cookie',
        ],
        [
            'name' => 'XSRF-TOKEN',
            'host' => 'reinhart1010.id',
            'type' => 'security',
            'description' => 'Limited-time token to prevent Cross-Site Request Forgery (CRSF) attacks.',
            'duration' => 2 * 60 * 60,
            'url' => 'https://laravel.com/docs/10.x/csrf',
        ],
        [
            'name' => 'halfmoon_preferredMode',
            'host' => 'nix.reinhart1010.id',
            'type' => 'functional',
            'description' => 'Store user’s theme preferences: Light Mode or Dark Mode.',
            'duration' => 365 * 24 * 60 * 60,
            'url' => 'https://www.gethalfmoon.com/docs/core-javascript-library/',
        ],
    ];

    $required_features = [
        [
            'id' => 'cloudflare',
            'name' => 'Cloudflare',
            'features' => [
                'Load Balancing',
                'Analytics',
            ],
            'about' => 'https://www.cloudflare.com/',
            'privacy' => 'https://www.cloudflare.com/privacypolicy/',
            'terms' => 'https://www.cloudflare.com/website-terms/',
        ],
        [
            'id' => 'niagahoster',
            'name' => 'Niagahoster',
            'features' => [
                'Web Hosting',
                'Load Balancing',
            ],
            'about' => 'https://www.niagahoster.co.id/',
            'privacy' => 'https://www.niagahoster.co.id/kebijakan-privasi/',
            'terms' => 'https://www.niagahoster.co.id/syarat-dan-ketentuan/',
        ],
    ];

    $optional_features = [
        [
            'id' => 'kakao',
            'name' => 'Kakao',
            'features' => [
                'Share to KakaoTalk',
                'Share to KakaoStory',
            ],
            'about' => 'https://www.kakaocorp.com/page/service/service',
            'privacy' => 'https://www.kakao.com/policy/privacy',
            'terms' => 'https://www.kakao.com/policy/terms',
            'javascript' => [
                ['/js/kakao.js', '/js/kakao.js', 'Expat', 'http://www.jclark.com/xml/copying.txt'],
            ],
            'consequences' => ['You may not be able to share articles directly to KakaoTalk or KakaoStory.'],
        ],
        [
            'id' => 'hcaptcha',
            'name' => 'hCaptcha',
            'features' => [
                'CAPTCHA',
            ],
            'about' => 'https://www.hcaptcha.com/',
            'privacy' => 'https://www.hcaptcha.com/privacy',
            'terms' => 'https://www.hcaptcha.com/terms',
            'javascript' => [
                ['https://js.hcaptcha.com/1/api.js', 'https://js.hcaptcha.com/1/api.js', 'License Terms for the hCaptcha JS API', 'https://www.hcaptcha.com/license'],
            ],
            'consequences' => ['You may not be able to register, sign in, or perform certain actions under your account.'],
        ],
    ];
?>

<x-app-layout>
    <div class="m-auto p-6 max-w-2xl text-black dark:text-white">
        <div class="my-4">
            <p class="m-0 text-xl">You<x-fluentui-chevron-right-24 class="inline-block h-4 w-4" /></p>
            <h1 class="text-4xl text-bold font-serif font-semibold break-words">Privacy Settings</h1>
        </div>
        <hr>
        <div class="my-4 p-4 rounded-xl bg-gr-cyan-50/50 dark:bg-dm-cyan-900/50 hover:bg-gr-cyan-50 dark:hover:bg-gr-cyan-900 text-gr-cyan-900 dark:text-white border-2 border-gr-cyan-500 dark:border-dm-cyan-50 shadow-lg shadow-dm-cyan-400/50 dark:shadow-dm-cyan-200/50 hover:shadow-dm-cyan-200/75 dark:hover:shadow-dm-cyan-200/75 ease-out duration-200 will-change-auto hover:will-change-scroll" style="border-style: inset;">
            <span class="inline-block font-bold">(&gt;_ )!</span>
            In order to comply with existing laws on electronic systems, digital copyright, data protection, and online privacy in several regions (CCPA, GDPR, ESO/PSE, etc.) we require you to fill out this form to ensure that we get and perform necessary consent and actions in accordance to these laws.
            <br><br>
            By filling out and submitting this form, you agree that you have provided correct information to us as an effort from you and us to comply with these regulations. Additionally, by using optional features on this site, you agree to comply with our Terms and Service and our Privacy Policy, which may include the sharing of your personal data to third-parties.
        </div>
        <div class="my-4 p-4 rounded-xl bg-gr-fuchsia-50/50 dark:bg-dm-fuchsia-900/50 hover:bg-gr-fuchsia-50 dark:hover:bg-gr-fuchsia-900 text-gr-fuchsia-900 dark:text-white border-2 border-gr-fuchsia-500 dark:border-dm-fuchsia-50 shadow-lg shadow-dm-fuchsia-400/50 dark:shadow-dm-fuchsia-200/50 hover:shadow-dm-fuchsia-200/75 dark:hover:shadow-dm-fuchsia-200/75 ease-out duration-200 will-change-auto hover:will-change-scroll" style="border-style: inset;">
            <span class="inline-block font-bold">($_ )!</span>
            Your preferences on this page will <strong class="font-bold text-gr-fuchsia-600 dark:text-gr-fuchsia-300">not</strong> be stored and synced across your logged-in devices.
        </div>
        <div class="py-2">
            <div class="my-2">
                <h2 class="text-2xl text-bold font-serif font-semibold break-words">1. Are you currently a citizen or resident of the following countries?</h2>
                <p class="text-sm text-gr-red-500 dark:text-gr-red-300">*Required</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-2">
                @foreach($citizen_list as $citizen)
                    <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow-lg text-lg">
                        <legend class="text-xl font-semibold mb-2">{{ $citizen[0] }}</legend>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <input type="radio" id="citizen-{{ $citizen[1] }}-yes" name="citizen-{{ $citizen[1] }}" value="1">
                                <label for="citizen-{{ $citizen[1] }}-yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="citizen-{{ $citizen[1] }}-no" name="citizen-{{ $citizen[1] }}" value="0" checked>
                                <label for="citizen-{{ $citizen[1] }}-no">No</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="py-2">
            <div class="my-2">
                <h2 class="text-2xl text-bold font-serif font-semibold break-words">2. Manage your cookies and features.</h2>
                <div class="my-2">
                    <h3 class="text-xl text-bold font-serif font-semibold break-words">Required Features</h3>
                    <p>The following features are required for basic functionality on this website.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-2">
                        @foreach($required_features as $feature)
                            <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow-lg text-lg">
                                <h4 class="text-xl font-semibold mb-2">{{ $feature['name'] }}</h4>
                                <p class="text-gray-800 dark:text-gray-200">{{ join(', ', $feature['features']) }}</p>
                                @if (isset($feature['javascript']) && count($feature['javascript']) > 0)
                                    <details>
                                        <?php
                                            $all_js_free = true;
                                            foreach ($feature['javascript'] as $js) {
                                                $all_js_free &= Helpers::is_license_free($js[2]);
                                            }
                                        ?>
                                        @if ($all_js_free)
                                            <summary class="text-sm text-gr-yellow-600 dark:text-gr-yellow-400"><x-fluentui-warning-16 height="16" width="16" class="inline-block" /> Contains the following JavaScript resources</summary>
                                        @else
                                            <summary class="text-sm text-gr-red-600 dark:text-gr-red-400"><x-fluentui-error-circle-16 height="16" width="16" class="inline-block" /> Contains nonfree JavaScript resources</summary>
                                        @endif
                                        @component('components.js-license-list', [
                                            'class' => 'list-disc w-full pl-4 text-sm',
                                            'data' => $feature['javascript'],
                                        ])
                                        @endcomponent
                                    </details>
                                @else
                                    <p class="text-sm text-gr-green-600 dark:text-gr-green-400"><x-fluentui-checkmark-16 height="16" width="16" class="inline-block" /> Does not use additional JavaScript</p>
                                @endif
                                @if (true || (isset($feature['cookies']) && count($feature['cookies']) > 0))
                                    <details>
                                        <summary class="text-sm text-gr-yellow-600 dark:text-gr-yellow-400"><x-fluentui-warning-16 height="16" width="16" class="inline-block" /> Stores the following cookies on this site</summary>
                                        @component('components.cookies-list', [
                                            'class' => 'list-disc w-full pl-4 text-sm',
                                            'data' => $required_cookies,
                                        ])
                                        @endcomponent
                                    </details>
                                @else
                                    <p class="text-sm text-gr-green-600 dark:text-gr-green-400"><x-fluentui-checkmark-16 height="16" width="16" class="inline-block" /> Does not store cookies on this site</p>
                                @endif
                                <div class="grid grid-cols-3 gap-4 mt-4">
                                    <a href="{{ $feature['about'] }}" class="flex flex-col items-center font-bold text-gr-blue-500 dark:text-gr-blue-300 active:text-gr-blue-800 dark:active:text-gr-blue-500 hover:text-gr-blue-800 dark:hover:text-gr-blue-500">
                                        <x-fluentui-info-24-o class="h-6 w-6" />
                                        About
                                    </a>
                                    <a href="{{ $feature['privacy'] }}" class="flex flex-col items-center font-bold text-gr-blue-500 dark:text-gr-blue-300 active:text-gr-blue-800 dark:active:text-gr-blue-500 hover:text-gr-blue-800 dark:hover:text-gr-blue-500">
                                        <x-fluentui-globe-shield-24-o class="h-6 w-6" />
                                        Privacy
                                    </a>
                                    <a href="{{ $feature['terms'] }}" class="flex flex-col items-center font-bold text-gr-blue-500 dark:text-gr-blue-300 active:text-gr-blue-800 dark:active:text-gr-blue-500 hover:text-gr-blue-800 dark:hover:text-gr-blue-500">
                                        <x-fluentui-gavel-24-o class="h-6 w-6" />
                                        Terms
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <h3 class="text-xl text-bold font-serif font-semibold break-words">Optional Features</h3>
                <div class="my-4 p-4 rounded-xl bg-gr-green-50/50 dark:bg-dm-green-900/50 hover:bg-gr-green-50 dark:hover:bg-gr-green-900 text-gr-green-900 dark:text-white border-2 border-gr-green-500 dark:border-dm-green-50 shadow-lg shadow-dm-green-400/50 dark:shadow-dm-green-200/50 hover:shadow-dm-green-200/75 dark:hover:shadow-dm-green-200/75 ease-out duration-200 will-change-auto hover:will-change-scroll" style="border-style: inset;">
                    <span class="inline-block font-bold">(#_ )!</span>
                    Some of these require us to store and share your data to third-party services. They may also place additional third-party cookies, contain nonfree JavaScript code, and/or share your data to nonfree services.
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-2">
                    @foreach($optional_features as $feature)
                        <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow-lg text-lg">
                            <div class="mb-2 flex items-center gap-2">
                                <h4 class="text-xl font-semibold flex-grow">{{ $feature['name'] }}</h4>
                                <input type="checkbox" id="optional-features-{{ $feature['id'] }}" name="optional-features-{{ $feature['id'] }}" />
                                <label for="optional-features-{{ $feature['id'] }}">Enabled</label>
                            </div>
                            <p class="text-gray-800 dark:text-gray-200">{{ join(', ', $feature['features']) }}</p>
                            @if (isset($feature['javascript']) && count($feature['javascript']) > 0)
                                <details>
                                    <?php
                                        $all_js_free = true;
                                        foreach ($feature['javascript'] as $js) {
                                            $all_js_free &= Helpers::is_license_free($js[2]);
                                        }
                                    ?>
                                    @if ($all_js_free)
                                        <summary class="text-sm text-gr-yellow-600 dark:text-gr-yellow-400"><x-fluentui-warning-16 height="16" width="16" class="inline-block" /> Contains the following JavaScript resources</summary>
                                    @else
                                        <summary class="text-sm text-gr-red-600 dark:text-gr-red-400"><x-fluentui-error-circle-16 height="16" width="16" class="inline-block" /> Contains nonfree JavaScript resources</summary>
                                    @endif
                                    @component('components.js-license-list', [
                                        'class' => 'list-disc w-full pl-4 text-sm',
                                        'data' => $feature['javascript'],
                                    ])
                                    @endcomponent
                                </details>
                            @else
                                <p class="text-sm text-gr-green-600 dark:text-gr-green-400"><x-fluentui-checkmark-16 height="16" width="16" class="inline-block" /> Does not use additional JavaScript</p>
                            @endif
                            <div class="grid grid-cols-3 gap-4 mt-4">
                                <a href="{{ $feature['about'] }}" class="flex flex-col items-center font-bold text-gr-blue-500 dark:text-gr-blue-300 active:text-gr-blue-800 dark:active:text-gr-blue-500 hover:text-gr-blue-800 dark:hover:text-gr-blue-500">
                                    <x-fluentui-info-24-o class="h-6 w-6" />
                                    About
                                </a>
                                <a href="{{ $feature['privacy'] }}" class="flex flex-col items-center font-bold text-gr-blue-500 dark:text-gr-blue-300 active:text-gr-blue-800 dark:active:text-gr-blue-500 hover:text-gr-blue-800 dark:hover:text-gr-blue-500">
                                    <x-fluentui-globe-shield-24-o class="h-6 w-6" />
                                    Privacy
                                </a>
                                <a href="{{ $feature['terms'] }}" class="flex flex-col items-center font-bold text-gr-blue-500 dark:text-gr-blue-300 active:text-gr-blue-800 dark:active:text-gr-blue-500 hover:text-gr-blue-800 dark:hover:text-gr-blue-500">
                                    <x-fluentui-gavel-24-o class="h-6 w-6" />
                                    Terms
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>~
            </div>
        </div>
        <div class="my-2">
            <h2 class="text-2xl text-bold font-serif font-semibold break-words">4. Advanced Privacy Settings.</h2>
            <p class="text-sm text-gr-red-500 dark:text-gr-red-300">*Required</p>
        </div>
        
    </div>
</x-app-layout>
