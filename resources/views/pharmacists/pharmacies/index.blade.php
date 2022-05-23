<x-dashboard-layout>

    <x-settings heading="{{auth()->user()->name}}'s {{$pharmacy->name}}">
        <div>
            <div class="flex flex-col">
                <main class="max-w-6xl mx-auto lg:mt-20">
                    <livewire:pharmacists.pharmacy-index :pharmacy="$pharmacy"/>
                </main>
            </div>

        </div>
    </x-settings>
</x-dashboard-layout>
