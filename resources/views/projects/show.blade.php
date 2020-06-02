@extends('layouts.app')
@section('content')

<header class="flex items-center mb-3 py-4">
    <div class="flex justify-between items-end w-full">
        <p class="text-gray-500 font-normal">
            <a class="text-gray-500 font-normal" href="/projects">My Projects</a> / {{ $project->title }}
        </p>
        <div class="flex items-center">
            @foreach($project->members as $member)
                <img src="https://gravatar.com/avatar/{{ md5($member->email) }}?s=60"
                     class="rounded-full w-8 mr-2"
                     alt="{{$member}}'s avatar"/>
            @endforeach

            <img src="https://gravatar.com/avatar/{{ md5($project->owner->email) }}?s=60"
                     class="rounded-full w-8 mr-2"
                     alt="{{$project->owner}}'s avatar"/>

            <a href="{{$project->path().'/edit'}}"
               class="bg-blue-400 shadow-sm py-2 px-5 text-white rounded-lg">Edit Project</a>
        </div>
    </div>
</header>

<main>
    <div class="lg:flex -mx-3 mb-6">
        <div class="lg:w-3/4 px-3">
            <div class="mb-8">
                <h2 class="text-lg text-gray-500 font-normal mb-3">Tasks</h2>
                    @foreach ($project->tasks as $task)
                        <div class="bg-white rounded-lg p-5 shadow mb-3">
                            <form method ="POST" action="{{$task->path()}}">
                                @method('PATCH')
                                @csrf
                                <div class="flex">
                                <input name="body" class="w-full {{ $task->completed ? 'text-gray-600' : ''}}" value="{{$task->body}}">
                                <input name ="completed" type ="checkbox"
                                       onChange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                                </div>
                            </form>
                        </div>
                    @endforeach


                    <div class="bg-white rounded-lg p-5 shadow mb-3">
                        <form action="{{$project->path(). '/tasks'}}" method="POST">
                            @csrf
                            <input name="body" class="w-full" placeholder="Add new tasks ...">
                        </form>
                    </div>
            </div>

            <div>
                <h2 class="text-lg text-gray-500 font-normal mb-3">General Notes</h2>

                <form action="{{$project->path()}}" method="POST">
                    @csrf
                    @method('PATCH')

                    <textarea
                        name="notes"
                        class="bg-white rounded-lg p-5 shadow w-full"
                        style="min-height: 200px">{{$project->notes}}
                    </textarea>
                    <button type="submit"
                            class="bg-blue-400 shadow-sm py-2 px-5 text-white rounded-lg">Save</button>
                </form>

                @include('errors')
            </div>
        </div>

        <div class="lg:w-1/4 px-3 lg:py-8">
            @include('projects.card')
            @include('projects.activity.card')

            @can('manage', $project)
                @include('projects.invite')
            @endcan


        </div>

    </div>
</main>



@endsection


