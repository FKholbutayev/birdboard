<div class="bg-white rounded-lg p-5 shadow flex flex-col mt-3">
    <h3 class="font-normal text-xl py-4 mb-3 -ml-5 border-l-4 pl-4 border-blue-400">
       Invite a User
    </h3>
        <form method="POST" action="{{ $project->path().'/invitations' }}" class="text-right">
            @csrf
            <div class="mb-3">
                <input type="email" name="email"
                       placeholder="Email address"
                       class="border border-gray-300 rounded w-full py-2 px-3">
            </div>
            <button type="submit" class="bg-blue-400 shadow-sm py-2 px-5 text-white rounded-lg">Invite</button>
        </form>

        @include('errors', ['bag' => 'invitations'])
</div>
