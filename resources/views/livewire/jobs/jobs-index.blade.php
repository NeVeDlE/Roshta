<div>
    @if(isset($job))
        <div class="flex flex-col">
            <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
                @if(class_basename($job)=='Doctor')
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Specialization(In Doctor's
                            Only)</label>
                        <h2 class="border border-gray-200 p-2  w-full rounded">{{$job->speciality->name}}</h2>
                    </div>
                @endif
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700">University</label>
                    <h2 class="border border-gray-200 p-2 w-full rounded">{{$job->university}}</h2>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Graduate Date</label>
                    <h2 class="border border-gray-200 p-2 w-full rounded">{{$job->graduate_date}}</h2>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Published</label>
                    <h2 class="border border-gray-200 p-2 w-full rounded">{{$job->created_at->diffForHumans()}}</h2>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Status</label>
                    @if($job->status=='accepted')
                        <h2 class="border text-green-600 border-gray-200 p-2 w-full rounded">{{ucwords($job->status)}}</h2>
                    @elseif($job->status=='pending')
                        <h2 class="border text-yellow-600 border-gray-200 p-2 w-full rounded">{{ucwords($job->status)}}</h2>
                    @else
                        <h2 class="border text-red-600 border-gray-200 p-2 w-full rounded">{{ucwords($job->status)}}</h2>
                    @endif
                </div>
            </main>
        </div>
    @else
        <p>No Reqs yet</p>
    @endif
</div>
