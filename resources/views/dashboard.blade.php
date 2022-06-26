<x-dashboard-layout>

    <div class="mx-auto container py-12 bg-white">
        <div role="list" aria-label="Our stats." class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <div role="listitem" class="flex justify-center w-full lg:border-r border-gray-300 py-6">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/4_col_with%20_icons-svg1.svg" class="h-20 w-20" alt="profile"/>

                <div class="text-gray-800 dark:text-white pl-12 w-1/2">
                    <h1 class="font-bold text-2xl lg:text-5xl tracking-1px">{{\App\Models\User::count()}}</h1>
                    <h2 class="text-base lg:text-lg mt-4 leading-8 tracking-wide">Patients</h2>
                </div>
            </div>
            <div role="listitem" class="flex justify-center w-full lg:border-r border-gray-300 py-6">
                <img src="{{asset('images/Doctor.png')}}" class="h-20 w-20" alt="ambulance"/>

                <div class="text-gray-800 dark:text-white w-1/2 pl-12">
                    <h1 class="font-bold text-2xl lg:text-5xl tracking-1px">
                        {{\App\Models\Location::where('type','clinic')->where('status','accepted')->count()}}</h1>
                    <h2 class="text-base lg:text-lg mt-4 leading-8 tracking-wide">Clinics</h2>
                </div>
            </div>
            <div role="listitem" class="flex justify-center w-full lg:border-r border-gray-300 py-6">
                <img src="{{asset('images/Pharmacist.png')}}" class="h-20 w-20" alt="clock"/>

                <div class="text-gray-800 dark:text-white w-1/2 pl-12">
                    <h1 class="font-bold text-2xl lg:text-5xl tracking-1px">35</h1>
                    <h2 class="text-base lg:text-lg mt-4 leading-8 tracking-wide">Pharmacies</h2>
                </div>
            </div>
            <div role="listitem" class="flex justify-center w-full py-6">
                <img src="{{asset('images/medicine.png')}}"  class="h-20 w-20" alt="cube"/>

                <div class="text-gray-800 dark:text-white w-1/2 pl-12">
                    <h1 class="font-bold text-2xl lg:text-5xl tracking-1px">530</h1>
                    <h2 class="text-base lg:text-lg mt-4 leading-8 tracking-wide">Medicine</h2>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
