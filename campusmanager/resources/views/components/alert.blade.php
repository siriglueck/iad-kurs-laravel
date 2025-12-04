@props(['type' => 'info'])

<div class="callout {{ $type }}">
    {{ $slot }}
</div>