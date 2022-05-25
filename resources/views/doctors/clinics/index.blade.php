<x-dashboard-layout>

    <x-settings heading="{{$clinic->name}}'s Examination Requests">
        <livewire:doctors.clinic-examination-requests :clinic="$clinic"/>
    </x-settings>
</x-dashboard-layout>
