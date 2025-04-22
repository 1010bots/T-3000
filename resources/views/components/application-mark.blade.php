<picture>
  <?php
    $gender_id = env('APP_SERVER_GENDER', '0');
    $gender = $gender_id == "1" ? "male" : "female";
  ?>
  <source srcset="/img/icons/shell-blue-{{ $gender }}-neutral.jxl" type="image/jxl" />
  <source srcset="/img/icons/shell-blue-{{ $gender }}-neutral.avif" type="image/avif" />
  <source srcset="/img/icons/shell-blue-{{ $gender }}-neutral.heic" type="image/heic" />
  <source srcset="/img/icons/shell-blue-{{ $gender }}-neutral.webp" type="image/webp" />
  <source srcset="/img/icons/shell-blue-{{ $gender }}-neutral.png" type="image/png" />
  <img alt="Reinhart Previano K." src="/img/icons/shell-blue-{{ $gender }}-neutral.png" height="668" width="873" class="h-12 w-auto" />
</picture>
{{-- <img alt="Reinhart Previano K." src="/favicon.ico" height="16" width="16" class="h-12 w-12 m-auto" style="image-rendering: pixelated;" /> --}}
