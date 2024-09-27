<x-layouts>

    <x-slot:title>@lang('role.create_role')</x-slot:title>
    <x-layouts.header>

        <x-slot:title> @lang('role.create_role')</x-slot:title>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia sunt, assumenda dignissimos doloremque
        reiciendis autem iusto saepe ut minima nesciunt?
    </x-layouts.header>

    <section>





        <x-forms.form class='w-full  mx-auto' action="{{ route('admin.roles.store') }}" :title="__('role.role_name')" method='POST'>

            <x-forms.filed label='name' name='name' :required='true' type='text' />

            <x-tables.table>

                <x-tables.head>

                    <x-tables.th>#</x-tables.th>
                    <x-tables.th>create by master </x-tables.th>

                    <x-tables.th>Create</x-tables.th>
                    <x-tables.th>read</x-tables.th>
                    <x-tables.th>update</x-tables.th>
                    <x-tables.th>delete</x-tables.th>

                </x-tables.head>
                <x-tables.body>


                    @foreach ($permissions as $key => $permission)

                    <x-tables.tr>
                        <x-tables.td>{{ $key }}</x-tables.td>
                            @foreach($permission as $secondkey => $firstvalue)

                                @if($firstvalue !== "null")
                                <x-tables.td>
                                    <?php
                                    $value = explode('-', $firstvalue);
                                    ?>
                                    <x-forms.filed  :name='$value[1]' type='checkbox' :value='$secondkey' checked='true' />
                                </x-tables.td>
                                @else
                                <x-tables.td>-</x-tables.td>
                                @endif

                        @endforeach
                    </x-tables.tr>
                    @endforeach

                </x-tables.body>

            </x-tables.table>



            <x-buttons.button class="bg-primary " type="submit " :name='__("role.create_role")' />
        </x-forms.form>


    </section>

</x-layouts>
