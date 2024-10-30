<x-layouts>

    <x-slot:title>@lang('users.u_user')</x-slot:title>
    <x-layouts.header>

        <x-slot:title> @lang('users.u_user')</x-slot:title>
        @lang('users.description')
    </x-layouts.header>

    <section>

        {{--
            form needed required

            1 - action
            2 - title
            3 - methos

        --}}
        <x-forms.form class='w-full  mx-auto' action="{{ route('admin.users.update', $user->id) }}" :title="__('users.u_user')" method='PUT'>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <x-forms.errors.error>{{ $error}}</x-forms.errors.error>
                @endforeach
            @endif

            {{--
            required field
                1 - label
                2 - name
                3 - value
                4 - type
                5 - required
            --}}
            <x-forms.filed label="{{ __('users.name')}}" name='name' value='{{ $user->name }}' :required='true' type='text' />
            <x-forms.filed label="{{ __('users.email')}}" name='email' value='{{ $user->email }}' :required='true' type='email' />
            <x-forms.filed label="{{ __('users.password')}}" name='password' value='' :required='true' type='password' />
            <x-forms.filed label="{{ __('users.password_confirmation')}}" name='password_confirmation' value='' :required='true' type='password' />
            <x-forms.select-option label="{{ __('users.role')}}" name='role' value="{{ $user->roles->pluck('id')->first() }}" :required='true' type='selectOption' >
                <option value="" hidden>{{ __('users.select_role') }}</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->roles->pluck('id')->first() == $role->id ? 'selected' : '' }}>{{ $role->name }} </option>
                @endforeach
            </x-forms.select-option>
            <x-buttons.button class=" mt-5" type="submit " :name='__("users.u_user")' />
        </x-forms.form>

        @permission('users-delete')
        <x-modal.delete :action="route('admin.users.destroy', $user->id)" :id='$user->id' class='my-2 flex justify-center items-center' message="{{__('users.message') . $user->name}}" >
            @lang('users.delete')
            <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
            </svg>

        </x-modal.delete>
        @endpermission

    </section>

</x-layouts>
