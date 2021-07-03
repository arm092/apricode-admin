<a
    href="{{ url('/').'/'.config('apricode.path') }}"
    rel="home"
    class="flex items-center p-4 space-x-3 rtl:space-x-reverse group"
>
    <img src="{{asset(config('apricode.logo_path'))}}" alt="Admin Panel Logo" width="40" height="40" class="w-10 h-10">
    <span class="text-lg font-bold leading-tight text-white transition-colors duration-200 group-hover:text-primary-500">{{ config('app.name') }}</span>
</a>
