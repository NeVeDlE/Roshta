<x-dashboard-layout>

    <x-settings heading="Roshta">
        <div class="home-page">
            <div class="container">
                <div class="landing-page text-center">
                    <div class="Homelogo">
                        <img src="{{asset('images/Logo.png')}}">
                    </div>
                    <h1>All Healthcare in One Place</h1>
                    <div class="Searching">
                        <div class="SearchDoctorButton text-center">
                            <button type="button"
                                    class="mt-3 bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                                <a href="{{route('register')}}">Get Started</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-settings>
</x-dashboard-layout>
