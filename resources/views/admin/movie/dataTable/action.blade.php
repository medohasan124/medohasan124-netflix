<div class='flex justify-center items-center'>

@permission('users-update')
<a href="{{ route('admin.users.edit', $id)}}" type="button" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-blue-900 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-900">
    <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
      </svg>

</a>
@endpermission



</div>
