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
                <a href="https://reinhart1010.id/blog/2023/01/13/site-and-infrastructure-updates-january-2023-edition/"><strong>January 2023:</strong> 12</a><br>
                <p>(LINE, WhatsApp, Twitter, Telegram, Facebook, LinkedIn, tumblr, Pinterest, Flipboard, Pocket, Reddit, Email)</p>
            </li>
            <li>
                <a href="https://github.com/1010bots/T-3000/commit/86a2f9da4b4e79dcfdd29a867cb2f1992a55de68/"><strong>July 2023:</strong> 22</a><br>
                <p>(<strong>Web Share API</strong>, <strong>Copy Link</strong>, Email, <strong>WordPress</strong>, Twitter, Telegram, Facebook, LinkedIn, tumblr, <strong>Mastodon</strong>, <strong>Messenger</strong>, Pinterest, Flipboard, Pocket, Reddit, <strong>Blogger</strong>, <strong>Pleroma</strong>, <strong>Friendica</strong>, <strong>Misskey</strong>, WhatsApp, LINE, <strong>Evernote</strong>)</p>
            </li>
            <li>
                <a href="https://github.com/1010bots/T-3000/commit/86e6a68bb0419f404d98ac62bac77dca3e9ad213"><strong>August 2023:</strong> 26</a><br>
                <p>(Web Share API, Copy Link, <strong>Embed</strong>, Email, WordPress, Twitter, Telegram, Facebook, LinkedIn, tumblr, <strong>X</strong>, Mastodon, <strong>KakaoStory</strong>,  Messenger, Pinterest, Flipboard, Pocket, Reddit, Blogger, Pleroma, Friendica, <strong>KakaoTalk</strong>, Misskey, WhatsApp, LINE, Evernote)</p>
            </li>
            <li>
                <a href="https://github.com/1010bots/T-3000/commit/6c7e0ed90ba3af0f73f93031cfa3021f511de99e"><strong>October 2023:</strong> 33</a><br>
                <p class="font-semicondensed">(Web Share API, Copy Link, <strong>Print</strong>, <strong>PDF</strong>, Embed, Email, WordPress, <strong>Skype</strong>, Twitter, Telegram, Facebook, LinkedIn, <strong>Buffer</strong>, tumblr, <strong>diaspora*</strong>, X, Mastodon, KakaoStory, Messenger, Pinterest, Flipboard, Pocket, Reddit, <strong>Hacker News</strong>, Blogger, Pleroma, Friendica, KakaoTalk, <strong>Snapchat</strong>, Misskey, WhatsApp, LINE, Evernote)</p>
            </li>
            <li>
                <a href="#"><strong>January 2024:</strong> 45</a><br>
                <p><strong>iOS, iPadOS, macOS:</strong> <span class="font-condensed">(Web Share API, Copy Link, Print, PDF, Embed, <strong>Yahoo! Mail</strong>, Mastodon, KakaoStory, Messenger (Facebook), Pinterest, Flipboard, Pocket, Reddit, Hacker News, <strong>Odnoklassniki</strong>, Blogger, Pleroma, Friendica, KakaoTalk, Snapchat, Misskey, <strong>XING</strong>, <strong>Messages (iMessage)</strong>, LINE, Evernote, WhatsApp, <strong>LiveJournal</strong>, diaspora*, <strong>Gmail</strong>, <strong>Threads</strong>, <strong>Threema</strong>, X, tumblr, Buffer, LinkedIn, <strong>mail.ru</strong>, <strong>VKontakte</strong>, <strong>Trello</strong>, Facebook, Mail (Email), Skype, <strong>Hatena Bookmark!</strong>, Twitter, Telegram, WordPress)</span></p>
                <p><strong>Other platforms (Android, Linux, Windows, etc.):</strong> <span class="font-condensed">(Web Share API, Copy Link, Print, PDF, Embed, Email, <strong>SMS</strong>, <strong>Yahoo! Mail</strong>, Mastodon, KakaoStory, Messenger (Facebook), Pinterest, Flipboard, Pocket, Reddit, Hacker News, <strong>Odnoklassniki</strong>, Blogger, Pleroma, Friendica, KakaoTalk, Snapchat, Misskey, <strong>XING</strong>, LINE, Evernote, WhatsApp, <strong>LiveJournal</strong>, diaspora*, <strong>Gmail</strong>, <strong>Threads</strong>, <strong>Threema</strong>, X, tumblr, Buffer, LinkedIn, <strong>mail.ru</strong>, <strong>VKontakte</strong>, <strong>Trello</strong>, Facebook, Skype, <strong>Hatena Bookmark!</strong>, Twitter, Telegram, WordPress)</span></p>
            </li>
        </ol>
    </main>
</x-app-layout>
