<?php
    use Illuminate\Support\Facades\Request;
    $randomPrompts = [
        "Do you have any concerns?",
        "Do you see any errors?",
        "Does this site qualify as an “Anak IT” site?",
        "Does this site really look great?",
        "Is there any problem?",
        "What do you think about it?",
        "What's the name of this bird, btw?",
        "Would you say, “I love you 3000,” too?",
    ];
    $randomPrompt = $randomPrompts[random_int(0, count($randomPrompts) - 1)];
?>

<div class="my-4 p-4 rounded-xl bg-gr-cyan-50/50 dark:bg-dm-cyan-900/50 hover:bg-gr-cyan-50 dark:hover:bg-gr-cyan-900 text-gr-cyan-900 dark:text-white border-2 border-gr-cyan-500 dark:border-dm-cyan-50 shadow-lg shadow-dm-cyan-500/50 dark:shadow-dm-cyan-200/50 hover:shadow-dm-cyan-200/75 dark:hover:shadow-dm-cyan-200/75 ease-out duration-200 will-change-auto hover:will-change-scroll {{ $class ?? '' }}" style="border-style: inset;">
    <span class="inline-block font-bold">(&gt;_ )!</span>
    You have just visited our new website, powered by
    <a href="https://github.com/1010bots/T-3000" target="_blank" class="font-bold text-gr-cyan-600 dark:text-gr-cyan-100 active:text-gr-cyan-800 dark:active:text-gr-cyan-300 hover:text-gr-cyan-800 dark:hover:text-gr-cyan-300">a T-3000<x-fluentui-window-new-16 class="inline-block h-4 w-4" /></a> 🦾.
    <a href="https://docs.google.com/forms/d/e/1FAIpQLSepVq4gLGb-mK33reTy2XQ-eMG07KRCHs2Mi_0klD2NFHcOOA/viewform?usp=pp_url&entry.1645912647={{ urlencode(Request::url()) }}" target="_blank" class="font-bold text-underline text-gr-cyan-600 dark:text-gr-cyan-100 active:text-gr-cyan-800 dark:active:text-gr-cyan-300 hover:text-gr-cyan-800 dark:hover:text-gr-cyan-300">{{ $randomPrompt }}<x-fluentui-window-new-16 class="inline-block h-4 w-4" /></a>
</div>
