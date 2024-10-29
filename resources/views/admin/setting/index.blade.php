<x-layouts>

    <x-slot:title>@lang('setting.title')</x-slot:title>
    <x-layouts.header>

        <x-slot:title> @lang('setting.title')</x-slot:title>
        @lang('setting.description')
    </x-layouts.header>

    <section>

        {{--
            form needed required

            1 - action
            2 - title
            3 - methos

        --}}
        <x-forms.form class='w-full  mx-auto' action="{{ route('admin.setting.update', $setting->id) }}" :title="__('setting.title')" method='PUT' enctype="multipart/form-data">

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
            <x-forms.filed label="{{ __('setting.email')}}" name='email' value='{{ $setting->email }}' :required='true' type='text' />
            <x-forms.filed label="{{ __('setting.keyword')}}" name='keywords' value='{{ $setting->keywords }}' :required='true' type='text' />
            <x-forms.filed label="{{ __('setting.description')}}" name='description' value='{{ $setting->description }}' :required='true' type='text' />
            <x-forms.filed label="{{ __('setting.image')}}" name='image' value='{{ $setting->image }}' :required='true' type='file' />
                <img
                src='{{ storage_path('public/uploads/'.$setting->image) == null ? asset('storage/uploads/default.png') : storage_path('/public/uploads/'.$setting->image) }}' class='w-40 h-40'>
            <x-buttons.button class=" mt-5" type="submit " :name='__("setting.title")' />
        </x-forms.form>

        
        @permission('setting-delete')
        <x-modal.delete :action="route('admin.setting.destroy', $setting->id)" :id='$setting->id' class='my-2 flex justify-center items-center' message="{{__('setting.message') . $setting->name}}" >
            @lang('setting.delete')
            <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
            </svg>

        </x-modal.delete>
        @endpermission

    </section>

</x-layouts>
