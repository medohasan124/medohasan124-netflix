<x-layouts>

    <x-slot:title>roles</x-slot:title>
    <x-layouts.header>

        <x-slot:title>roles</x-slot:title>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia sunt, assumenda dignissimos doloremque
        reiciendis autem iusto saepe ut minima nesciunt?
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

   <x-table :url="route('admin.roles.data')"  :data='$data' searchplaceholder="Search about permission" :btnBulkCDelete='true' :btnCreate='true' bthCreateHref='{{ route("admin.roles.create") }}' >
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6 text-lg">
                <x-checkbox class='all-checkbox' />
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
               #
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
                @lang('admin.name')
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
                @lang('admin.updated_at')
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
                @lang('admin.action')
            </th>
    </tr>
</thead>
<tbody>
</tbody>
   </x-table>
</section>
</x-layouts>
