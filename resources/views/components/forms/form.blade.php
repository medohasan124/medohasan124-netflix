@props([
    'method' => 'post',
    'action',
    'title',])
<form action="{{ $action }}" method="{{ $method }}" {{ $attributes }}>

    @if (isset($title))
        <h3 class='text-3xl text-grey-300 dark:text-white my-5'>{{ $title }}</h3>
    @endif

    @csrf
    @method($method)



    {{ $slot }}
</form>
