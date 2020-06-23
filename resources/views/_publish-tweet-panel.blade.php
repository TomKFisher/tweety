<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="{{route('tweet.store')}}" method="POST">
        @csrf
        <textarea
            v-model="text"
            :id="tweetBody"
            :name="body"
            name="body"
            id="tweetBody"
            class="w-full"
            placeholder="What up?!"
            required
            autofocus
        >
        </textarea>
        <p id="charNum"></p>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img
                src="{{auth()->user()->avatar}}"
                alt="idk"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >


            <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white">
                Tweet it!
            </button>
        </footer>
        @error('body')
        <p class="text-red-500 text-sm mt-2">{{$message}}</p>
        @enderror

    </form>
</div>

