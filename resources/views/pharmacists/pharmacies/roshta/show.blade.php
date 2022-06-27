<x-dashboard-layout>
    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Roshta</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="">
                <a href="{{route('pharmacy-index')}}">{{auth()->user()->locations->name}}</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="">
                <a href="{{route('pharmacies.roshta.qr')}}">Scan Patient's Roshta</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('pharmacies.roshta.qr')}}">{{$patient->name}}'s Roshta</a>
            </li>
        </ul>
    </div>
    <div class="tableOfContent flex flex-wrap gap-6 mt-7 w-full">
        <div class="flex flex-col" style="width: 75%">
            <main class=" mt-6  space-y-6">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y rounded-xl divide-gray-200">
                                    <thead class="bg-white divide-y divide-gray-200">
                                    <th class="px-6 py-4 whitespace-nowrap">Name</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Price</th>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($medicines as $medicine)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <p>
                                                            {{$medicine->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <p>
                                                            {{$medicine->price}} ج.م
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More people... -->
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center flex ">
                    <form action="/dashboard/pharmacies/roshta/qr/{{$examination->id}}" method="post">
                        @csrf
                        <x-submit-button>Confirm</x-submit-button>
                    </form>
                </div>

            </main>
        </div>
    </div>


</x-dashboard-layout>
