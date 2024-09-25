<x-layouts>

    <x-slot:title>permission</x-slot:title>
    <x-layouts.header>

        <x-slot:title>permission</x-slot:title>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia sunt, assumenda dignissimos doloremque
        reiciendis autem iusto saepe ut minima nesciunt?
    </x-layouts.header>

    <section>

        <?php
            $data = [
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

            ];
        ?>

       <x-table :url="route('admin.permission.data')"  :data='$data' searchplaceholder="Search about permission" :btnCreate='false' btnCreateHref='#'>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6 text-lg">
                   #
                </th>
                <th scope="col" class="py-3 px-6 text-lg">
                    @lang('admin.name')
                </th>
                <th scope="col" class="py-3 px-6 text-lg">
                    @lang('admin.updated_at')
                </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
       </x-table>
    </section>




</x-layouts>
