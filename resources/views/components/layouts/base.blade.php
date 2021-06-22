<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ trans('filament::layout.direction') === 'rtl' ? 'rtl' : 'ltr' }}" class="antialiased bg-gray-100 js-focus-visible">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Icons -->
    <meta itemProp="logo" content="{{config('filament.logo_path')}}">
    <link rel="apple-touch-icon" sizes="any" type="image/svg+xml" href="{{config('filament.logo_path')}}"/>
    <link rel="favicon" sizes="any" type="image/svg+xml" href="{{config('filament.logo_path')}}"/>
    <link rel="shortcut icon" sizes="any" type="image/svg+xml" href="{{config('filament.logo_path')}}"/>

    <title>{{ __($title) ?? null }} {{ __($title) ?? false ? '|' : null }} {{ config('app.name') }}</title>

    @livewireStyles
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,300;1,300&family=Montserrat:wght@400;700&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ route('filament.asset', [
        'id' => Filament\get_asset_id('/css/filament.css'),
        'path' => 'css/filament.css',
    ]) }}" />

    @foreach (\Filament\Filament::getStyles() as $path)
        @if (Str::of($path)->startsWith(['http://', 'https://']))
            <link rel="stylesheet" href="{{ $path }}" />
        @else
            <link rel="stylesheet" href="{{ route('filament.asset', [
                'path' => $path
            ]) }}">
        @endif
    @endforeach

    @stack('filament-styles')
</head>

<body class="text-gray-900">
    {{ $slot }}

    <x-filament::notification />

    @livewireScripts
    <script>
        window.filamentConfig = @json(\Filament\Filament::getScriptData());
    </script>

    <script src="{{ route('filament.asset', [
        'id' => Filament\get_asset_id('/js/filament.js'),
        'path' => 'js/filament.js',
    ]) }}"></script>

    @foreach (\Filament\Filament::getScripts() as $path)
        <script src="{{ $path }}"></script>
    @endforeach

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mousetrap/1.6.5/mousetrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mousetrap/1.6.5/plugins/global-bind/mousetrap-global-bind.min.js"></script>

    @stack('filament-scripts')
</body>
</html>
