
<div class="lg:w-1/6 bg-gray-200 border border-gray-300 rounded py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @forelse(auth()->user()->follows as $user)
            <li class=" {{$loop->last ? '' : 'mb-4'}}">
                <div>
                    <a href="{{route('profile', $user)}}" class="flex items-center text-sm">
                        <img
                            src="{{$user->avatar}}"
                            alt="idk"
                            class="rounded-full mr-2"
                            width="40"
                            top="40"
                        >
                        {{$user->name}}
                    </a>
                </div>
            </li>
        @empty
            <p class="p-4">No friends yet...</p>
        @endforelse

    </ul>
</div>
