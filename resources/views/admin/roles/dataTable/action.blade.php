<div class='flex justify-center items-center'>

{{-- <a href="{{ route('admin.roles.edit', $id)}}" type="button" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-blue-900 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-900">@lang('role.edit')</a> --}}
 <x-buttons.edit href='{{route("admin.roles.edit", $id)}}'>@lang('role.edit')</x-buttons.edit>
<x-modal.delete :action="route('admin.roles.destroy', $id)" :id='$id' class='' >
    <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
      </svg>

    @lang('role.delete')
</x-modal.delete>
</div>
