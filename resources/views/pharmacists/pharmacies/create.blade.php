<x-dashboard-layout>

    <x-settings heading="Clinic's Register">
        <h1 class="text-center font-bold text-xl">Register!</h1>
        <form action="/dashboard/pharmacies" method="POST" class="mt-10" enctype="multipart/form-data">
            @csrf
            <x-form.input name="name" required/>
            <input name="lat" type="text" id="lat" required hidden>
            <input name="lng" type="text" id="lng" required hidden>

            <h4 class="text-center font-bold text-xl mb-2">Pin your Pharmacy's position on the map!</h4>
            <div id="map"></div>
            <div class="mb-6 mt-6">
                <button type="submit"
                        class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                    Submit
                </button>
            </div>


        </form>
        <script>
            //get the current position
            let map, infoWindow, pos1 = 0;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {lat: 27.740473, lng: 30.839398},
                    zoom: 17,
                });

                // Configure the click listener.
                var mark;
                map.addListener("click", (mapsMouseEvent) => {

                    var pos = mapsMouseEvent.latLng.toJSON();
                    document.getElementById('lat').value = pos.lat;
                    document.getElementById('lng').value = pos.lng;

                    if (mark != null) mark.setMap(null);
                    mark = new google.maps.Marker({
                        position: pos,
                        map,
                    })
                });

                window.initMap = initMap;
            }
        </script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuZGl4wf86aziESc5BDGrJuC8PsJlFUbg&callback=initMap&v=weekly"
            defer
        ></script>
    </x-settings>
</x-dashboard-layout>
