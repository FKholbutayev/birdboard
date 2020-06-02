@extends('layouts.app')
@section('content')

    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-end">
            <h2 class="text-gray-500 font-normal">My Projects</h2>
            <a href="/projects/create"
               @click.prevent="$modal.show('new-project')"
               class="bg-blue-400 shadow-sm py-2 px-5 text-white rounded-lg">New Project</a>
        </div>
    </header>

    <main class="lg:flex flex-wrap -mx-3">
        @forelse ($projects as $project)
        <div class="lg:w-1/3 px-3 pb-6">
            @include('projects.card')
        </div>

        @empty
        <div>No projects yet</div>
        @endforelse

    </main>

    <new-project-modal></new-project-modal>


@endsection
