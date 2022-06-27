<div>
    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Examinations</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('job-requests')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('job-requests')}}">My Job Requests</a>
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
                                @if(isset($job))
                                    @if(class_basename($job)=='Doctor')
                                        <div class="mb-6">
                                            <x-form.label name="Job"/>
                                            <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                                   type="text" value="Doctor" disabled>
                                        </div>
                                        <div class="mb-6">
                                            <x-form.label name="Specialization(In Doctor's Only)"/>
                                            <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                                   type="text" value="{{$job->speciality->name}}" disabled>
                                        </div>
                                    @else
                                        <div class="mb-6">
                                            <x-form.label name="Job"/>
                                            <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                                   type="text" value="Pharmacist" disabled>
                                        </div>
                                    @endif
                                    <div class="mb-6">
                                        <x-form.label name="University"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$job->university}}" disabled>
                                    </div>
                                    <div class="mb-6">
                                        <x-form.label name="Graduate Date"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$job->graduate_date}}" disabled>
                                    </div>
                                    <div class="mb-6">
                                        <x-form.label name="Published"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$job->created_at->diffForHumans()}}" disabled>
                                    </div>
                                    <div class="mb-6">
                                        <x-form.label name="Status"/>
                                        @if($job->status=='accepted')
                                            <input
                                                class="border border-gray-200 text-center text-green-400 p-2 rounded-xl w-full bg-gray-100"
                                                type="text" value="{{ucwords($job->status)}}" disabled>
                                        @elseif($job->status=='pending')
                                            <input
                                                class="border border-gray-200 text-center text-yellow-600 p-2 rounded-xl w-full bg-gray-100"
                                                type="text" value="{{ucwords($job->status)}}" disabled>
                                        @else
                                            <input
                                                class="border border-gray-200 text-center text-red-400 p-2 rounded-xl w-full bg-gray-100"
                                                type="text" value="{{ucwords($job->status)}}" disabled>
                                        @endif

                                    </div>

                                @else
                                    No Reqs.
                                @endif
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>


    </div>

</div>
