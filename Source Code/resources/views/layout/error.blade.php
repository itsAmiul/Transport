@if(session()->has('error'))
    <div class="w-full bg-red-500 text-white px-4" >
        {{ session('error') }}
    </div>
@endif
