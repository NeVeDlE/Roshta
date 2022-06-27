<x-dashboard-layout>

    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Qr Code</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="">
                <a href="{{route('clinic-management')}}">{{$clinic->name}}</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="/dashboard/clinics/{{$clinic->id}}/examine">Examine Patient</a>
            </li>
        </ul>
    </div>
    <div class="tableOfContent flex flex-wrap gap-6   bg-white m-7 w-full">

        <div class="row mt-8 rounded-xl ">
            <div class="col">
                <div class="rounded-xl text-blue-400 " style="width:500px;" id="reader"></div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function onScanSuccess(qrCodeMessage) {
            window.location.href = "/dashboard/clinics/{{$clinic->id}}/examine/" + qrCodeMessage;
        }

        function onScanError(errorMessage) {
            //handle scan error
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {fps: 10, qrbox: 250});
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>
</x-dashboard-layout>
