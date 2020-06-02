<div class="bg-white rounded-lg p-5 shadow  mt-3">
    <ul class="text-sm">
        @foreach($project->activity as $activity)
            <li>
                @include ("projects.activity.{$activity->description}")
                <span class="text-gray-500">
                    {{$activity->created_at->diffForHumans(null, true)}}
                </span>
            </li>
        @endforeach
    </ul>
</div>
