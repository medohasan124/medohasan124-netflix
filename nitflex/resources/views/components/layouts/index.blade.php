<!doctype html>
<html x-data="{ darkMode: localStorage.getItem('dark') === 'true'}"
			x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
			x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title }}</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">

    <script src='//cdn.datatables.net/2.1.7/js/dataTables.min.js'></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class='bg-white dark:bg-gray-900'>

    <x-layouts.sidebar class="min-w-fit flex-grow-0 flex-shrink-0 hidden md:block"/>

    <div class='p-4 sm:ml-64'>
        <div class="block sm:absolute top-5 right-8 order-1">
            <x-dark-mode-toggle size="4" />
        </div>


            {{ $slot }}
            <x-layouts.footer />
    </div>

</body>

</html>
