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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&family=Noto+Emoji&display=swap" rel="stylesheet" type="text/css" />
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
        #emoji-table {
            display: block;
            max-width: 100%;
            overflow-x: auto;
        }
        #emoji-table td, #emoji-table th {
            min-width: 7rem;
        }
        .emoji-colored {
            font-family: "Apple Color Emoji", "Segoe UI Emoji", "Noto Color Emoji Flags", "Noto Color Emoji System", TwemojiMozilla, EmojiOneMozilla, Tofu;
        }
        .emoji-colored-fallback {
            font-family: "Apple Color Emoji", "Segoe UI Emoji", "Noto Color Emoji Flags", "Noto Color Emoji", TwemojiMozilla, EmojiOneMozilla, Tofu;
        }
        .emoji-outlined {
            font-family: "Segoe UI Symbol", "Noto Emoji System", Symbola, Tofu;
        }
        .emoji-outlined-fallback {
            font-family: "Segoe UI Symbol", "Noto Emoji", Symbola, Tofu;
        }
    </style>
</head>
<body>
    <h1>Web Browser Compatibility Test</h1>
    <p>
        This site is designed with modern web feature detection standards, that is, by not complaining you for not using Google Chrome.
        <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Browser_detection_using_the_user_agent" target="_blank">Learn more</a>
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
            Our site heavily uses <a href="https://developer.mozilla.org/en-US/docs/Learn/CSS/CSS_layout/Flexbox" target="_blank">CSS Flexbox</a> and <a href="https://developer.mozilla.org/en-US/docs/Learn/CSS/CSS_layout/Grids" target="_blank">CSS Grid</a> to render content. While Flexbox has been <a href="https://caniuse.com/flexbox" target="_blank">supported</a> in all major web browsers (including Internet Explorer 11!), CSS Grid are supported starting in latter versions of web browsers, such as:
            <ul>
                <li>Chrome 57</li>
                <li>Firefox 52</li>
                <li>Microsoft Edge (Legacy) 16</li>
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
        <div id="modern-emoji" aria-describedby="modern-emoji-title">
            <h3 id="modern-emoji-title">Modern Emoji</h3>
            <p>Some of our blog posts contain emojis, and we prefer to use your <a href="https://simple.wikipedia.org/wiki/Operating_system" target="_blank">operating system</a>-provided emoji fonts as possible. However,
                <ol>
                    <li><strong>Older operating systems (especially Android) may bundle outdated or inconsistent emojis as compared to others,</strong> like <a href="https://www.theguardian.com/technology/2017/sep/06/why-are-samsung-emojis-different-from-everyone-else?ref=reinhart1010.id" target="_blank">this case for Samsung</a> (which is also why we don’t include Samsung Color Emoji on our system font stack).</li>
                    <li><strong>Microsoft intentionally does not support country flag emojis,</strong> even in the latest version of Windows 11. This is also why Mozilla decided to bundle <a href="https://github.com/mozilla/twemoji-colr" target="_blank">another emoji font</a> for Firefox for Windows.</li>
                </ol>
                You can check for yourself how well your web browser and operating system renders modern emoji well, from old to new.
                <strong>There should be EXACTLY five emojis without any rectangular boxes visible, for each emoji versions and variants to completely pass this test.</strong>
            </p>
            <table border="1" id="emoji-table">
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
        </div>
    </section>
</body>
</html>