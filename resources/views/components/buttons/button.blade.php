@props(
[
    'name',
    'type'=>'button',
    'dataModalHide',
    'href',
    ])
<button


    @if (isset($dataModalHide))
     data-modal-hide="{{ $dataModalHide }}"
    @endif

    @if (isset($href))
    href="{{ $href }}"
    @endif

  type="{{ $type }}"
{{ $attributes->merge(['class' => 'text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center']) }}>
    {{ $name }}
    </button>
