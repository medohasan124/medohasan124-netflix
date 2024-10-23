<div class='flex justify-center items-center'>
<a href="{{ route('admin.roles.edit', $id)}}" type="button" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-900 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-900">Edit</a>
<x-modal.delete :action="route('admin.roles.destroy', $id)" :id='$id' class='' name="Delete" />
</div>
