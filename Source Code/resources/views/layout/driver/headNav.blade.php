<nav class="w-full h-[105px] bg-gray-200 border-b-2 border-gray-800 flex items-center gap-x-8 justify-end px-12" >

    {{-- Driver Profile --}}
    <div class="flex items-center gap-x-2">
        <img src="http://127.0.0.1:8000/img/icons/profile.png" alt="Settings Img" class="w-[60px]" >
        <span class="font-[500] text-xl" >
            <a href="/driver/profile" >Driver Name</a>
        </span>
    </div>

I
    {{-- Log Out Btn --}}
    <form action="/logout" method="POST" >
        @csrf
        @method('POST')

        <button type="submit" class="bg-red-500 text-white font-[600] border-2 border-red-600 outline-none p-2 px-4 hover:bg-red-400"  >Log out</button>
    </form>
</nav>
