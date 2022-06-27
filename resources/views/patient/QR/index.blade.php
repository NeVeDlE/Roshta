<x-dashboard-layout>

        <div class="items-center text-center justify-between">     {!! QrCode::size(300)->generate(auth()->id()) !!}</div>

</x-dashboard-layout>
