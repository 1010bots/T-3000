<?php
    use Illuminate\Support\Facades\Request;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Web Browser Compatibility Test - {{ env('APP_NAME', 'Laravel') }}</title>
    <noscript>
        <style>.jsonly { display: none }</style>
    </noscript>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" type="text/css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&family=Noto+Emoji&display=swap" ype="text/css" />
    <style>
        /* "Tofu" font from Google Fonts */
        @font-face {
            font-family: Tofu;
            src: url("data:font/ttf;base64,AAEAAAAKAIAAAwAgT1MvMkWnTqsAAAEoAAAAYGNtYXAALQDKAAABkAAAAFhnbHlmO2FM+QAAAfAAAAAsaGVhZCEIFXYAAACsAAAANmhoZWEHbgNUAAAA5AAAACRobXR4BBoAAAAAAYgAAAAGbG9jYQAWAAAAAAHoAAAABm1heHAABAAMAAABCAAAACBuYW1l6hJPCQAAAhwAAAFHcG9zdAADAAAAAANkAAAAIAABAAAAAQAAda6RkF8PPPUAAwQAAAAAAN826K8AAAAA3zborwCWAAAC7gMgAAAAAwACAAAAAAAAAAEAAAPo/zgAAAOEAJYAlgLuAAEAAAAAAAAAAAAAAAAAAAABAAEAAAACAAoAAQAAAAAAAgAAAAAAAAAAAAAAAAAAAAAAAwOEAZAABQAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD///////////////8H////Pz8/PwAAAAH//wPoAAAAAAPoAMgAAAAAAAAAAAAAAAAAAAAgAAADhAAAAJYAAAAAAAMAAAADAAAAHAADAAEAAAAcAAMACgAAADwABAAgAAAABAAEAAEAAAAB//8AAAAB//8AAAABAAAAAAANAAAAAAAcAAAAAAAAAAEAAAACABD//wAAAAEAAAAAABYAAAABAJYAAALuAyAACQAAMxEhESE3IREhEZYCWP2oMgH0/gwDIPzgMgK8/UQAAAAADACWAAEAAAAAAAEABAAAAAEAAAAAAAIABwAEAAEAAAAAAAMAGQALAAEAAAAAAAQADAAkAAEAAAAAAAUACwAwAAEAAAAAAAYADAAkAAMAAQQJAAEACAA7AAMAAQQJAAIADgBDAAMAAQQJAAMAMgBRAAMAAQQJAAQAGACDAAMAAQQJAAUAFgCbAAMAAQQJAAYAGACDVG9mdVJlZ3VsYXJmb250QnVpbGRlcjogVG9mdS5SZWd1bGFyVG9mdS1SZWd1bGFyVmVyc2lvbiAwLjEAVABvAGYAdQBSAGUAZwB1AGwAYQByAGYAbwBuAHQAQgB1AGkAbABkAGUAcgA6ACAAVABvAGYAdQAuAFIAZQBnAHUAbABhAHIAVABvAGYAdQAtAFIAZQBnAHUAbABhAHIAVgBlAHIAcwBpAG8AbgAgADAALgAxAAADAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");
        }
        @font-face {
            font-family: "Noto Color Emoji System";
            src: local("Noto Color Emoji");
        }
        @font-face {
            font-family: "Noto Emoji System";
            src: local("Noto Emoji");
        }

        body {
            padding-bottom: env(safe-area-inset-bottom);
            padding-left: env(safe-area-inset-left);
            padding-right: env(safe-area-inset-right);
            padding-top: env(safe-area-inset-top);
        }
        .emoji-table {
            display: block;
            overflow-x: auto;
        }
        .emoji-table td, .emoji-table th {
            min-width: 7rem;
        }
        .emoji-colored {
            font-family: "Apple Color Emoji", "Segoe UI Emoji", "SamsungColorEmoji", "Noto Color Emoji Flags", "Noto Color Emoji System", Tofu;
        }
        .emoji-colored-fallback {
            font-family: "Apple Color Emoji", "Segoe UI Emoji", "SamsungColorEmoji", "Noto Color Emoji Flags", "Noto Color Emoji", Tofu;
        }
        .emoji-outlined {
            font-family: "Segoe UI Symbol", "Noto Emoji System", Symbola, Tofu;
        }
        .emoji-outlined-fallback {
            font-family: "Segoe UI Symbol", "Noto Emoji", Symbola, Tofu;
        }
        .text-48px {
            font-size: 48px;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Web Browser Compatibility Test</h1>
    <p>
        <strong>This site is designed with modern web feature detection standards, that is, by not complaining you for not using Google Chrome.</strong> However, as a friendly reminder, we usually give warnings to users who use:
        <ul>
            <li>Android Browser or WebView (except Firefox and Google Chrome) on Android 4.4.4 (equivalent to Chromium 39) and below</li>
            <li><a href="https://en.wikipedia.org/wiki/Chromium_(web_browser)" target="_blank">Chromium</a>-based browsers using Chromium 56 or below. Chromium-based browsers include:</li>
            <ul>
                <li>Android Browser</li>
                <li>Android System WebView</li>
                <li>Arc</li>
                <li>Baidu Spark Browser</li>
                <li>Brave</li>
                <li>Google Chrome</li>
                <li>Mi Browser</li>
                <li>Opera on Opera 15 and above</li>
                <li>Opera Mini for Android (Normal/High/Turbo Mode)</li>
                <li>Oppo Browser</li>
                <li>Samsung Internet</li>
                <li>Tizen Browser on Tizen 3.x and above</li>
                <li>Vivaldi</li>
                <li>vivo Browser</li>
            </ul>
            <li>Firefox 51 or below</li>
            <li>Internet Explorer (any version)</li>
            <li><a href="https://en.wikipedia.org/wiki/EdgeHTML" target="_blank">EdgeHTML</a>-based Microsoft Edge 15 or below</li>
            <ul>
                <li>Chromium-based versions of Microsoft Edge (79 and above) follow the Chromium rules above</li>
            </ul>
            <li><a href="https://en.wikipedia.org/wiki/Presto_(browser_engine)" target="_blank">Presto</a>-based Opera 12 or below</li>
            <ul>
                <li>Presto is still also used in all versions of Opera Mini (except when <a href="https://dev.opera.com/articles/browsers-modes-engines/" target="_blank">Extreme/Mini mode</a> is turned off on Android and iOS)</li>
                <li>Chromium-based versions of Opera (15 and above), and Opera Mini for Android and iOS under the Normal/Turbo/High mode follow the Chromium rules above</li>
            </ul>
            <li><a href="https://en.wikipedia.org/wiki/WebKit" target="_blank">WebKit</a>-based browsers using WebKit 603.3.7 (Safari 10.2, iOS 10.2) and below (except the case of Chromium, who identify instead as WebKit 537.36). Chromium-based browsers include:</li>
            <ul>
                <li>Safari</li>
                <li>Firefox for iOS and iPadOS</li>
                <li>GNOME Web (Epiphany)</li>
                <li>Google Chrome for iOS and iPadOS</li>
                <li>Microsoft Edge for iOS and iPadOS</li>
                <li>Nintendo 3DS, Wii U, and Nintendo Switch</li>
                <li>Opera Mini for iOS and iPadOS (Normal/High/Turbo Mode)</li>
                <li>Sony PlayStation 4 and 5</li>
                <li>Tizen Browser on Tizen 2.x and below</li>
            </ul>
        </ul>
        We detected that you are using <strong>{{ Request::header('User-Agent') }}</strong>, by the way.
    </p>
    <p>
        If you are interested in designing and building websites like us, <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Browser_detection_using_the_user_agent" target="_blank">learn more</a>
        about why detecting whether users are using Chrome or not are mostly a bad idea.
    </p>
    <hr />
    <section id="required" aria-describedby="required-title">
        <h2 id="required-title">A. Required Features</h2>
        <div id="javascript" aria-describedby="javascript-title">
            <h3 id="javascript-title">A1. Javascript</h3>
            <b>
                <noscript>Your browser currently does not support JavaScript!</noscript>
                <span class="jsonly">Your browser currently supports JavaScript!</span>
            </b>
            <p>JavaScript is mostly required to support <a href="#essential">additional modern web features</a> which are not yet supported on your web browser.</p>
            <p>Please also note that some the following test also require JavaScript to run.</p>
        </div>
        <div id="acid-test" aria-describedby="acid-test-title">
            <h3 id="acid-test-title">A2. Acid2 and Acid3 Compliance</h3>
            <p><a href="https://www.webstandards.org/action/acid2/" target="_blank">Acid2</a> and <a href="https://www.webstandards.org/action/acid3/" target="_blank">Acid3</a> are international standard test suites to test web browser’s ability to properly render HTML and CSS content, as well as JavaScript features. Both tests have been introduced in 2005 and 2008 respectively, so if your web browser doesn’t mostly pass the test, your web browser could be about 15 years old (#_ ).</p>
            <p><strong>We expect you to visit our website(s) using a web browser that mostly, if not completely, comply with Acid2 and Acid3,</strong> which you can test for yourself <a href="https://www.webstandards.org/files/acid2/test.html" target="_blank">here</a> and <a href="http://acid3.acidtests.org" target="_blank">here</a> respectively.</p>
            <p>Note that, even with the latest versions, some web browsers might still fail slightly in Acid2 and Acid3, but this is mostly not an significant issue to us.</p>
        </div>
        <h3 id="flexbox-grid">A3. CSS Flexbox and CSS Grid</h3>
        <p>
            Our site heavily uses <a href="https://developer.mozilla.org/en-US/docs/Learn/CSS/CSS_layout/Flexbox" target="_blank">CSS Flexbox</a> and <a href="https://developer.mozilla.org/en-US/docs/Learn/CSS/CSS_layout/Grids" target="_blank">CSS Grid</a> to render content. While Flexbox has been <a href="https://caniuse.com/flexbox" target="_blank">supported</a> in all major web browsers (including Internet Explorer 11!), CSS Grid are supported starting in latter versions of web browsers, starting from:
            <ul>
                <li>Chromium 57</li>
                <li>Firefox 52</li>
                <li>Google Chrome 57</li>
                <li>Microsoft Edge 16</li>
                <li>Safari 10.1</li>
                <li>Android 5.0, or Chrome 57 and Firefox 52 for Android 4.4.4 and below</li>
                <li>iOS 10.3</li>
            </ul>
            and <a href="https://caniuse.com/css-grid" target="_blank">more</a>.
        </p>
    </section>
    <hr />
    <section id="essential" aria-describedby="essential-title">
        <h2 id="essential-title">B. Essential Features</h2>
        <p>This site also uses the following features, which are not strictly required, but recommended to enjoy the best of our features.</p>
        <div id="modern-http" aria-describedby="modern-http-title">
            <h3 id="modern-http-title">B1. HTTP/2 and HTTP/3</h3>
            <p><a href="https://web.dev/performance-http2/" target="_blank">HTTP/2 (2015)</a> and <a href="https://blog.cloudflare.com/http3-the-past-present-and-future/#how-did-we-get-here" target="_blank">HTTP/3 (2022)</a> are major upgrades to the lovely <a href="https://simple.wikipedia.org/wiki/Hypertext_Transfer_Protocol" target="_blank">HTTP(S) protocol,</a> the one that allows you to visit numerous websites including <kbd><u>https</u>://reinhart1010.id</kbd>.</p>
            <p>
                <noscript>
                    <i>JavaScript is required to test this feature</i>
                </noscript>
                <script>
                    try {
                        const protocol = performance.getEntries()[0].nextHopProtocol;
                        switch (protocol) {
                            case 'http/0.9':
                                document.write('You are currently visiting this webpage using <strong>HTTP/0.9</strong>, which is <strong>not recommended</strong> to visit our website. Additionally, HTTP/0.9 does not support POST requests, making it unusable to log in with your account.');
                                break;
                            case 'http/1.0':
                                document.write('You are currently visiting this webpage using <strong>HTTP/1.0</strong>, which is the standard for most web browsers today, especially for accessing sites that couldn’t support HTTPS. No problem, though, but we still recommend to update your browser to support HTTP/2 or later to benefit some technical improvements to make our sites load and perform faster.');
                                break;
                            case 'http/1.1':
                                document.write('You are currently visiting this webpage using <strong>HTTP/1.1</strong>, which is the standard for most web browsers today, especially for accessing sites that couldn’t support HTTPS. No problem, though, but we still recommend to update your browser to support HTTP/2 or later to benefit some technical improvements to make our sites load and perform faster.');
                                break;
                            case 'h2':
                            case 'h2c':
                                document.write('You are currently visiting this webpage using <strong>HTTP/2</strong>, which is great! You can now benefit from technical improvements you might not need to know but, TL;DR: they make websites to load faster in most conditions.');
                                break;
                            case 'h3':
                                document.write('You are currently visiting this webpage using <strong>HTTP/3</strong>, which is even better by HTTP/2! You can now benefit from technical improvements you might not need to know but, TL;DR: they make websites to load faster in most conditions.');
                                break;
                            default:
                                document.write('Your web browser reported that you are using HTTP version “' + protocol + "”. HTTP/4 and above could be definitely great, but HTTP/1.2 is a joke and does not exist.");
                        }
                    } catch (e) {
                        document.write('We are unable to check your web browser’s HTTP version.');
                    }
                </script>
            </p>
            <p>
                <strong>Note for (&gt;_ )s:</strong> Does the above result differs from the actual HTTP version that you’re currently using? It could also because our web server may not support that version, but Cloudlare upgraded the HTTP(S) connection under-the-hood to support yours. Please <a href="/contact" target="_blank">contact us</a> if that really happens.
            </p>
        </div>
        <div id="webfonts" aria-describedby="webfonts-title">
            <h3 id="webfonts-title">B2. Webfonts</h3>
            <p>Your web browser should be able to render webfonts if you are able to see a green check mark below.</p>
            <i class="fa fa-check text-48px" aria-hidden="true" style="color: lime;"></i>
            <i>Sample webfont provided by <a href="https://forkaweso.me" target="_blank">Fork Awesome</a>.</i>
        </div>
        <div id="modern-emoji" aria-describedby="modern-emoji-title">
            <h3 id="modern-emoji-title">B3. Modern Emoji</h3>
            <p>Some of our blog posts contain emojis, and we prefer to use your <a href="https://simple.wikipedia.org/wiki/Operating_system" target="_blank">operating system</a>-provided emoji fonts as possible. However,
                <ol>
                    <li><strong>Older operating systems (especially Android) may bundle outdated or inconsistent emojis as compared to others,</strong> like <a href="https://www.theguardian.com/technology/2017/sep/06/why-are-samsung-emojis-different-from-everyone-else?ref=reinhart1010.id" target="_blank">this case for Samsung</a>.</li>
                    <li><strong>Microsoft intentionally does not support country flag emojis,</strong> even in the latest version of Windows 11. This is also why Mozilla decided to bundle <a href="https://github.com/mozilla/twemoji-colr" target="_blank">another emoji font</a> for Firefox for Windows.</li>
                </ol>
                You can check for yourself how well your web browser and operating system renders these modern emojis.
                <strong>There should be EXACTLY five emojis,</strong> nothing more or less, without any rectangular boxes visible, for each emoji versions and variants to completely pass this test.
            </p>
            <table id="modern-emoji-list" border="1" class="emoji-table">
                <tr>
                    <th rowspan="2">Emoji Version</th>
                    <th colspan="2">Colored</th>
                    <th colspan="2">Outlined</th>
                </tr>
                <tr>
                    <th>System Default</th>
                    <th>Workaround</th>
                    <th>System Default</th>
                    <th>Workaround</th>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/flags" target="_blank">Country Flags</a></td>
                    <td class="emoji-colored">🇮🇩🇰🇷🇳🇵🏴‍☠️🇺🇳</td>
                    <td class="emoji-colored-fallback">🇮🇩🇰🇷🇳🇵🏴‍☠️🇺🇳</td>
                    <td class="emoji-outlined">🇮🇩🇰🇷🇳🇵🏴‍☠️🇺🇳</td>
                    <td class="emoji-outlined-fallback">🇮🇩🇰🇷🇳🇵🏴‍☠️🇺🇳</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-15.0/" target="_blank">15.0 (September 2022)</a></td>
                    <td class="emoji-colored">🩵🛜🪭🪼🫸</td>
                    <td class="emoji-colored-fallback">🩵🛜🪭🪼🫸</td>
                    <td class="emoji-outlined">🩵🛜🪭🪼🫸</td>
                    <td class="emoji-outlined-fallback">🩵🛜🪭🪼🫸</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-14.0/" target="_blank">14.0 (September 2021)</a></td>
                    <td class="emoji-colored">🫠🫱🏼‍🫲🏿🫰🏽🪸🫧</td>
                    <td class="emoji-colored-fallback">🫠🫱🏼‍🫲🏿🫰🏽🪸🫧</td>
                    <td class="emoji-outlined">🫠🫱🏼‍🫲🏿🫰🏽🪸🫧</td>
                    <td class="emoji-outlined-fallback">🫠🫱🏼‍🫲🏿🫰🏽🪸🫧</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-13.1/" target="_blank">13.1 (September 2020)</a></td>
                    <td class="emoji-colored">😶‍🌫️🧔🏻‍♀️🧑🏿‍❤️‍🧑🏾❤️‍🔥😵‍💫</td>
                    <td class="emoji-colored-fallback">😶‍🌫️🧔🏻‍♀️🧑🏿‍❤️‍🧑🏾❤️‍🔥😵‍💫</td>
                    <td class="emoji-outlined">😶‍🌫️🧔🏻‍♀️🧑🏿‍❤️‍🧑🏾❤️‍🔥😵‍💫</td>
                    <td class="emoji-outlined-fallback">😶‍🌫️🧔🏻‍♀️🧑🏿‍❤️‍🧑🏾❤️‍🔥😵‍💫</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-13.0/" target="_blank">13.0 (March 2020)</a></td>
                    <td class="emoji-colored">🥲🥷🏿🐻‍❄️🧋🪄</td>
                    <td class="emoji-colored-fallback">🥲🥷🏿🐻‍❄️🧋🪄</td>
                    <td class="emoji-outlined">🥲🥷🏿🐻‍❄️🧋🪄</td>
                    <td class="emoji-outlined-fallback">🥲🥷🏿🐻‍❄️🧋🪄</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-12.1/" target="_blank">12.1 (October 2019)</a></td>
                    <td class="emoji-colored">🧑🏻‍🦰🧑🏿‍🦯👩🏻‍🤝‍👩🏼🧑‍🎤🧑‍🎨</td>
                    <td class="emoji-colored-fallback">🧑🏻‍🦰🧑🏿‍🦯👩🏻‍🤝‍👩🏼🧑‍🎤🧑‍🎨</td>
                    <td class="emoji-outlined">🧑🏻‍🦰🧑🏿‍🦯👩🏻‍🤝‍👩🏼🧑‍🎤🧑‍🎨</td>
                    <td class="emoji-outlined-fallback">🧑🏻‍🦰🧑🏿‍🦯👩🏻‍🤝‍👩🏼🧑‍🎤🧑‍🎨</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-12.0/" target="_blank">12.0 (February 2019)</a></td>
                    <td class="emoji-colored">🦩🦻🏿👩🏼‍🤝‍👩🏻🦧🪐</td>
                    <td class="emoji-colored-fallback">🦩🦻🏿👩🏼‍🤝‍👩🏻🦧🪐</td>
                    <td class="emoji-outlined">🦩🦻🏿👩🏼‍🤝‍👩🏻🦧🪐</td>
                    <td class="emoji-outlined-fallback">🦩🦻🏿👩🏼‍🤝‍👩🏻🦧🪐</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-11.0/" target="_blank">11.0 (June 2018)</a></td>
                    <td class="emoji-colored">🥵🥶🦸🦠🧵</td>
                    <td class="emoji-colored-fallback">🥵🥶🦸🦠🧵</td>
                    <td class="emoji-outlined">🥵🥶🦸🦠🧵</td>
                    <td class="emoji-outlined-fallback">🥵🥶🦸🦠🧵</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-5.0/" target="_blank">5.0 (May 2017)</a></td>
                    <td class="emoji-colored">🥤🤩🤬🧕🏼🧢</td>
                    <td class="emoji-colored-fallback">🥤🤩🤬🧕🏼🧢</td>
                    <td class="emoji-outlined">🥤🤩🤬🧕🏼🧢</td>
                    <td class="emoji-outlined-fallback">🥤🤩🤬🧕🏼🧢</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-4.0/" target="_blank">4.0 (November 2016)</a></td>
                    <td class="emoji-colored">🤷‍♀️🏃‍♀️👨🏻‍🎨👱🏻‍♀️👩🏿‍🎓</td>
                    <td class="emoji-colored-fallback">🤷‍♀️🏃‍♀️👨🏻‍🎨👱🏻‍♀️👩🏿‍🎓</td>
                    <td class="emoji-outlined">🤷‍♀️🏃‍♀️👨🏻‍🎨👱🏻‍♀️👩🏿‍🎓</td>
                    <td class="emoji-outlined-fallback">🤷‍♀️🏃‍♀️👨🏻‍🎨👱🏻‍♀️👩🏿‍🎓</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-3.0/" target="_blank">3.0 (June 2016)</a></td>
                    <td class="emoji-colored">🤣🦋1️⃣🤢🥕</td>
                    <td class="emoji-colored-fallback">🤣🦋1️⃣🤢🥕</td>
                    <td class="emoji-outlined">🤣🦋1️⃣🤢🥕</td>
                    <td class="emoji-outlined-fallback">🤣🦋1️⃣🤢🥕</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-2.0/" target="_blank">2.0 (November 2015)</a></td>
                    <td class="emoji-colored">👋🏻👋🏼👋🏽👋🏾👋🏿</td>
                    <td class="emoji-colored-fallback">👋🏻👋🏼👋🏽👋🏾👋🏿</td>
                    <td class="emoji-outlined">👋🏻👋🏼👋🏽👋🏾👋🏿</td>
                    <td class="emoji-outlined-fallback">👋🏻👋🏼👋🏽👋🏾👋🏿</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/emoji-1.0/" target="_blank">1.0 (August 2015)</a></td>
                    <td class="emoji-colored">🤑🤖🐿️🛤️🛍️</td>
                    <td class="emoji-colored-fallback">🤑🤖🐿️🛤️🛍️</td>
                    <td class="emoji-outlined">🤑🤖🐿️🛤️🛍️</td>
                    <td class="emoji-outlined-fallback">🤑🤖🐿️🛤️🛍️</td>
                </tr>
                <tr>
                    <td>Earlier (before Unicode 7.0 and 8.0)</td>
                    <td class="emoji-colored">😀🔰💯⏩✅</td>
                    <td class="emoji-colored-fallback">😀🔰💯⏩✅</td>
                    <td class="emoji-outlined">😀🔰💯⏩✅</td>
                    <td class="emoji-outlined-fallback">😀🔰💯⏩✅</td>
                </tr>
            </table>
            <i>Modern emoji examples are partially provided by <a href="https://developer.android.com/develop/ui/views/text-and-emoji/emoji2" target="_blank">Android Open Source Project</a>.</i>
            <p>
                Emoji designs are often updated over time. However, one significant change happened in 2018, where emoji designers from Apple, Google, Microsoft, Samsung, and Twitter agreed to standardize how their emojis look and feel across different apps and operating systems.
            </p>
            <p>
                Remember <strong>Problem #1</strong> before (“Older operating systems may bundle outdated or inconsistent emojis”)? To check whether your browser or operating system is still using outdated color emoji designs, try looking at your 💟 and 🔫 against the following correct and incorrect/outdated examples.
            </p>
            <table id="modern-emoji-design-update" border="1" class="emoji-table">
                <tr>
                    <th rowspan="2">Emoji Name</th>
                    <th colspan="2">Examples</th>
                    <th rowspan="2">Your Turn</th>
                </tr>
                <tr>
                    <th>Correct</th>
                    <th>Incorrect/Outdated</th>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/heart-decoration" target="_blank">Heart Decoration</a></td>
                    <td>
                        <img alt="Heart Decoration emoji as rendered on current Apple devices" src="https://em-content.zobj.net/thumbs/72/apple/354/heart-decoration_1f49f.png" height="48" width="48" />
                        <img alt="Heart Decoration emoji as rendered on current Google and Linux devices" src="https://em-content.zobj.net/thumbs/72/google/350/heart-decoration_1f49f.png" height="48" width="48" />
                        <img alt="Heart Decoration emoji as rendered on current Microsoft devices" src="https://em-content.zobj.net/thumbs/72/microsoft/319/heart-decoration_1f49f.png" height="48" width="48" />
                        <img alt="Heart Decoration emoji as rendered on current Samsung devices" src="https://em-content.zobj.net/thumbs/72/samsung/349/heart-decoration_1f49f.png" height="48" width="48" />
                    </td>
                    <td>
                        <img alt="Heart Decoration emoji as rendered on earlier Google and Linux devices" src="https://em-content.zobj.net/thumbs/72/google/56/heart-decoration_1f49f.png" height="48" width="48" />
                        <img alt="Heart Decoration emoji as rendered on earlier HTC devices" src="https://em-content.zobj.net/thumbs/72/htc/37/heart-decoration_1f49f.png" height="48" width="48" />
                        <img alt="Heart Decoration emoji as rendered on earlier Microsoft devices" src="https://em-content.zobj.net/thumbs/72/microsoft/74/heart-decoration_1f49f.png" height="48" width="48" />
                        <img alt="Heart Decoration emoji as rendered on earlier Samsung devices" src="https://em-content.zobj.net/thumbs/72/samsung/128/heart-decoration_1f49f.png" height="48" width="48" />
                    </td>
                    <td class="emoji-colored text-48px text-center">💟</td>
                </tr>
                <tr>
                    <td><a href="https://emojipedia.org/pistol" target="_blank">Pistol</a></td>
                    <td>
                        <img alt="Pistol emoji as rendered on current Apple devices" src="https://em-content.zobj.net/thumbs/72/apple/354/pistol_1f52b.png" height="48" width="48" />
                        <img alt="Pistol emoji as rendered on current Google and Linux devices" src="https://em-content.zobj.net/thumbs/72/google/350/pistol_1f52b.png" height="48" width="48" />
                        <img alt="Pistol emoji as rendered on current Microsoft devices" src="https://em-content.zobj.net/thumbs/72/microsoft/319/pistol_1f52b.png" height="48" width="48" />
                        <img alt="Pistol emoji as rendered on current Samsung devices" src="https://em-content.zobj.net/thumbs/72/samsung/349/pistol_1f52b.png" height="48" width="48" />
                    </td>
                    <td>
                        <img alt="Pistol emoji as rendered on earlier Samsung devices"src="https://em-content.zobj.net/thumbs/72/apple/51/pistol_1f52b.png" height="48" width="48" />
                        <img alt="Pistol emoji as rendered on earlier Google and Linux devices" src="https://em-content.zobj.net/thumbs/72/google/6/pistol_1f52b.png" height="48" width="48" />
                        <img alt="Pistol emoji as rendered on earlier Microsoft devices" src="https://em-content.zobj.net/thumbs/72/microsoft/54/pistol_1f52b.png" height="48" width="48" />
                        <img alt="Pistol emoji as rendered on earlier Samsung devices" src="https://em-content.zobj.net/thumbs/72/samsung/78/pistol_1f52b.png" height="48" width="48" />
                    </td>
                    <td class="emoji-colored text-48px text-center">🔫</td>
                </tr>
            </table>
            <i>Color emoji samples provided by vendors and collected by <a href="https://emojipedia.org" target="_blank">Emojipedia</a>.</i>
        </div>
    </section>
</body>
</html>