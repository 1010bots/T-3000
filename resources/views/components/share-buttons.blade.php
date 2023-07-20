<?php
    use Illuminate\Support\Facades\Request;
    use Jenssegers\Agent\Agent;

    $agent = new Agent();
    $agent->setUserAgent(Request::header('User-Agent'));
    $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $allow_kakao = Request::cookie('optional_features_kakao') == true;
    $user_agent = Request::header('User-Agent');
    $unique_id = $chars[rand(0, 61)] . $chars[rand(0, 61)] . $chars[rand(0, 61)] . $chars[rand(0, 61)] . $chars[rand(0, 61)] . $chars[rand(0, 61)];
    if (!isset($title_and_description)) {
        $title_and_description = $title;
        if (isset($description)) $title_and_description .= ' ' . $description;
    }

    // Provide defaults for undefined characters
    if (!isset($url) || !$url) $url = Request::url();
?>
<div class="flex flex-wrap gap-2 {{ $class ?? '' }}">
    <a id="{{ $unique_id }}-share-menu-open-share-sheet" class="text-center text-black bg-holo holo-force holo-global holo-interactive border-0 py-2 rounded-full leading-4 cursor-pointer" style="width: 88px;">
        @if ($agent->isiOS() || $agent->isiPadOS() || $agent->is('OS X'))
            <x-fluentui-share-ios-24-o height="24" width="24" class="inline-block" />
        @elseif ($agent->is('Windows'))
            <x-fluentui-share-24-o height="24" width="24" class="inline-block" />
        @else
            <x-fluentui-share-android-24-o height="24" width="24" class="inline-block" />
        @endif
        <span class="align-middle" aria-hidden="true">/</span>
        <x-fluentui-copy-24-o height="24" width="24" class="inline-block" />
        <span class="sr-only">Share</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-copy-link" class="text-center text-black bg-holo holo-force holo-global holo-interactive border-0 p-2 rounded-full leading-4 cursor-pointer" style="width: 88px;">
        <x-fluentui-link-24-o height="24" width="24" class="inline-block" />
        <span class="align-middle">Link</span>
    </a>
    <!-- <a  id={`${uniqueId}-share-menu-embed"   class="text-center btn-disabled text-black bg-holo holo-force holo-global holo-interactive border-0 p-2 rounded-full leading-4">
        <x-fluentui-code-24-o height="24" width="24" />
        <span class="sr-only">Embed</span>
    </a> -->
    <a class="text-center text-black bg-holo holo-force holo-global holo-interactive border-0 p-2 rounded-full leading-4" href="mailto:?subject={{ $title }}&body={{ $description }}\n\n{{ $url }}" target="_blank">
        <x-fluentui-mail-add-24-o height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Email</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #00aadc; color: #ffffff;" href="https://wordpress.com/press-this.php?u={{ $url }}&t={{ $title }}&s={{ $description }}" target="_blank">
        <x-simpleicon-wordpress height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to WordPress</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #1da1f2; color: #ffffff;" href="https://twitter.com/share?text={{ $title }}&url={{ $url }}" target="_blank">
        <x-simpleicon-twitter height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Twitter</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #1da1f2; color: #ffffff;" href="https://telegram.me/share/url?url={{ $url }}&text={{ $title_and_description }}"  target="_blank">
        <x-simpleicon-telegram height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Telegram</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #1877f2; color: #ffffff;" href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}&title={{ $title }}"  target="_blank">
        <x-simpleicon-facebook height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Facebook</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #0a66c2; color: #ffffff;" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $url }}&title={{ $title }}"  target="_blank">
        <x-simpleicon-linkedin height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to LinkedIn</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #011935; color: #ffffff;" href="http://tumblr.com/widgets/share/tool?canonicalUrl={{ $url }}&title={{ $title }}"  target="_blank">
        <x-simpleicon-tumblr height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Tumblr</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #563ACB; color: #ffffff;" href="https://mastodonshare.com/?text={{ $title_and_description }}&url={{ $url }}"  target="_blank">
        <x-simpleicon-mastodon height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Mastodon</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background: radial-gradient(circle at 0 100%, rgba(0,132,255,1) 10%, rgba(64,93,230,1) 30%, rgba(88,81,219,1) 50%, rgba(131,58,180,1) 70%, rgba(245,96,64,1) 90%, rgba(252,175,69,1) 100%); color: #ffffff;" href="http://www.facebook.com/dialog/send?app_id=1469324230012506&link={{ $url }}&redirect_uri={{ $url }}"  target="_blank">
        <x-simpleicon-messenger height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Messenger</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #bd081c; color: #ffffff;" href="https://pinterest.com/pin/create/button/?&url={{ $url }}&media="  target="_blank">
        <x-simpleicon-pinterest height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Pinterest</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #e12828; color: #ffffff;" href="https://share.flipboard.com/bookmarklet/popout?url={{ $url }}&title={{ $title }}"  target="_blank">
        <x-simpleicon-flipboard height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Flipboard</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #ef4056; color: #ffffff;" href="https://getpocket.com/save/?url={{ $url }}&title={{ $title }}"  target="_blank">
        <x-simpleicon-pocket height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Pocket</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #FF4500; color: #ffffff;" href="https://www.reddit.com/submit?url={{ $url }}&title={{ $title }}"  target="_blank">
        <x-simpleicon-reddit height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Reddit</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #F47C01; color: #ffffff;" href="https://www.blogger.com/blog-this.g?u={{ $url }}&n={{ $title }}&t={{ $description }}"  target="_blank">
        <x-simpleicon-blogger height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Blogger</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #FBA457; color: #ffffff;" href="https://mastodonshare.com/?text={{ $title_and_description }}&url={{ $url }}"  target="_blank">
        <x-simpleicon-pleroma height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Pleroma</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #FEBF19; color: #ffffff;" href="https://mastodonshare.com/?text={{ $title_and_description }}&url={{ $url }}"  target="_blank">
        <x-icons.friendica height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Friendica</span>
    </a>
    {{-- <span id="${uniqueId}-share-menu-kakao-story" />
    <a id="${uniqueId}-share-menu-kakao-talk" class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #FAE100; color: #3C1D1E;" target="_blank">
        <Icon pack="ri" name="kakao-talk-fill" height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to KakaoTalk</span>
    </a> --}}
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #9EC23F; color: #ffffff;" href="https://mastodonshare.com/?text={{ $title_and_description }}&url={{ $url }}"  target="_blank">
        <x-icons.misskey height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Misskey</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #25d366; color: #ffffff;" href="https://api.whatsapp.com/send?text={{ $title_and_description }}\n{{ $url }}"  target="_blank">
        <x-simpleicon-whatsapp height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to WhatsApp</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #06c755; color: #ffffff;" href="https://lineit.line.me/share/ui?url={{ $url }}&text={{ $title_and_description }}"  target="_blank">
        <x-simpleicon-line height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to LINE</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:brightness-75 hover:brightness-75 active:contrast-200 hover:contrast-200" style="background-color: #00A82C; color: #ffffff;" href="https://www.evernote.com/clip.action?url={{ $url }}&title={{ $title }}"  target="_blank">
        <x-simpleicon-evernote height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Evernote</span>
    </a>
    <script>
        const title = "{{ $title }}", description = "{{ $description }}", url = "{{ $url }}";
        function fallbackCopyTextToClipboard(text) {
            var textArea = document.createElement("textarea");
            textArea.value = text;
            
            // Avoid scrolling to bottom
            textArea.style.top = "0";
            textArea.style.left = "0";
            textArea.style.position = "fixed";

            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Fallback: Copying text command was ' + msg);
            } catch (err) {
                console.error('Fallback: Oops, unable to copy', err);
            }

            document.body.removeChild(textArea);
        }
        function copyTextToClipboard(text) {
            if (!navigator.clipboard) {
                fallbackCopyTextToClipboard(text);
                return;
            }
            navigator.clipboard.writeText(text).then(function() {
                console.log('Async: Copying to clipboard was successful!');
            }, function(err) {
                console.error('Async: Could not copy text: ', err);
            });
        }

        document.getElementById("{{ $unique_id }}-share-menu-open-share-sheet")?.addEventListener('click', () => {
            if (navigator.share) {
            navigator.share({
                title: title,
                text: description,
                url: url,
            });
            } else {
            copyTextToClipboard(title + "\n\n" + description + "\n\n" + url);
            }
        });

        document.getElementById("{{ $unique_id }}-share-menu-copy-link")?.addEventListener('click', () => {
            copyTextToClipboard(url);
        });
    </script>
</div>
