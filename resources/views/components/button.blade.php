@props([
    'color' => 'white',
    'disabled' => false,
    'href' => null,
    'size' => 'base',
    'type' => 'button',
])

@php
    $colorClasses = [
        'danger'    => 'border-transparent bg-danger-500 text-gray-900 hover:bg-danger-700 hover:text-light focus:ring-danger-200',
        'success'   => 'border-transparent bg-success-500 text-gray-900 hover:bg-success-700 focus:ring-success-200',
        'primary'   => 'border-transparent bg-primary-500 text-gray-900 hover:bg-primary-700 hover:text-light focus:ring-primary-200',
        'white'     => 'border-gray-500 bg-white text-gray-900 hover:bg-gray-100 focus:ring-secondary-200',
        'secondary' => 'border-transparent bg-secondary-500 text-light hover:bg-gray-100 hover:text-light focus:ring-secondary-200',
    ][$color];

    $disabledClasses = $disabled ? 'opacity-25 cursor-not-allowed' : '';

    $sizeClasses = [
        'base'  => 'text-sm py-2 px-6',
        'small' => 'text-xs py-1 px-3',
    ][$size];

    $classes = "cursor-pointer font-medium border rounded transition duration-200 shadow-md focus:ring focus:ring-opacity-50 {$colorClasses} {$disabledClasses} {$sizeClasses}";
@endphp

@unless ($href)
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled]) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled]) }}>
        {{ $slot }}
    </a>
@endunless
