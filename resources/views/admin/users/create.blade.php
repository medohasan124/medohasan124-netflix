<x-layouts>

    <x-slot:title>@lang('users.c_user')</x-slot:title>
    <x-layouts.header>

        <x-slot:title> @lang('users.c_user')</x-slot:title>
        @lang('users.description')
    </x-layouts.header>

    <section>

        {{--
            form needed required

            1 - action
            2 - title
            3 - methos

        --}}
        <x-forms.form class='w-full  mx-auto' action="{{ route('admin.users.store') }}" :title="__('users.c_user')" method='POST'>

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
            <x-forms.filed label="{{ __('users.name')}}" name='name' value='{{ old("name") }}' :required='true' type='text' />
            <x-forms.filed label="{{ __('users.email')}}" name='email' value='{{ old("email") }}' :required='true' type='email' />
            <x-forms.filed label="{{ __('users.password')}}" name='password' value='{{ old("password") }}' :required='true' type='password' />
            <x-forms.filed label="{{ __('users.password_confirmation')}}" name='password_confirmation' value='{{ old("password") }}' :required='true' type='password' />
            <x-forms.select-option label="{{ __('users.role')}}" name='role' value='{{ old("role") }}' :required='true' type='selectOption' >
                <option value="" hidden>{{ __('users.select_role') }}</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </x-forms.select-option>
            <x-buttons.button class=" mt-5" type="submit " :name='__("users.c_user")' />
        </x-forms.form>


    </section>

</x-layouts>
