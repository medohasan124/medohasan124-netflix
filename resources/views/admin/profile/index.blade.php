<x-layouts>

    <x-slot:title>@lang('profile.title')</x-slot:title>
    <x-layouts.header>

        <x-slot:title> @lang('profile.title')</x-slot:title>
        @lang('profile.description')
    </x-layouts.header>

    <section>

        {{--
            form needed required

            1 - action
            2 - title
            3 - methos

        --}}
        <x-forms.form class='w-full  mx-auto' action="{{ route('admin.profile.update', $profile->id) }}" :title="__('profile.title')" method='PUT'>

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
            <x-forms.filed label="{{ __('profile.name')}}" name='name' value='{{ $profile->name }}' :required='true' type='text' />
            <x-forms.filed label="{{ __('profile.email')}}" name='email' value='{{ $profile->email }}' :required='true' type='email' />
            <x-forms.filed label="{{ __('profile.password')}}" name='password' value='' :required='false' type='password' />
            <x-forms.filed label="{{ __('profile.password_confirmation')}}" name='password_confirmation' value='' :required='false' type='password' />


            <x-buttons.button class=" mt-5" type="submit " :name='__("profile.update")' />
        </x-forms.form>

    </section>

</x-layouts>
