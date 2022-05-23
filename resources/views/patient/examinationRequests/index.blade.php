<x-dashboard-layout>

    <x-settings heading="{{auth()->user()->name}}'s Examination Requests">
        <livewire:patient.patient-examination-requests/>
    </x-settings>
</x-dashboard-layout>
