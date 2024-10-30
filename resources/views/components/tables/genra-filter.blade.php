<div class='mr-2'>
<x-forms.select-option id='genra'>
   @foreach ($genraOption as $row)

   <option value="{{ $row->id }}">{{ $row->name }}</option>

   @endforeach
</x-forms.select-option>
</div>

