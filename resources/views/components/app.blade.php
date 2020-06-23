<x-master>
    <section class="px-8">
        <main class="container mx-auto">
            <x-flash-msg></x-flash-msg>
            <div class="lg:flex lg:justify-between">
                @if(auth()->check())
                    <div class="lg:w-32">
                        @include('_sidebar-links')
                    </div>
                @endif

                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                    {{ $slot }}
                    @yield('content')
                </div>

                @if(auth()->check())
                        @include('_friends-list')
                @endif
            </div>

        </main>
    </section>

</x-master>
