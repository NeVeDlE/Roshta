<x-dashboard-layout>

    <x-settings heading="Doctor's Register">
        <div>     {!! QrCode::size(300)->generate(auth()->id()) !!}</div>
    </x-settings>
</x-dashboard-layout>
