@if(session()->has('success'))
    <div class="w-full bg-green-500 text-white px-4" >
        {{ session('success') }}
    </div>
@endif
