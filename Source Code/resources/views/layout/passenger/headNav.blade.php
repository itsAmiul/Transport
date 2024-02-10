<nav class="w-full h-[105px] bg-gray-200 border-b-2 border-gray-800 flex items-center gap-x-8 justify-between px-[200px]" >


    <a href="/" class="flex" >
        <img src="http://127.0.0.1:8000/img/logo/icon.png" alt="Logo" class="w-[50px]" >
    </a>

    <section class="flex items-center gap-x-8" >
        {{-- Driver Profile --}}
        <div class="flex items-center gap-x-2">
            <ul class="flex gap-x-4 text-lg font-[400]" >
                <li><a class="" href="/passenger/reservation" >Reservations</a></li>
                <li><a class="" href="/passenger/profile" >Profile</a></li>
            </ul>
        </div>
        I
        {{-- Log Out Btn --}}
        <form action="/logout" method="POST" >
            @csrf
            @method('POST')
            <button type="submit" class="bg-red-500 text-white font-[600] border-2 border-red-600 outline-none p-2 px-4 hover:bg-red-400"  >Log out</button>
        </form>
    </section>
</nav>
