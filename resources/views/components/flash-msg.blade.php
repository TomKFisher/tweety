@if (session('success'))
    <div role="alert" class="mb-4">
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Success!
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>{{session('success')}}</p>
        </div>
    </div>
@elseif (session('error'))
    <div role="alert" class="mb-4">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Alert!
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>{{session('error')}}</p>
        </div>
    </div>
@elseif (session('warning'))
    <div role="alert" class="mb-4">
        <div class="bg-orange-500 text-white font-bold rounded-t px-4 py-2">
            Warning!
        </div>
        <div class="border border-t-0 border-orange-400 rounded-b bg-orange-100 px-4 py-3 text-orange-700">
            <p>{{session('warning')}}</p>
        </div>
    </div>
@endif
