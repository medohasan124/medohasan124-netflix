<x-layouts>

    <x-slot:title>Dashboard</x-slot:title>


    <x-layouts.header>

        <x-slot:title>Dashboard</x-slot:title>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia sunt, assumenda dignissimos doloremque
        reiciendis autem iusto saepe ut minima nesciunt?
    </x-layouts.header>



    <section class="mt-8 flex flex-col md:flex-row gap-8">
        <x-card>
            <x-slot:title>2021 Stats</x-slot:title>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet, necessitatibus!
        </x-card>
        <x-card>
            <x-slot:title>2022 Stats</x-slot:title>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad, fugit.
        </x-card>

        <x-card>
            <x-slot:title>2022 Stats</x-slot:title>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad, fugit.
        </x-card>

        <x-card>
            <x-slot:title>2022 Stats</x-slot:title>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad, fugit.
        </x-card>
    </section>

    <section class="mt-12">
        {{-- <x-table /> --}}
    </section>

</x-layouts>
