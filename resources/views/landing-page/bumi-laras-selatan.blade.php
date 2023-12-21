<x-app-layout theme-color="yellow" title="Bumi Laras Selatan Typeface">
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
    <main class="flex gap-4 text-black dark:text-white">
        <div class="grid grid-cols-3 w-full m-safe-offset-4 gap-4">
            <x-primitives.card theme-color="yellow" class="flex flex-col col-span-3 md:col-span-2 row-span-2 p-4 rounded-2xl overflow-hidden">
                <p class="font-mono">/* README.TXT (Editable) */</p>
                <p id="font-tester" class="font-sans" contenteditable>
                    Bumi Laras Selatan is a typeface based on Instrument Sans, with a name inspired by Reinhart’s old house address (2003-2010).
                </p>
            </x-primitives.card>
            <x-primitives.card theme-color="red" class="flex flex-col gap-4 col-span-3 md:col-span-1 p-4 rounded-2xl overflow-hidden">
                <h2 class="text-2xl font-semibold">It’s a variable font with variable weights and widths.</h2>
                <div class="flex flex-col gap-2">
                    <label for="font-weight" class="font-bold">Font Weight</label>
                    <input type="range" id="font-weight" name="font-weight" min="400" max="700" value="400" step="1" onchange="updateFontPreview()" onmousemove="updateFontPreview()" ontouchmove="updateFontPreview()" />
                    <div class="flex justify-between">
                        <p class="text-sm">400 (Normal)</p>
                        <p class="text-sm">700 (Bold)</p>
                    </div>
                </div>
                <div class="flex flex-row gap-2 items-center">
                    <input type="checkbox" id="font-italic" name="font-italic" onchange="updateFontPreview()" class="rounded-sm bg-white border-dm-red-300 text-dm-red-500 focus:ring-dm-red-300"/>
                    <label for="font-italic" class="font-bold">Italic</label>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="font-width" class="font-bold">Font Width</label>
                    <input type="range" id="font-width" name="font-width" min="75" max="100" value="100" step="1" onchange="updateFontPreview()" onmousemove="updateFontPreview()" ontouchmove="updateFontPreview()" />
                    <div class="flex justify-between">
                        <p class="text-sm">75 (Condensed)</p>
                        <p class="text-sm">100 (Regular)</p>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="font-size" class="font-bold">Font Size</label>
                    <input type="range" id="font-size" name="font-size" min="8" max="96" value="48" step="1" onchange="updateFontPreview()" onmousemove="updateFontPreview()" ontouchmove="updateFontPreview()" />
                    <div class="flex justify-between">
                        <p class="text-sm">8px</p>
                        <p class="text-sm">96px</p>
                    </div>
                </div>
            </x-primitives.card>
            <x-primitives.card theme-color="purple" class="flex flex-col gap-4 col-span-3 md:col-span-1 p-4 rounded-2xl overflow-hidden">
                <h2 class="text-2xl font-semibold">Download Font</h2>
                <p>Bumi Laras Selatan is freely available under <x-primitives.link theme-color="purple" href="https://openfontlicense.org">SIL Open Font License 1.1</x-primitives.link>.</p>
                <div class="flex flex-col gap-2">
                    <h3 for="font-size" class="font-bold">As a webfont (WOFF2)</h3>
                    <x-primitives.button theme-color="purple" element="a" href="/fonts/BumiLarasSelatan-Regular.woff2" target="_blank" class="flex flex-row justify-between items-center">
                        Download Regular
                        <x-fluentui-arrow-download-24 class="w-6 h-6" />
                    </x-primitives.button>
                    <x-primitives.button theme-color="purple" element="a" href="/fonts/BumiLarasSelatan-Italic.woff2" target="_blank" class="flex flex-row justify-between items-center">
                        Download Italic
                        <x-fluentui-arrow-download-24 class="w-6 h-6" />
                    </x-primitives.button>
                </div>
                <div class="flex flex-col gap-2">
                    <h3 for="font-size" class="font-bold">For local use (TTF)</h3>
                    <x-primitives.button theme-color="purple" element="a" href="/fonts/BumiLarasSelatan-Regular.ttf" target="_blank" class="flex flex-row justify-between items-center">
                        Download Regular
                        <x-fluentui-arrow-download-24 class="w-6 h-6" />
                    </x-primitives.button>
                    <x-primitives.button theme-color="purple" element="a" href="/fonts/BumiLarasSelatan-Italic.ttf" target="_blank" class="flex flex-row justify-between items-center">
                        Download Italic
                        <x-fluentui-arrow-download-24 class="w-6 h-6" />
                    </x-primitives.button>
                </div>
            </x-primitives.card>
        </div>
    </main>
</x-app-layout>
