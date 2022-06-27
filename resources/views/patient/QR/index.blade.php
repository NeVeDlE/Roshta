<x-dashboard-layout>

    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Qr Code </h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('QR')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('QR')}}">QR</a>
            </li>
        </ul>
    </div>
    <div class="tableOfContent flex flex-wrap gap-6  m-7 w-full">

        <div class="idCode rounded-md shadow-md pb-5 mb-4">
            <h4>Scan This</h4>
            {!! QrCode::size(300)->generate(auth()->id()) !!}
        </div>
    </div>

</x-dashboard-layout>
