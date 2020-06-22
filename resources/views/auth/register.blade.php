<x-master>
    <div class="container mx-auto flex justify-center ">
        <div class="px-12 py-8 bg-gray-200 rounded-lg">
            <div class="col-md-8">
                <div class="font-bold text-lg mb-4">{{ __('Register') }}</div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="Name"
                        >
                            name
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="name"
                               id="name"
                               autocomplete="name"
                               value="{{old('name')}}"
                               required
                        >

                        @error('name')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="username"
                        >
                            Username
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="username"
                               id="username"
                               autocomplete="username"
                               value="{{old('username')}}"
                               required
                        >

                        @error('username')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="email"
                        >
                            Email
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="email"
                               name="email"
                               id="email"
                               autocomplete="email"
                               value="{{old('email')}}"
                               required
                        >

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="password"
                        >
                            Password
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="password"
                               name="password"
                               id="password"
                               autocomplete="password"
                               value="{{old('password')}}"
                               required
                        >

                        @error('password')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for=password_confirmation"
                        >
                            Password Confirmation
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               value="{{old('password_confirmation')}}"
                               required
                        >

                        @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2"
                        >
                            Submit
                        </button>

                        <a href="/login" class="text-xs text-gray-700"> already signed up? login</a>

                    </div>

                </form>
            </div>
        </div>
    </div>
</x-master>
