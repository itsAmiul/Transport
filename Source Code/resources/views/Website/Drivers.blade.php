@extends('layout.Html')
@section('pageContent')

    @include('layout.website.headNav')

    <section class="w-[100%] bg-gray-300 overflow-y-auto" style="min-height: calc(100vh - 105px)" >
        <section class="px-[200px] py-4" >

            <div class="flex items-center gap-x-4 mt-4" >
                <button class=" text-white font-[600] border-2 border-gray-600 outline-none text-center p-2 text-left px-4" >
                    <img src="http://127.0.0.1:8000/img/icons/filter.png" alt="Logo" class="w-[40px]" >
                </button>

                <div>
                    <h1 class="text-2xl font-[800]" >Available Drivers  !! </h1>
                    <p class="text-xl font-[500]" >Make Your Reservation Simply By Chosing The Right Drivers And Fill In The Right Information !!</p>
                </div>
            </div>

            <div class="mt-8" >
                <form action="/drivers" method="POST" class="flex justify-between ">

                    @csrf
                    @method('POST')

                    <input placeholder="Search A Driver By His Name, Location" type="search" name="search" class="border-2 border-gray-600 w-[80%] outline-none p-2 px-4">
                    <button type="submit" class="bg-gray-500 text-white font-[600] border-2 w-[18%] border-gray-600 outline-none text-center p-2 text-left px-4" > Search </button>
                </form>
            </div>

            {{ $drivers }}
            @if($drivers->isEmpty())

            @else
                <div class="mt-12 flex gap-4" >
                    @foreach($drivers as $driver)
                            <div class="bg-gray-200 border-2 border-gray-500 w-[30%] flex items-center justify-center gap-x-8 py-4" >
                                <a href="/drivers/profile/{{ $driver->id }}" >
                                    <img src="http://127.0.0.1:8000/uploads/users/{{ $driver->picture }}" alt="Logo" class="w-[150px] rounded-[30px] border-2 border-gray-800" >
                                </a>
                                <div class="text-lg font-[500]">
                                    <h1><a href="/drivers/profile/{{ $driver->id }}" >{{ $driver->name }}</a></h1>
                                    <h1 class="flex items-center" >
                                        <img src="http://127.0.0.1:8000/img/icons/location.png" alt="Logo" class="w-[30px]" >
                                        {{ $driver->location }}
                                    </h1>
                                    <h1 >
                                        Status :
                                        @if( $driver->status  == 'Available')
                                            <span class="bg-green-500 text-white border-2 border-green-700 py-[1px] px-2" >{{ $driver->status }}</span>
                                        @else
                                            <span>{{ $driver->status }}</span>
                                        @endif
                                    </h1>
                                </div>
                            </div>
                    @endforeach
                </div>
            @endif
        </section>
    </section>

@endsection
