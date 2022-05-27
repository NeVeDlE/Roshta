<x-dashboard-layout>

    <x-settings heading="{{$pharmacy->name}}'s Examination Process">
        <div class="row">
            <div class="col">
                <div style="width:500px;" id="reader"></div>
            </div>
        </div>


    </x-settings>
    <script type="text/javascript">
        function onScanSuccess(qrCodeMessage) {
            window.location.href = "/dashboard/pharmacies/roshta/qr/"+qrCodeMessage;
        }

        function onScanError(errorMessage) {
            //handle scan error
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {fps: 10, qrbox: 250});
        html5QrcodeScanner.render(onScanSuccess, onScanError);

    </script>
</x-dashboard-layout>
