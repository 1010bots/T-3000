<?php
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Request;
    use Jenssegers\Agent\Agent;

    $agent = new Agent();
    $agent->setUserAgent(Request::header('User-Agent'));
    $is_apple = $agent->isiOS() || $agent->isiPadOS() || $agent->is('OS X');
    if (!isset($canonical)) $canonical = Request::url();
    $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $allow_kakao = Request::cookie('optional_features_kakao') == true;
    $user_agent = Request::header('User-Agent');
    $unique_id = $chars[rand(0, 61)] . $chars[rand(0, 61)] . $chars[rand(0, 61)] . $chars[rand(0, 61)] . $chars[rand(0, 61)] . $chars[rand(0, 61)];
    if (!isset($description)) {
        $description = "";
    }
    if (!isset($title_and_description)) {
        $title_and_description = $title;
        if (isset($description)) $title_and_description .= ' ' . $description;
    }

    // Provide defaults for undefined characters
    if (!isset($url) || !$url) $url = Request::url();

    $embed_html = '<iframe src="' . $canonical . '?embed" height="512" width="512" style="border:none;"><a href="{{ $canonical }}">' . $canonical . '</a></iframe>';
?>
<div class="flex flex-col flex-wrap gap-2 h-40 py-2 max-w-full overflow-x-scroll scrollbar-hidden {{ $class ?? '' }}">
    <a id="{{ $unique_id }}-share-menu-open-share-sheet" class="text-center text-black dark:text-white bg-rc-violet-50 dark:bg-dm-violet-700 border-0 py-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200">
        @if ($is_apple)
            <x-fluentui-share-ios-24-o height="24" width="24" class="inline-block" />
        @elseif ($agent->is('Windows'))
            <x-fluentui-share-24-o height="24" width="24" class="inline-block" />
        @else
            <x-fluentui-share-android-24-o height="24" width="24" class="inline-block" />
        @endif
        <span class="sr-only">Share</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-copy-link" class="text-center text-black dark:text-white bg-rc-violet-50 dark:bg-dm-violet-700 border-0 p-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200">
        <x-fluentui-copy-24-o height="24" width="24" class="inline-block" />
        <span class="sr-only">Copy Link</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-print" class="text-center text-black dark:text-white bg-rc-violet-50 dark:bg-dm-violet-700 border-0 p-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" href="{{ $url }}?print">
        <x-fluentui-print-24-o height="24" width="24" class="inline-block" />
        <span class="sr-only">Print</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-pdf" class="text-center text-black dark:text-white bg-rc-violet-50 dark:bg-dm-violet-700 border-0 p-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" href="{{ $url }}?pdf">
        <x-fluentui-document-pdf-24-o height="24" width="24" class="inline-block" />
        <span class="sr-only">PDF</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-embed" class="text-center text-black dark:text-white bg-rc-violet-50 dark:bg-dm-violet-700 border-0 p-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200">
        <x-fluentui-code-24-o height="24" width="24" class="inline-block" />
        <span class="sr-only">Embed</span>
    </a>
    @if (!$is_apple)
    <a class="text-center text-black dark:text-white bg-rc-violet-50 dark:bg-dm-violet-700 border-0 p-2 rounded-full leading-4 horizontal-tb active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" href="mailto:?subject={{ $title }}&body={{ $description }}%0A%0A{{ $url }}" target="_blank">
        <x-fluentui-mail-add-24-o height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Email</span>
    </a>
    @endif
    @if (!$is_apple)
    <a class="text-center text-black dark:text-white bg-rc-violet-50 dark:bg-dm-violet-700 border-0 p-2 rounded-full leading-4 horizontal-tb active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" href="sms:?body={{ $title_and_description }}%0A%0A{{ $url }}" target="_blank">
        <x-fluentui-chat-24-o height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to SMS</span>
    </a>
    @endif
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #6001d2; color: #ffffff;" href="https://compose.mail.yahoo.com/?subject={{ $title }}&body={{ $title_and_description }}%0A%0A{{ $url }}" target="_blank">
        <x-simpleicon-yahoo height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Yahoo! Mail</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-mastodon" class="text-center border-0 p-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #563ACB; color: #ffffff;" target="_blank">
        <x-simpleicon-mastodon height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Mastodon</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-kakao-story" class="text-center border-0 p-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #6A5CFF; color: #FFFFFF;" target="_blank">
        <x-icons.kakaostory height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to KakaoStory</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-purple-200 dark:active:ring-dm-purple-200 hover:ring-dm-purple-200 dark:hover:ring-dm-purple-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background: radial-gradient(circle at 0 100%, rgba(0,132,255,1) 10%, rgba(64,93,230,1) 30%, rgba(88,81,219,1) 50%, rgba(131,58,180,1) 70%, rgba(245,96,64,1) 90%, rgba(252,175,69,1) 100%); color: #ffffff;" href="http://www.facebook.com/dialog/send?app_id=1469324230012506&link={{ $url }}&redirect_uri={{ $url }}" target="_blank">
        <x-simpleicon-messenger height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Messenger</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #ef4056; color: #ffffff;" href="https://getpocket.com/save/?url={{ $url }}&title={{ $title }}" target="_blank">
        <x-simpleicon-pocket height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Pocket</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #e12828; color: #ffffff;" href="https://share.flipboard.com/bookmarklet/popout?url={{ $url }}&title={{ $title }}" target="_blank">
        <x-simpleicon-flipboard height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Flipboard</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #bd081c; color: #ffffff;" href="https://pinterest.com/pin/create/button/?&url={{ $url }}{{ isset($attributes['cover-image-url']) ? ("&media=" . $attributes['cover-image-url']) : "" }}" target="_blank">
        <x-simpleicon-pinterest height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Pinterest</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #FF4500; color: #ffffff;" href="https://www.reddit.com/submit?url={{ $url }}&title={{ $title }}" target="_blank">
        <x-simpleicon-reddit height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Reddit</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #FF6600; color: #ffffff;" href="https://news.ycombinator.com/submitlink?u={{ $url }}&t={{ $title_and_description }}" target="_blank">
        <x-simpleicon-ycombinator height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Hacker News</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #FF7701; color: #ffffff;" href="https://connect.ok.ru/offer?title={{ $title }}&url={{ $url }}{{ isset($attributes['cover-image-url']) ? ("&imageUrl=" . $attributes['cover-image-url']) : "" }}" target="_blank">
        <x-simpleicon-odnoklassniki height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Odnoklassniki</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #F47C01; color: #ffffff;" href="https://www.blogger.com/blog-this.g?u={{ $url }}&n={{ $title }}{{ strlen($description) > 0 ? ("&t=" . $description) : "" }}" target="_blank">
        <x-simpleicon-blogger height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Blogger</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-pleroma" class="text-center border-0 p-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #FBA457; color: #ffffff;" target="_blank">
        <x-simpleicon-pleroma height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Pleroma</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-friendica" class="text-center border-0 p-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #FEBF19; color: #ffffff;" target="_blank">
        <x-icons.friendica height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Friendica</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-kakao-talk" class="text-center border-0 p-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #FAE100; color: #3C1D1E;" target="_blank">
        <x-ri-kakao-talk-fill height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to KakaoTalk</span>
    </a>
    @if (strlen(env('SNAPCHAT_APP_ID')) > 0)
        <a id="{{ $unique_id }}-share-menu-snapchat" class="text-center border-0 p-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #FBFE00; color: #FFFFFF;" href="https://www.snapchat.com/scan?attachmentUrl=https://reinhart1010.id{{ Request::getRequestUri() }}" target="_blank">
            <x-icons.snapchat height="24" width="24" class="inline-block" />
            <span class="sr-only">Share to Snapchat</span>
        </a>
    @endif
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #C7F16D; color: #000000;" href="https://www.xing.com/social/share/spi?url={{ $url }}" target="_blank">
        <x-simpleicon-xing height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Xing</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-misskey" class="text-center border-0 p-2 rounded-full leading-4 cursor-pointer active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #9EC23F; color: #ffffff;" target="_blank">
        <x-icons.misskey height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Misskey</span>
    </a>
    @if ($is_apple)
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background: linear-gradient(0deg, rgba(12,189,42,1) 0%, rgba(91,246,117,1) 100%); color: #ffffff;" href="sms:?body={{ $title_and_description }}%0A%0A{{ $url }}" target="_blank">
        <x-icons.imessage height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Messages</span>
    </a>
    @endif
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #06c755; color: #ffffff;" href="https://lineit.line.me/share/ui?url={{ $url }}&text={{ $title_and_description }}" target="_blank">
        <x-simpleicon-line height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to LINE</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #00A82C; color: #ffffff;" href="https://www.evernote.com/clip.action?url={{ $url }}&title={{ $title }}" target="_blank">
        <x-simpleicon-evernote height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Evernote</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #128c7e; color: #ffffff;" href="https://api.whatsapp.com/send?text={{ $title_and_description }}%0A%0A{{ $url }}" target="_blank">
        <x-simpleicon-whatsapp height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to WhatsApp</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #004359; color: #ffffff;" href="https://www.livejournal.com/update.bml?subject={{ $title_and_description }}&event={{ $url }}" target="_blank">
        <x-simpleicon-livejournal height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Livejournal</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #161616; color: #ffffff;" href="https://share.diasporafoundation.org/?title={{ $title }}&url={{ $url }}" target="_blank">
        <x-simpleicon-diaspora height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Diaspora</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #161616; color: #ffffff;" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=&su={{ $title }}&body={{ $title_and_description }}%0A%0A{{ $url }}&ui=2&tf=1&pli=1" target="_blank">
        <x-icons.gmail height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Gmail</span>
    </a>
    <a id="{{ $unique_id }}-share-menu-threads" class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #161616; color: #ffffff;" href="barcelona://create?text={{ $title_and_description }}%0A%0A{{ $url }}" target="_blank">
        <x-simpleicon-threads height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Threads</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #161616; color: #ffffff;" href="https://threema.id/compose?text={{ $title_and_description }}%0A%0A{{ $url }}" target="_blank">
        <x-simpleicon-threema height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Threema</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #161616; color: #ffffff;" href="https://X.com/share?text={{ $title }}&url={{ $url }}" target="_blank">
        <x-icons.x height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to X</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #011935; color: #ffffff;" href="http://tumblr.com/widgets/share/tool?canonicalUrl={{ $url }}&title={{ $title }}" target="_blank">
        <x-simpleicon-tumblr height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Tumblr</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #0F2066; color: #ffffff;" href="https://buffer.com/add?text={{ $title }}&url={{ $url }}" target="_blank">
        <x-simpleicon-buffer height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Buffer</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #0a66c2; color: #ffffff;" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $url }}&title={{ $title }}" target="_blank">
        <x-simpleicon-linkedin height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to LinkedIn</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #015FF9; color: #FF9E03;" href="http://connect.mail.ru/share?url={{ $url }}&title={{ $title }}{{ strlen($description) > 0 ? ("&description=" . $description) : "" }}" target="_blank">
        <x-simpleicon-maildotru height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to mail.ru</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #0077ff; color: #ffffff;" href="https://vk.com/share.php?url={{ $url }}&title={{ $title }}{{ isset($attributes['cover-image-url']) ? ("&imageUrl=" . $attributes['cover-image-url']) : "" }}" target="_blank">
        <x-simpleicon-vk height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to VKontakte</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #1877f2; color: #ffffff;" href="https://trello.com/add-card?mode=popup&url={{ $url }}&title={{ $title }}{{ strlen($description) > 0 ? ("&description=" . $description) : "" }}" target="_blank">
        <x-simpleicon-trello height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Trello</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #1877f2; color: #ffffff;" href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}&title={{ $title }}" target="_blank">
        <x-simpleicon-facebook height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Facebook</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background: linear-gradient(0deg, #59b9ff 0%, #0a7aff 100%); color: #ffffff;" href="https://bsky.app/intent/compose?text={{ $title_and_description }}%0A%0A{{ $url }}" target="_blank">
        <x-simpleicon-bluesky height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Bluesky</span>
    </a>
    @if ($is_apple)
    <a class="text-center text-white bg-dm-sky-500 border-0 p-2 rounded-full leading-4 horizontal-tb active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background: linear-gradient(0deg, rgba(28,200,251,1) 0%,rgba(28,112,240,1) 100%); color: #ffffff;" href="mailto:?subject={{ $title }}&body={{ $title_and_description }}%0A%0A{{ $url }}" target="_blank">
        <x-fluentui-mail-24 height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Mail</span>
    </a>
    @endif
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #00aff0; color: #ffffff;" href="https://web.skype.com/share?text={{ $title }}&url={{ $url }}" target="_blank">
        <x-simpleicon-skype height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Skype</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #00a5de; color: #ffffff;" href="http://b.hatena.ne.jp/entry/{{ $url }}" target="_blank">
        <x-simpleicon-hatenabookmark height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Hatena Bookmark!</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #2b90d9; color: #ffffff;" href="https://mastodonshare.com/?text={{ $title_and_description }}&url={{ $url }}" target="_blank">
        <x-icons.mastodonshare height="24" width="24" class="inline-block" />
        <span class="sr-only">Share via MastodonShare</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #0088cc; color: #ffffff;" href="https://telegram.me/share/url?url={{ $url }}&text={{ $title_and_description }}" target="_blank">
        <x-simpleicon-telegram height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to Telegram</span>
    </a>
    <a class="text-center border-0 p-2 rounded-full leading-4 active:ring-2 hover:ring-2 active:ring-offset-2 hover:ring-offset-2 active:ring-dm-violet-200 dark:active:ring-dm-violet-200 hover:ring-dm-violet-200 dark:hover:ring-dm-violet-200 dark:active:ring-offset-black dark:hover:ring-offset-black ease-out duration-200" style="background-color: #0087be; color: #ffffff;" href="https://wordpress.com/press-this.php?u={{ $url }}&t={{ $title }}{{ strlen($description) > 0 ? ("&s=" . $description) : "" }}" target="_blank">
        <x-simpleicon-wordpress height="24" width="24" class="inline-block" />
        <span class="sr-only">Share to WordPress.com</span>
    </a>
    <dialog id="{{ $unique_id }}-share-menu-embed-dialog" class="p-0 rounded-2xl bg-gray-100 dark:bg-gray-900 backdrop:bg-black/75 text-black dark:text-white border-0">
        <form method="dialog" class="flex space-x-3 w-full p-4">
            @if ($is_apple)
                <button>
                    <x-fluentui-dismiss-circle-24 aria-hidden="true" class="inline w-6 h-6 text-gr-red-400 active:text-red-600 focus:text-red-600 hover:text-red-600" />
                    <span class="sr-only">Close</span>
                </button>
            @endif
            <h1 class="grow font-serif text-2xl font-semibold">Embed</h1>
            @if (!$is_apple)
                <button><x-fluentui-dismiss-24 aria-hidden="true" class="inline w-6 h-6 text-dark dark:text-white active:text-gray-600 dark:active:text-gray-400 hover:text-gray-600 dark:hover:text-gray-400" /><span class="sr-only">Close</span></button>
            @endif
        </form>
        <div class="p-4">
            <p class="mb-4"><strong>This website supports oEmbed.</strong> To quickly use oEmbed, just copy this site's link to your oEmbed-supported apps and websites like WordPress.</p>
            <p class="my-4">Alternatively, copy and paste the HTML code below to embed this post in your website.</p>
            <div class="my-4 p-4 rounded-xl bg-gr-fuchsia-50/50 dark:bg-dm-fuchsia-900/50 hover:bg-gr-fuchsia-50 dark:hover:bg-gr-fuchsia-900 text-gr-fuchsia-900 dark:text-white border-2 border-gr-fuchsia-500 dark:border-dm-fuchsia-50 shadow-lg shadow-dm-fuchsia-400/50 dark:shadow-dm-fuchsia-200/50 hover:shadow-dm-fuchsia-200/75 dark:hover:shadow-dm-fuchsia-200/75 ease-out duration-200 will-change-auto hover:will-change-scroll" style="border-style: inset;">
                <span class="inline-block font-bold">($_ )!</span>
                We have made this thing responsive, but recommend at least <strong class="font-bold text-gr-fuchsia-600 dark:text-gr-fuchsia-300">512x512 pixels</strong> for best results.
            </div>
            <pre><code>{{ $embed_html }}</code></pre>
            <details>
                <summary>Preview</summary>
                {!! $embed_html !!}
            </details>
            <form method="dialog" class="my-4">
                <x-button type="button" id="{{ $unique_id }}-share-menu-embed-dialog-copy">Copy</x-button>
                <x-button>OK</x-button>
            </form>
        </div>
    </dialog>
    <script>
        // For GNU LibreJS
        // @license magnet:?xt=urn:btih:d3d9a9a6595521f9666a5e94cc830dab83b65699&dn=expat.txt Expat License (sometimes called MIT Licensed)
        function fallbackCopyTextToClipboard(text) {
            const title = "{{ $title }}", description = "{{ $description }}", url = "{{ $url }}";
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
            const title = "{{ $title }}", description = "{{ $description }}", url = "{{ $url }}";
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

        function htmlDecode(input){
            var e = document.createElement('div');
            e.innerHTML = input;
            return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
        }

        function shareToFediverse(service) {
            const title = "{{ $title }}", description = "{{ $description }}", url = "{{ $url }}";
            let host = window.prompt(`Enter your ${service} instance to continue.`);
            if (host.length > 0) {
                if (!host.startsWith("http://") && !host.startsWith("https://")) {
                    host = "https://" + host;
                }
                try {
                    let parsed = new URL(host);
                    window.open(`${parsed.hostName}/share?text=${title}%0A%0A${description}%0A%0A${url}`);
                } catch (e) {
                    window.alert(`Unable to share: ${host} is not a valid URL or hostname.`);
                }
            }
        }

        document.getElementById("{{ $unique_id }}-share-menu-open-share-sheet")?.addEventListener('click', () => {
            const title = "{{ $title }}", description = "{{ $description }}", url = "{{ $url }}";
            if (navigator.share) {
                navigator.share({
                    title: title,
                    text: description,
                    url: url,
                });
            } else if (confirm("(>_ ): Unable to share using your operating system's share sheet. Do you want to copy to clipboard instead?")) {
                copyTextToClipboard(title + "\n\n" + description + "\n\n" + url);
            }
        });

        document.getElementById("{{ $unique_id }}-share-menu-copy-link")?.addEventListener('click', () => {
            const url = "{{ $url }}";
            copyTextToClipboard(url);
        });

        document.getElementById("{{ $unique_id }}-share-menu-embed")?.addEventListener('click', () => {
            document.getElementById("{{ $unique_id }}-share-menu-embed-dialog")?.showModal();
        });

        document.getElementById("{{ $unique_id }}-share-menu-embed-dialog-copy")?.addEventListener('click', (e) => {
           e.preventDefault();
           copyTextToClipboard(htmlDecode("{{ $embed_html }}"));
        });

        document.getElementById("{{ $unique_id }}-share-menu-kakao-story")?.addEventListener('click', () => {
            if (window.confirm("(#_ )! By sharing to KakaoStory, your browser and operating system information will be sent to Kakao to redirect to the KakaoStory app.") === true) {
                Kakao.Story.open({
                    url: '{{ $url }}',
                    text: '{{ $title_and_description }}',
                    urlInfo: {
                        title: '{{ $title }}',
                        desc: '{{ $description }}',
                        name: '{{ env('APP_NAME', 'Laravel') }}',
                        images: [
                            "{{ $attributes['cover-image-url'] ?? (env('APP_URL', 'http://127.0.0.1:8000') . '/img/hero/main-desktop-light.jpg') }}"
                        ]
                    }
                });
            }
        });

        document.getElementById("{{ $unique_id }}-share-menu-friendica")?.addEventListener('click', (e) => {
            shareToFediverse("Friendica");
        });

        document.getElementById("{{ $unique_id }}-share-menu-mastodon")?.addEventListener('click', (e) => {
            shareToFediverse("Mastodon");
        });

        document.getElementById("{{ $unique_id }}-share-menu-misskey")?.addEventListener('click', (e) => {
            shareToFediverse("Misskey");
        });

        document.getElementById("{{ $unique_id }}-share-menu-pleroma")?.addEventListener('click', (e) => {
            shareToFediverse("Pleroma");
        });

        document.getElementById("{{ $unique_id }}-share-menu-threads")?.addEventListener('click', (e) => {
            e.preventDefault();
            if (window.confirm("(#_ )! This method will only work if you have the Threads app installed on Android or iOS. Do you want to continue?") === true) {
                window.location = e.currentTarget.href;
            }
        });

        document.getElementById("{{ $unique_id }}-share-menu-kakao-talk")?.addEventListener('click', () => {
            const title = "{{ $title }}", description = "{{ $description }}", url = "{{ $url }}";
            const content = {
                objectType: 'feed',
                content: {
                    title: '{{ $title }}',
                    description: '{{ $description }}',
                    imageUrl: '{{ $attributes['cover-image-url'] ?? (env('APP_URL', 'http://127.0.0.1:8000') . '/img/hero/main-desktop-light.jpg') }}',
                    link: {
                        mobileWebUrl: '{{ $url }}'.replace("localhost:8000", "reinhart1010.id"),
                        webUrl: '{{ $url }}'.replace("localhost:8000", "reinhart1010.id"),
                    },
                },
                // social: {
                //     likeCount: 286,
                //     commentCount: 45,
                //     sharedCount: 845,
                // },
                buttons: [
                    {
                        title: 'Read Article',
                        link: {
                            mobileWebUrl: '{{ $url }}'.replace("localhost:8000", "reinhart1010.id"),
                            webUrl: '{{ $url }}'.replace("localhost:8000", "reinhart1010.id"),
                        },
                    },
                ],
            }
            if (window.confirm("(#_ )! By sharing to KakaoTalk, your browser and operating system information will be sent to Kakao to redirect to the KakaoTalk app.") === true) {
                Kakao.Share.sendDefault(content);
            }
        });
        // @license-end
    </script>
</div>
