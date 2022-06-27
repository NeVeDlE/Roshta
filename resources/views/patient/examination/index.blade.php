<x-dashboard-layout>
    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Examinations</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('examinations')}}">Examinations</a>
            </li>
        </ul>
    </div>
    <div class="tableOfContent flex flex-wrap gap-6 mt-7 w-full">
        <div class="flex flex-col">
            <main class=" mt-6  space-y-6">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y rounded-xl divide-gray-200">
                                    <thead class="bg-white divide-y divide-gray-200">
                                    <th class="px-6 py-4 whitespace-nowrap">Report</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Made By</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Medicines Price</th>
                                    <th class="px-6 py-4 whitespace-nowrap"></th>
                                    <th class="px-6 py-4 whitespace-nowrap"></th>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($examinations=auth()->user()->examinations()->latest()->paginate(10) as $examination)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <p>
                                                            {{$examination->report}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <p>
                                                            Dr.
                                                            {{\App\Models\User::where('id',$examination->doctor_id)->first()->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <p>
                                                    {{\Illuminate\Support\Facades\DB::table('examination_medicines')
                                                    ->join('medicines','medicines.id','=','examination_medicines.medicine_id')->where('examination_medicines.examination_id','=',$examination->id)
                                                                                                            ->sum('medicines.price') }}
                                                    ج.م
                                                </p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button onclick="buyRoshta({{$examination->id}})"
                                                        class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                                                    Buy Medicines for this Exmination
                                                </button>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="/dashboard/examinations/{{$examination->id}}/buy/qr"
                                                   class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600">
                                                    Generate QR
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More people... -->
                                    </tbody>

                                </table>
                                {{$examinations->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>

    </div>
    <script>
        let pos;
        window.onload = function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                    },
                    () => {
                    }
                );
            }
        }
        function buyRoshta(id) {
            window.open("/dashboard/examinations/" + id + "/buy/" + pos.lat + "/" + pos.lng);
        }
    </script>

</x-dashboard-layout>
