<x-dashboard-layout>

    <x-settings heading="{{$medicine->name}}'s Info">
        <div>
            <h3 class="my-2 mx-2">{{$medicine->name}}</h3>
            <p class="my-2 mx-2">{{$medicine->description}}</p>
            <p class="my-2 mx-2">{{$medicine->price}} ج.م</p>
            @if(isset($medicine->photo))
                <img src="{{asset('storage/'.$medicine->photo)}}" alt="{{$medicine->name}}'photo"
                     class="rounded-xl ml-6 my-2 mx-2 " width="100">
            @endif
            <a target="_blank"
               href="https://www.google.com/maps/dir/{{$currentLat}},{{$currentLng}}/{{$pos[0]->lat}},{{$pos[0]->lng}}/{{'@'.$currentLat}},{{$currentLng}},17z"
               class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Buy
                Medicine</a>

        </div>


    </x-settings>
</x-dashboard-layout>