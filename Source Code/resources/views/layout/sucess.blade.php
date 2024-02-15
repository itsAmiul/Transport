@if(session()->has('success'))
    <div class="w-full bg-green-400 text-white px-4 py-4 text-xl font-[500] border-2 border-green-800 flex justify-between" >
        {{ session('success') }}
        <span>+</span>
    </div>
@endif
