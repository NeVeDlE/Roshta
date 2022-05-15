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
        <script>/*
    // Initialize and add the map
    function initMap() {
        var options = {
            zoom: 20,
            center: {lat: 27.740473, lng: 30.839398}
        }
        //set a market to a position
        var map = new google.maps.Map(document.getElementById('map'), options);
        const marker = new google.maps.Marker({
            position: {lat: 27.740473, lng: 30.839397},
            map: map,
        });

    }

    window.initMap = initMap;*/


            //get the current position
            let map, infoWindow, pos1 = 0;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {lat: 27.740473, lng: 30.839398},
                    zoom: 17,
                });
                /*  infoWindow = new google.maps.InfoWindow();

                  const locationButton = document.createElement("button");

                  locationButton.textContent = "Pan to Current Location";
                  locationButton.classList.add("custom-map-control-button");
                  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
                  locationButton.addEventListener("click", () => {
                      // Try HTML5 geolocation.
                      if (navigator.geolocation) {
                          navigator.geolocation.getCurrentPosition(
                              (position) => {
                                  const pos = {
                                      lat: position.coords.latitude,
                                      lng: position.coords.longitude,
                                  };
                                  document.getElementById('lat').value = pos.lat;
                                  document.getElementById('lng').value = pos.lng;
                                  infoWindow.setPosition(pos);
                                  infoWindow.setContent("Location found.");
                                  infoWindow.open(map);
                                  map.setCenter(pos);
                              },
                              () => {
                                  handleLocationError(true, infoWindow, map.getCenter());
                              }
                          );
                      } else {
                          // Browser doesn't support Geolocation
                          handleLocationError(false, infoWindow, map.getCenter());
                      }
                  });
              }

              function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                  infoWindow.setPosition(pos);
                  infoWindow.setContent(
                      browserHasGeolocation
                          ? "Error: The Geolocation service failed."
                          : "Error: Your browser doesn't support geolocation."
                  );
                  infoWindow.open(map);
              }*/


                // let infoWindow1 = new google.maps.InfoWindow({
                //      content: "Click the map to get Lat/Lng!",
                //      position: myLatlng,
                //  });
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
                    // Create a new InfoWindow.
                    // infoWindow1 = new google.maps.InfoWindow({
                    //     position: mapsMouseEvent.latLng,
                    // });
                    // infoWindow1.setContent(
                    //     JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                    // );
                    // console.log( mapsMouseEvent.latLng);
                    // infoWindow1.open(map);
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
