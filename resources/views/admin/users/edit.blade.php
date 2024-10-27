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

        @permission('users-delete')
        <x-modal.delete modalName="users" message="Are you sure you want to delete this User ?" :action="route('admin.users.destroy', $id)" :id='$id' class=' my-2 flex justify-center items-center' >
            @lang('users.delete')
            <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
              </svg>

        </x-modal.delete>
        @endpermission

    </section>

</x-layouts>
