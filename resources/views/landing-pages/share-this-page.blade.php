<x-app-layout theme-color="seafoam" title="Share Buttons">
    <script>
        function updateFontPreview() {
            italic = document.getElementById("font-italic").checked;
            size = document.getElementById("font-size").value;
            width = document.getElementById("font-width").value;
            weight = document.getElementById("font-weight").value;
            preview = document.getElementById("font-tester");

            preview.style.fontSize = size + "px";
            preview.style.fontStretch = width + "%";
            preview.style.fontWeight = weight;
            preview.style.fontStyle = italic ? "italic" : "";
        }

        window.addEventListener('load', function () {
            document.getElementById("font-size").value = Math.min(Math.max(window.innerWidth / 20, 24), 64);
            console.log(Math.max(window.innerWidth / 20, 24));
            updateFontPreview();
        });
    </script>
    <main class="flex flex-col gap-4 px-safe-offset-6 py-6 text-center text-black dark:text-white">
        <h1 class="text-4xl font-semibold">Share Buttons!</h1>
        <p>Here are our full set of share buttons. And we’ve just defeated <a href="https://neal.fun/share-this-page/" class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Neal</a> in terms of how many buttons we’d like to put here.</p>
        <x-share-buttons title="Share buttons" description="Our exquisite share buttons" />
        <p>You can also test out the share buttons below, which does not include the article descriptions. We are constantly test out the share buttons here.</p>
        <x-share-buttons title="Share buttons" />
        <h2 class="text-3xl font-semibold">How much button is enough?</h2>
        <ol class="flex flex-col gap-4">
            <li>
                <a href="https://reinhart1010.id/blog/2023/01/13/site-and-infrastructure-updates-january-2023-edition/"><strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">January 2023:</strong> 12</a><br>
                <p>(LINE, WhatsApp, Twitter, Telegram, Facebook, LinkedIn, tumblr, Pinterest, Flipboard, Pocket, Reddit, Email)</p>
            </li>
            <li>
                <a href="https://github.com/1010bots/T-3000/commit/86a2f9da4b4e79dcfdd29a867cb2f1992a55de68/"><strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">July 2023:</strong> 22</a><br>
                <p>(<strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Web Share API</strong>, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Copy Link</strong>, Email, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">WordPress</strong>, Twitter, Telegram, Facebook, LinkedIn, tumblr, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Mastodon</strong>, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Messenger</strong>, Pinterest, Flipboard, Pocket, Reddit, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Blogger</strong>, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Pleroma</strong>, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Friendica</strong>, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Misskey</strong>, WhatsApp, LINE, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Evernote</strong>)</p>
            </li>
            <li>
                <a href="https://github.com/1010bots/T-3000/commit/86e6a68bb0419f404d98ac62bac77dca3e9ad213"><strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">August 2023:</strong> 26</a><br>
                <p>(Web Share API, Copy Link, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Embed</strong>, Email, WordPress, Twitter, Telegram, Facebook, LinkedIn, tumblr, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">X</strong>, Mastodon, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">KakaoStory</strong>,  Messenger, Pinterest, Flipboard, Pocket, Reddit, Blogger, Pleroma, Friendica, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">KakaoTalk</strong>, Misskey, WhatsApp, LINE, Evernote)</p>
            </li>
            <li>
                <a href="https://github.com/1010bots/T-3000/commit/6c7e0ed90ba3af0f73f93031cfa3021f511de99e"><strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">October 2023:</strong> 33</a><br>
                <p class="font-semicondensed">(Web Share API, Copy Link, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Print</strong>, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">PDF</strong>, Embed, Email, WordPress, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Skype</strong>, Twitter, Telegram, Facebook, LinkedIn, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Buffer</strong>, tumblr, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">diaspora*</strong>, X, Mastodon, KakaoStory, Messenger, Pinterest, Flipboard, Pocket, Reddit, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Hacker News</strong>, Blogger, Pleroma, Friendica, KakaoTalk, <strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Snapchat</strong>, Misskey, WhatsApp, LINE, Evernote)</p>
            </li>
            <li>
                <a href="#"><strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">January 2024:</strong> 45</a><br>
                <p><strong class="font-bold text-dm-blue-500 dark:text-dm-blue-200">iOS, iPadOS, macOS, visionOS:</strong> <span class="font-semicondensed">(Web Share API, Copy Link, Print, PDF, Embed, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">Yahoo! Mail</strong>, Mastodon, KakaoStory, Messenger (Facebook), Pinterest, Flipboard, Pocket, Reddit, Hacker News, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">Odnoklassniki</strong>, Blogger, Pleroma, Friendica, KakaoTalk, Snapchat, Misskey, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">XING</strong>, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">Messages (iMessage)</strong>, LINE, Evernote, WhatsApp, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">LiveJournal</strong>, diaspora*, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">Gmail</strong>, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">Threads</strong>, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">Threema</strong>, X, tumblr, Buffer, LinkedIn, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">mail.ru</strong>, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">VKontakte</strong>, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">Trello</strong>, Facebook, Mail (Email), Skype, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">Hatena Bookmark!</strong>, Twitter, Telegram, WordPress)</span></p>
                <p><strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Other platforms (Android, Linux, Windows, etc.):</strong> <span class="font-semicondensed">(Web Share API, Copy Link, Print, PDF, Embed, Email, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">SMS</strong>, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Yahoo! Mail</strong>, Mastodon, KakaoStory, Messenger (Facebook), Pinterest, Flipboard, Pocket, Reddit, Hacker News, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Odnoklassniki</strong>, Blogger, Pleroma, Friendica, KakaoTalk, Snapchat, Misskey, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">XING</strong>, LINE, Evernote, WhatsApp, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">LiveJournal</strong>, diaspora*, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Gmail</strong>, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Threads</strong>, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Threema</strong>, X, tumblr, Buffer, LinkedIn, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">mail.ru</strong>, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">VKontakte</strong>, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Trello</strong>, Facebook, Skype, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Hatena Bookmark!</strong>, Twitter, Telegram, WordPress)</span></p>
            </li>
            <li>
                <a href="#"><strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">May 2024:</strong> 47</a><br>
                <p><strong class="font-bold text-dm-blue-500 dark:text-dm-blue-200">iOS, iPadOS, macOS, visionOS:</strong> <span class="font-condensed">(Web Share API, Copy Link, Print, PDF, Embed, Yahoo! Mail, Mastodon, KakaoStory, Messenger (Facebook), Pinterest, Flipboard, Pocket, Reddit, Hacker News, Odnoklassniki, Blogger, Pleroma, Friendica, KakaoTalk, Snapchat, Misskey, XING, Messages (iMessage), LINE, Evernote, WhatsApp, LiveJournal, diaspora*, Gmail, Threads, Threema, X, tumblr, Buffer, LinkedIn, mail.ru, VKontakte, Trello, Facebook, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">Bluesky</strong>, Mail (Email), Skype, Hatena Bookmark!, Twitter, <strong class="font-no-condensed font-bold text-dm-blue-500 dark:text-dm-blue-200">MastodonShare</strong>, Telegram, WordPress)</span></p>
                <p><strong class="font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Other platforms (Android, Linux, Windows, etc.):</strong> <span class="font-condensed">(Web Share API, Copy Link, Print, PDF, Embed, Email, SMS, Yahoo! Mail, Mastodon, KakaoStory, Messenger (Facebook), Pinterest, Flipboard, Pocket, Reddit, Hacker News, Odnoklassnik, Blogger, Pleroma, Friendica, KakaoTalk, Snapchat, Misskey, XING, LINE, Evernote, WhatsApp, LiveJournal, diaspora*, Gmail, Threads, Threema, X, tumblr, Buffer, LinkedIn, mail.ru, VKontakte, Trello, Facebook, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">Bluesky</strong>, Skype, Hatena Bookmark!, Twitter, <strong class="font-no-condensed font-bold text-dm-seafoam-500 dark:text-dm-seafoam-200">MastodonShare</strong>, Telegram, WordPress)</span></p>
            </li>
        </ol>
    </main>
</x-app-layout>
