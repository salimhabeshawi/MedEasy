@props(['status' => 'pending'])

@php
$classes = "inline-block rounded-full border px-2 py-1 text-xs font-medium";

switch ($status) {
case 'pending':
    $classes .= ' bg-yellow-500/10 text-yellow-500 border-yellow-500/20';
    break;
case 'in_progress':
    $classes .= ' bg-blue-500/10 text-blue-500 border-blue-500/20';
    break;
case 'completed':
    $classes .= ' bg-primary/10 text-primary border-primary/20';
    break;
default:
    $classes .= ' bg-yellow-500/10 text-yellow-500 border-yellow-500/20';
    break;
}
@endphp
<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>