<x-app-layout>
    <main class="text-black dark:text-white">
        <div class="p-8 text-center">
            <h1 class="text-5xl md:text-7xl lg:text-8xl md:tracking-tight break-words">Contact Us 🤙🏻</h1>
            <p>/* You’re excited to connect with us, don’t you? We, too <span class="inline-block font-bold">(&gt;_ )</span>! */</p>
        </div>
        <x-alerts.impostor-accounts class="m-4" />
        <div class="p-8 text-center">
            <p class="text-xl">Technically speaking, Reinhart is a <strong>human</strong> who operates an <strong>automation company</strong>, under one of his robots’ name. <strong>Who do you gonna call?</strong></p>
            <div class="mt-8 flex w-full justify-around">
                <div class="flex flex-col flex-wrap gap-2 items-center justify-center">
                    <picture>
                        <img src="/img/icons/bot-blue-male-neutral.png" height="192" width="192" />
                    </picture>
                    <h3 class="text-2xl font-semibold">The Man</h3>
                    <p>for personal relations and professional inquiries</p>
                </div>
                <div class="flex flex-col flex-wrap gap-2 items-center justify-center">
                    <picture>
                        <img src="/img/icons/bot-blue-female-neutral.png" height="192" width="192" />
                    </picture>
                    <h3 class="text-2xl font-semibold">The Company</h3>
                    <p>for product sales, support, and legal compliance</p>
                </div>
            </div>
            <x-primitives.card element="a" theme-color="indigo" href="https://signal.me/#eu/-VxCfUK3XHw8iiWffrDdl92hwS5dVZ6s_6Mm3i48TPLbb6A4tqFN0aMqqttI1GMv" class="block mt-8 mb-4 px-8 py-4 flex gap-3 justify-center items-center rounded-full">
                <x-simpleicon-signal class="inline w-8 h-8"/>
                <span class="text-3xl">{{ __('Chat now on Signal') }}</span>
            </x-primitives.card>
            <div class="flex w-full gap-4 justify-around">
                <div class="flex w-full flex-col flex-wrap gap-4 items-center justify-center">
                    <p class="sr-only">These are the contact links for Reinhart Previano Koentjoro, also known as Shift.</p>
                    <x-primitives.card element="a" theme-color="blue" href="https://bsky.app/profile/shift.reinhart1010.id" class="block w-full px-8 py-4 flex gap-3 justify-center items-center rounded-full">
                        <x-simpleicon-bluesky class="inline w-6 h-6 lg:w-8 lg:h-8" />
                        <span class="text-xl md:text-2xl lg:text-3xl"><span class="hidden sm:inline">Follow on </span>Bluesky</span>
                    </x-primitives.card>
                    <x-primitives.card element="a" theme-color="violet" href="https://logs.reinhart1010.id/@shift" class="block w-full px-8 py-4 flex gap-3 justify-center items-center rounded-full">
                        <x-simpleicon-mastodon class="inline w-6 h-6 lg:w-8 lg:h-8" />
                        <span class="text-xl md:text-2xl lg:text-3xl"><span class="hidden sm:inline">Follow on </span>Fediverse</span>
                    </x-primitives.card>
                    <x-primitives.card element="a" theme-color="red" href="https://kenangan.com/kenanganku/reinhart1010" class="block w-full px-8 py-4 flex gap-3 justify-center items-center rounded-full">
                        <x-icons.kenangan class="inline w-6 h-6 lg:w-8 lg:h-8" />
                        <span class="text-xl md:text-2xl lg:text-3xl"><span class="hidden sm:inline">Beri </span>Kenangan</span>
                    </x-primitives.card>
                    <x-primitives.card element="a" theme-color="yellow" href="mailto:reinhart@reinhart1010.id" class="block w-full px-8 py-4 flex gap-3 justify-center items-center rounded-full">
                        <x-fluentui-mail-24-o class="inline w-6 h-6 lg:w-8 lg:h-8" />
                        <span class="text-xl md:text-2xl lg:text-3xl"><span class="hidden sm:inline">Send </span>Email</span>
                    </x-primitives.card>
                    <x-primitives.card element="a" theme-color="lime" href="https://misskey.id/@reinhart1010" class="block w-full px-8 py-4 flex gap-3 justify-center items-center rounded-full">
                        <x-icons.misskey class="inline w-6 h-6 lg:w-8 lg:h-8" />
                        <span class="text-xl md:text-2xl lg:text-3xl"><span class="hidden sm:inline">Follow on </span>Misskey</span>
                    </x-primitives.card>
                </div>
                <div class="flex w-full flex-col flex-wrap gap-4 items-center justify-center">
                    <p class="sr-only">These are the contact links for Citra Manggala Dirgantara, also known as Shiftine.</p>
                    <x-primitives.card element="a" theme-color="blue" href="https://bsky.app/profile/shiftine.reinhart1010.id" class="block w-full px-8 py-4 flex gap-3 justify-center items-center rounded-full">
                        <x-simpleicon-bluesky class="inline w-6 h-6 lg:w-8 lg:h-8" />
                        <span class="text-xl md:text-2xl lg:text-3xl"><span class="hidden sm:inline">Follow on </span>Bluesky</span>
                    </x-primitives.card>
                    <x-primitives.card element="a" theme-color="violet" href="https://logs.reinhart1010.id/@shiftine" class="block w-full px-8 py-4 flex gap-3 justify-center items-center rounded-full">
                        <x-simpleicon-mastodon class="inline w-6 h-6 lg:w-8 lg:h-8" />
                        <span class="text-xl md:text-2xl lg:text-3xl"><span class="hidden sm:inline">Follow on </span>Fediverse</span>
                    </x-primitives.card>
                    <x-primitives.card element="a" theme-color="red" href="https://kenangan.com/kenanganku/shiftinecmd" class="block w-full px-8 py-4 flex gap-3 justify-center items-center rounded-full">
                        <x-icons.kenangan class="inline w-6 h-6 lg:w-8 lg:h-8" />
                        <span class="text-xl md:text-2xl lg:text-3xl"><span class="hidden sm:inline">Beri </span>Kenangan</span>
                    </x-primitives.card>
                    <x-primitives.card element="a" theme-color="yellow" href="mailto:shiftine@reinhart1010.id" class="block w-full px-8 py-4 flex gap-3 justify-center items-center rounded-full">
                        <x-fluentui-mail-24-o class="inline w-6 h-6 lg:w-8 lg:h-8" />
                        <span class="text-xl md:text-2xl lg:text-3xl"><span class="hidden sm:inline">Send </span>Email</span>
                    </x-primitives.card>
                    <x-primitives.card element="a" theme-color="lime" href="https://misskey.id/@1010bots" class="block w-full px-8 py-4 flex gap-3 justify-center items-center rounded-full">
                        <x-icons.misskey class="inline w-6 h-6 lg:w-8 lg:h-8" />
                        <span class="text-xl md:text-2xl lg:text-3xl"><span class="hidden sm:inline">Follow on </span>Misskey</span>
                    </x-primitives.card>
                </div>
            </div>
        </div>
        <div class="p-8 text-center">
            <div class="flex flex-wrap gap-8 w-full justify-around">
                <div class="w-full lg:w-1/2 flex flex-col flex-wrap gap-2 items-center justify-center">
                    <h3 class="text-2xl font-semibold">Retired Accounts</h3>
                    <p>Starting on May 10<sup>th</sup>, 2024, we decided to retire our WhatsApp Business account for new chats. Existing number on <a href="https://wa.me/6281717229090" class="font-bold underline">+62 817-1722-9090</a> will continue to work for automated messages.</p>
                    <p>Starting on August 10<sup>th</sup>, 2024, we will completely retire from X (formerly Twitter) in place of our new Fediverse account at <a href="https://wa.me/6281717229090" class="font-bold underline">logs.reinhart1010.id</a>. You can use your existing Threads (Instagram), Mastodon, and other fediverse-supporting apps to follow and interact with our official accounts. Learn more how to set things up from the folks behind <a href="https://about.flipboard.com/inside-flipboard/how-to-get-started-in-the-fediverse/" class="font-bold underline">Flipboard</a></p>
                </div>
                <div class="w-full lg:w-1/2 flex flex-col flex-wrap gap-2 items-center justify-center">
                    <h3 class="text-2xl font-semibold">Send Tips & Things Securely</h3>
                    <p>You may send encrypted emails through our PGP keys at <a href="https://pgp.reinhart1010.id" class="font-bold underline">https://pgp.reinhart1010.id</a>, and files over Signal.</p>
                    <p>We are currenly considering to operate our own SecureDrop service, but not yet fully planned.</p>
                </div>
                <div class="w-full lg:w-1/2 flex flex-col flex-wrap gap-2 items-center justify-center">
                    <h3 class="text-2xl font-semibold">Other Active Accounts</h3>
                    <p>We are also active in the following platforms, too.</p>
                    <ul class="list-star text-left">
                        <li>Codeberg: <a href="https://codeberg.org/1010bots" class="font-bold underline text-gr-blue-500 dark:text-dm-blue-100 active:text-gr-blue-800 active:dark:text-dm-blue-400 hover:text-gr-blue-800 hover:dark:text-dm-blue-400 ease-out duration-200">@1010bots</a>, <a href="https://codeberg.org/alterine0101" class="font-bold underline text-gr-blue-500 dark:text-dm-blue-100 active:text-gr-blue-800 active:dark:text-dm-blue-400 hover:text-gr-blue-800 hover:dark:text-dm-blue-400 ease-out duration-200">@alterine0101</a>, <a href="https://codeberg.org/reinhart1010" class="font-bold underline text-gr-blue-500 dark:text-dm-blue-100 active:text-gr-blue-800 active:dark:text-dm-blue-400 hover:text-gr-blue-800 hover:dark:text-dm-blue-400 ease-out duration-200">@reinhart1010</a>, and <a href="https://codeberg.org/shiftinecmd" class="font-bold underline text-gr-blue-500 dark:text-dm-blue-100 active:text-gr-blue-800 active:dark:text-dm-blue-400 hover:text-gr-blue-800 hover:dark:text-dm-blue-400 ease-out duration-200">@shiftinecmd</a></li>
                        <li>GitHub: <a href="https://github.com/1010bots" class="font-bold underline text-gr-violet-500 dark:text-dm-violet-100 active:text-gr-violet-800 active:dark:text-dm-violet-400 hover:text-gr-violet-800 hover:dark:text-dm-violet-400 ease-out duration-200">@1010bots</a>, <a href="https://github.com/alterine0101" class="font-bold underline text-gr-violet-500 dark:text-dm-violet-100 active:text-gr-violet-800 active:dark:text-dm-violet-400 hover:text-gr-violet-800 hover:dark:text-dm-violet-400 ease-out duration-200">@alterine0101</a>, <a href="https://github.com/reinhart1010" class="font-bold underline text-gr-violet-500 dark:text-dm-violet-100 active:text-gr-violet-800 active:dark:text-dm-violet-400 hover:text-gr-violet-800 hover:dark:text-dm-violet-400 ease-out duration-200">@reinhart1010</a>, and <a href="https://github.com/shiftinecmd" class="font-bold underline text-gr-violet-500 dark:text-dm-violet-100 active:text-gr-violet-800 active:dark:text-dm-violet-400 hover:text-gr-violet-800 hover:dark:text-dm-violet-400 ease-out duration-200">@shiftinecmd</a></li>
                        <li>GitLab.com: <a href="https://gitlab.com/1010bots" class="font-bold underline text-gr-orange-500 dark:text-dm-orange-100 active:text-gr-orange-800 active:dark:text-dm-orange-400 hover:text-gr-orange-800 hover:dark:text-dm-orange-400 ease-out duration-200">@1010bots</a>, <a href="https://gitlab.com/alterine0101" class="font-bold underline text-gr-orange-500 dark:text-dm-orange-100 active:text-gr-orange-800 active:dark:text-dm-orange-400 hover:text-gr-orange-800 hover:dark:text-dm-orange-400 ease-out duration-200">@alterine0101</a>, <a href="https://gitlab.com/reinhart1010" class="font-bold underline text-gr-orange-500 dark:text-dm-orange-100 active:text-gr-orange-800 active:dark:text-dm-orange-400 hover:text-gr-orange-800 hover:dark:text-dm-orange-400 ease-out duration-200">@reinhart1010</a>, and <a href="https://gitlab.com/shiftinecmd" class="font-bold underline text-gr-orange-500 dark:text-dm-orange-100 active:text-gr-orange-800 active:dark:text-dm-orange-400 hover:text-gr-orange-800 hover:dark:text-dm-orange-400 ease-out duration-200">@shiftinecmd</a></li>
                        <li>GMS Church: @reinhart1010</li>
                        <li>Instagram: <a href="https://instagram.com/reinhart1010" class="font-bold underline text-gr-purple-500 dark:text-dm-purple-100 active:text-gr-purple-800 active:dark:text-dm-purple-400 hover:text-gr-purple-800 hover:dark:text-dm-purple-400 ease-out duration-200">@reinhart1010</a> and <a href="https://instagram.com/shiftofworldsandnations" class="font-bold underline text-gr-purple-500 dark:text-dm-purple-100 active:text-gr-purple-800 active:dark:text-dm-purple-400 hover:text-gr-purple-800 hover:dark:text-dm-purple-400 ease-out duration-200">@shiftofworldsandnations</a></li>
                        <li>LinkedIn: <a href="https://linkedin.com/in/reinhart1010" class="font-bold underline text-gr-indigo-500 dark:text-dm-indigo-100 active:text-gr-indigo-800 active:dark:text-dm-indigo-400 hover:text-gr-indigo-800 hover:dark:text-dm-indigo-400 ease-out duration-200">@reinhart1010</a></li>
                        <li>ORCID: <a href="https://orcid.org/0000-0001-9076-2428" class="font-bold underline text-gr-green-500 dark:text-dm-green-100 active:text-gr-green-800 active:dark:text-dm-green-400 hover:text-gr-green-800 hover:dark:text-dm-green-400 ease-out duration-200">0000-0001-9076-2428</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
