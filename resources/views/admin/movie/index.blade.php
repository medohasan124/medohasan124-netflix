<x-layouts>

    <x-slot:title>@lang('movie.title')</x-slot:title>
    <x-layouts.header>

        <x-slot:title>@lang('movie.title')</x-slot:title>
        @lang('movie.description')
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
            'data' => 'eid',
            'className' => 'text-lg text-grey-900 dark:text-white',
            'searchable' => true
            ],
            [
            'data' => 'poster',
            'className' => 'text-lg text-grey-900 dark:text-white',
            'searchable' => true
            ],
            [
            'data' => 'genra',
            'className' => 'text-lg text-grey-900 dark:text-white',
            'searchable' => true
            ],

            [
            'data' => 'title',
            'className' => 'text-lg text-grey-900 dark:text-white',
            'searchable' => true
            ],
            [
            'data' => 'vote',
            'className' => 'text-lg text-grey-900 dark:text-white',
            'searchable' => true
            ],
            [
            'data' => 'vote_count',
            'className' => 'text-lg text-grey-900 dark:text-white',
            'searchable' => true
            ],
            [
            'data' => 'release_date',
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
   :genraOption='$genra'
   :url="route('admin.movie.data')"
   :data='$data'
   searchplaceholder="Search about permission"
   btnBulkCDelete='{{ route("admin.movie.bulckDelete") }}'
   btnCreate='{{ route("admin.movie.create") }}'
   permissionCreate='movie-create'
   permissionDelete='movie-delete'
   :btnCreateName="__('admin.create')"
    :btnDeleteName="__('movie.delete')"
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
              eid
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
                @lang('movie.poster')
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
                @lang('movie.genra')
            </th>

            <th scope="col" class="py-3 px-6 text-lg">
                @lang('movie.title')
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
                @lang('movie.vote')
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
                @lang('movie.vote_count')
            </th>
            <th scope="col" class="py-3 px-6 text-lg">
                @lang('movie.release_date')
            </th>

            <th scope="col" class="py-3 px-6 text-lg">
                @lang('movie.action')
            </th>
    </tr>
</thead>
<tbody>
</tbody>

   </x-datatable>
</section>
</x-layouts>
