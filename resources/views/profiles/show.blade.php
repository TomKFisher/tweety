<x-app>
    <div>
        <header class="mb-6 relative">
            <img
                src="/images/tool.png"
                alt="banner"
                class="mb-2 rounded-lg"

            >
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
                    <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
                </div>

                <div>
                    <a href="" class="rounded-full border-gray-300 py-2 px-4 text-black text-xs mr-2">
                        edit profile
                    </a>
                    <a href="" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
                        Follow me!
                    </a>
                </div>
            </div>

            <p class="text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex
                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit
                anim id est laborum.
            </p>

            <img
                src="{{$user->avatar}}"
                alt="idk"
                class="rounded-full mr-2 absolute"
                style="width: 150px; left: calc(50% - 75px); top:50%"
            >


        </header>
        {{$user->name}}'s profile page!

        <hr>

        @include('tweets._timeline')
    </div>
</x-app>
