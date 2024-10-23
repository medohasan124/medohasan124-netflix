  @props([
    'name' => 'name',
    'formName' => 'formName',
    'required' => false,
    'type' => 'text',
    'value' => '',
    'checked' => 'false',
    ])


@if($type=='checkbox')

<label class="inline-flex items-center mb-5 cursor-pointer">
    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300 mx-2">{{ $name }}</span>
    <input type="checkbox" name="{{ $formName }}" class="sr-only peer"
    @if($checked)
    checked
    @endif
    >
    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>

  </label>



@else
<input type="{{ $type }}" name="{{ $name }}"
{{ $attributes->merge(['class'=>'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}
 class=""  {{ $required }} />

@endif
