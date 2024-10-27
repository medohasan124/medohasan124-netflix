<!doctype html>
<html
@if (app()->getLocale() === 'ar')
    lang="ar"
    dir="rtl"
@endif

x-data="{ darkMode: localStorage.getItem('dark') === 'true'}"
			x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
			x-bind:class="{ 'dark': darkMode }">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title }}</title>


    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src='//cdn.datatables.net/2.1.8/js/dataTables.min.js'></script>
    @notifyCss
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class='bg-white dark:bg-gray-900'>
    <x-layouts.sidebar class="min-w-fit flex-grow-0 flex-shrink-0 hidden md:block"/>

    <div class='p-4 sm:ml-64 rtl:sm:ml-0 rtl:sm:mr-64 '>

        <div class="block sm:absolute top-5  {{ app()->getLocale() === 'ar' ? 'left-5' : 'right-5' }} order-1">
            <x-dark-mode-toggle size="4" />
        </div>

    <x-notify::notify />

            {{ $slot }}
            <x-layouts.footer />
    </div>

    @notifyJs

</body>

</html>
