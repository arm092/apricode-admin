<a
    href="{{ url('/').'/'.config('filament.path') }}"
    rel="home"
    class="flex items-center p-4 space-x-3 rtl:space-x-reverse group"
    target="_blank"
>
    <img src="{{config('filament.logo_path')}}" alt="Admin Panel Logo" width="40" height="40" class="w-10 h-10">
    <span class="text-lg font-bold leading-tight text-white transition-colors duration-200 group-hover:text-gray-100">{{ config('app.name') }}</span>
</a>
