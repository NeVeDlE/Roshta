<x-dashboard-layout>

    <x-settings heading="{{auth()->user()->locations->name}}'s Examination Process">


        <div class="flex flex-col">
            <main class="max-w-6xl mt-6  space-y-6">
                <h1>{{$patient->name}}'s Roshta</h1>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
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
                                                    <div class="text-sm font-medium text-red-600">
                                                        <p>
                                                            {{$medicine->price}}ج.م
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
                <div>
                    <form action="/dashboard/pharmacies/roshta/qr/{{$examination->id}}" method="post">
                        @csrf
                        <x-submit-button>Confirm</x-submit-button>
                    </form>
                </div>

            </main>
        </div>


    </x-settings>

</x-dashboard-layout>
