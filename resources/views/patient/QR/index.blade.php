<x-dashboard-layout>

    <x-settings heading="QR Generation">
        <div>     {!! QrCode::size(300)->generate(auth()->id()) !!}</div>
    </x-settings>
</x-dashboard-layout>
