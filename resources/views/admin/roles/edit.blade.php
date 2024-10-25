<x-layouts>

    <x-slot:title>@lang('role.u_role')</x-slot:title>
    <x-layouts.header>

        <x-slot:title> @lang('role.u_role')</x-slot:title>
        @lang('role.role_description')
    </x-layouts.header>

    <section>


        @if ($errors->any())

            @foreach ($errors->all() as $error)
                <x-forms.errors.error>{{ $error }}</x-forms.errors.error>
            @endforeach



        @endif


        <x-forms.form class='w-full  mx-auto'  action="{{ route('admin.roles.update',['role' => $ModelsRole->id])}}" :title="__('role.role_name')" method='PUT'>

            <x-forms.filed label="{{__('role.role_name')}}" name='name' :required='true' :value='$ModelsRole->name' type='text' />

            <x-tables.table>

                <x-tables.head>

                    <x-tables.th>#</x-tables.th>
                    <x-tables.th>@lang('role.name') </x-tables.th>
                    <x-tables.th>@lang('role.create')</x-tables.th>
                    <x-tables.th>@lang('role.read')</x-tables.th>
                    <x-tables.th>@lang('role.update')</x-tables.th>
                    <x-tables.th>@lang('role.delete')</x-tables.th>

                </x-tables.head>
                <x-tables.body>

                    <?php $num = 1 ?>
                    @foreach ($permissions as $key => $permission)

                    <x-tables.tr>
                        <x-tables.td>{{ $num }}</x-tables.td>
                        <x-tables.td>{{ $key }}</x-tables.td>
                            @foreach($permission as $secondkey => $firstvalue)

                                @if($firstvalue !== "null")
                                <x-tables.td>
                                    <?php
                                        $value = explode('-', $firstvalue);
                                    ?>
                                    <x-forms.filed  :name='$value[1]' :formName="$firstvalue" type='checkbox' :value='$secondkey'
                                        :checked='$ModelsRole->hasPermission($firstvalue)' />
                                </x-tables.td>
                                @else
                                <x-tables.td>-</x-tables.td>
                                @endif

                        @endforeach
                    </x-tables.tr>
                    <?php $num++ ; ?>
                    @endforeach

                </x-tables.body>

            </x-tables.table>



            <x-buttons.button class="bg-primary " type="submit " :name='__("role.u_role")' />
        </x-forms.form>


    </section>

</x-layouts>
