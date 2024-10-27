@props(
[
    'name' => 'name',
    'formName' => 'formName',
    'label',
    'required' => false,
    'type' => 'text',
    'checked' => 'false',
    'value' => '',
    ])

<div class="mb-5">

    @if(isset($label))
    <label for="{{ $label }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    @endif

  

    <x-forms.input class="block w-full" :checked='$checked' :value='$value' :name='$name' :formName='$formName' :required='$required' type='{{ $type }}' />


</div>
