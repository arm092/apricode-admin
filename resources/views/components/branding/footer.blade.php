<a
    href="{{config('apricode.product_link')}}"
    target="_blank"
    rel="noopener noreferrer"
    {{ $attributes->merge(['class' => 'inline-flex items-center opacity-20 hover:opacity-100 transition-opacity duration-500 space-x-2 rtl:space-x-reverse']) }}
>
    <span class="mt-0.5">{{config('apricode.product_name')}} by</span>
    <x-filament::logo class="w-24 h-auto" />
</a>
