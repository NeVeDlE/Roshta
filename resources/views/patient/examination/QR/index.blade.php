<x-dashboard-layout>

    <x-settings heading="Roshta QR Generation">
        <div>     {!! QrCode::size(300)->generate($id) !!}</div>
    </x-settings>
</x-dashboard-layout>
