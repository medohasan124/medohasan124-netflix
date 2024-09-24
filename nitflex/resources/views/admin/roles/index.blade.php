<x-layouts>

    <x-slot:title>roles</x-slot:title>
    <x-layouts.header>

        <x-slot:title>roles</x-slot:title>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia sunt, assumenda dignissimos doloremque
        reiciendis autem iusto saepe ut minima nesciunt?
    </x-layouts.header>

    <section>
        <x-table search="Search about roles">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="py-3 px-6 text-lg">
                        #
                    </th>
                    <th scope="col" class="py-3 px-6 text-lg">
                        name
                    </th>
                    <th scope="col" class="py-3 px-6 text-lg">
                        Update At
                    </th>
                    <th scope="col" class="py-3 px-6 text-lg">
                        Action
                    </th>

                </tr>
            </thead>
            <tbody>
            </tbody>

        </x-table>
    </section>



    <script>
        $(document).ready(function() {



            oTable = $('#myTable').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('admin.roles.data') }}"
                },

                columns: [{
                        data: 'id',
                        className: 'text-base',
                        searchable: true
                    },
                    {
                        data: 'name',
                        className: 'text-base',
                        searchable: true
                    },
                    {
                        data: 'updated_at',
                        className: 'text-base',
                        searchable: true
                    },
                    {
                        data: 'action',
                        searchable: false
                    },

                ],
            });

            $('#myInputTextField').keyup(function() {
                oTable.search($(this).val()).draw();
            });

            $('.dt-search').remove();
        });
    </script>

</x-layouts>
