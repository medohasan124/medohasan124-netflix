@props([
    'method' => 'POST',
    'action',
    'title',])
<form action="{{ $action }}" method="{{ $method === 'PUT' ? 'POST' : 'POST'}}" {{ $attributes }}>

    @if (isset($title))
        <h3 class='text-3xl text-grey-300 dark:text-white my-5'>{{ $title }}</h3>
    @endif

    @csrf

    @if($method === 'PUT')
        @method('PUT')
    @else
        @method($method)
    @endif






    {{ $slot }}
</form>
