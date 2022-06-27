<x-dashboard-layout>
    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Pharmacy Registration</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('pharmacies-register')}}">Register Your Pharmacy</a>
            </li>
        </ul>
    </div>
    <div class="tableOfContent flex flex-wrap gap-6 mt-7 w-full">
        <div class="flex justify-center items-center" style="width: 75%">
            <div class="flex flex-col p-3 items-center w-full bg-white rounded-xl shadow" style="width: 75%">
                <main class=" mt-6  space-y-6">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                <form action="/dashboard/pharmacies" method="POST" class="mt-10"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <x-form.input name="name" required/>
                                    <input name="lat" type="text" id="lat" required hidden>
                                    <input name="lng" type="text" id="lng" required hidden>

                                    <h4 class="text-center font-bold text-xl mb-2">Pin your Pharmacy's position on the
                                        map!</h4>
                                    <div id="map" class="rounded-xl w-full"></div>
                                    <div class="mb-6 mt-6 text-center flex">
                                        <button type="submit"
                                                class="bg-blue-500 text-white w-full uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

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
        defer>

    </script>

</x-dashboard-layout>
