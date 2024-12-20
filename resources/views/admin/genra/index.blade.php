<x-layouts>

    <x-slot:title>@lang('genra.title')</x-slot:title>
    <x-layouts.header>

        <x-slot:title>@lang('genra.title')</x-slot:title>
        @lang('genra.description')
    </x-layouts.header>

    <section>
        <?php
        $data = [
            [
            'data' => 'checkbox',
            'className' => 'text-lg text-grey-900 dark:text-white',
            'searchable' => false,
            'orderable'=> false,
            'sortable'=> false,
            ],
            [
            'data' => 'id',
            'className' => 'text-lg text-grey-900 dark:text-white',
            'searchable' => true
            ],
            [
            'data' => 'name',
            'className' => 'text-lg text-grey-900 dark:text-white',
            'searchable' => true
            ],
            [
            'data' => 'updated_at',
            'className' => 'text-lg text-grey-900 dark:text-white',
            'searchable' => true
            ],
            [
            'data' => 'action',
            'className' => 'text-lg text-grey-900 dark:text-white',
            'searchable' => true,
            'searchable' => false,
            'orderable'=> false,
            'sortable'=> false,
            ],
        ];
    ?>

   <x-datatable
   :url="route('admin.genra.data')"
   :data='$data'
   searchplaceholder="Search about permission"
   btnBulkCDelete='{{ route("admin.genra.bulckDelete") }}'
   btnCreate='{{ route("admin.genra.create") }}'
   permissionCreate='genra-create'
   permissionDelete='genra-delete'
   :btnCreateName="__('admin.create')"
    :btnDeleteName="__('genra.delete')"
    >
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6 text-lg">
                <x-checkbox class='all-checkbox' />
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
               #
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
                @lang('genra.name')
            </th>

          
            <th scope="col" class="py-3 px-6 text-lg">
                @lang('genra.updated_at')
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
                @lang('genra.action')
            </th>
    </tr>
</thead>
<tbody>
</tbody>

   </x-datatable>
</section>
</x-layouts>
