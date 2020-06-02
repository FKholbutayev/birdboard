    @csrf

    <div class="field mb-6">
        <label for="title" class="label text-sm mb-2 block">Title</label>
        <div class="control">
            <input type="text"
                   class="input bg-transparent border border-gray-500 rounded p-2 text-xs w-full"
                   name="title"
                   value="{{$project->title}}"
                   placeholder="My new project" >
        </div>
    </div>

    <div class="field mb-6">
        <label for="title" class="label text-sm mb-2 block">Description</label>

        <div class="control">
            <textarea rows="10"
                   class="input bg-transparent border border-gray-500 rounded p-2 text-xs w-full"
                   name="description"
                   placeholder="My new project"> {{$project->description}}
            </textarea>
        </div>
    </div>

    <div class="field ">
        <div class="control">
            <button type="submit"
                    class="bg-blue-400 shadow-sm py-2 px-5 text-white rounded-lg is-link mr-2">
                    {{$project->title ? 'Edit': 'Create'}}
            </button>
        <a href="{{$project->path()}}">Cancel</a>
        </div>
    </div>

    @if($errors->any())
        <div class="field mt-6">
            @foreach ($errors->all() as $error)
                <li class="text-sm text-red-600">{{$error}}</li>
            @endforeach
        </div>
    @endif





