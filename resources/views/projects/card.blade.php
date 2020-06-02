    <div class="bg-white rounded-lg p-5 shadow flex flex-col" style="height: 200px">
        <h3 class="font-normal text-xl py-4 mb-3 -ml-5 border-l-4 pl-4 border-blue-400">
           <a href={{ $project->path() }}>{{ $project->title }}</a>
        </h3>
        <div class="text-gray-500 mb-4 flex-1">{{ \Illuminate\Support\Str::limit($project->description, 50)}}</div>

        @can('manage', $project)
        <footer>
            <form method="POST" action="{{ $project->path() }}" class="text-right">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs">Delete</button>
            </form>
        </footer>
        @endcan
    </div>
