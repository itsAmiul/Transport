@extends('layout.Html')
@section('pageContent')

    @include('layout.website.headNav')

    <section class="w-[100%] bg-gray-300 overflow-y-auto pb-[100px]"  style="min-height: calc(100vh - 105px)">
        <section class="px-[200px] py-4" >

            <form method="POST" action="/reservation/create/{{ $driverId }}" >

                @csrf
                @method('POST')

                <div class="mt-4 flex items-center gap-x-4" >
                    <span class="bg-gray-400/30 py-4 px-4 border-2 border-gray-800 text-3xl" >1</span>
                    <div>
                        <h1 class="text-2xl font-[800]" >Choose Your Traject  !! </h1>
                        <p class="text-xl font-[500]" >Choose Your Destination Based On Driver's Directions & Price !</p>
                    </div>
                </div>

                <div class="mt-4 w-[100%] border-2 border-gray-800 p-2 space-y-2" >

                    @if(!$driverROUTES->isEmpty())
                        @foreach($driverROUTES as $route)
                                <div style="cursor: pointer" class="hover:bg-gray-200 px-4 py-2 flex justify-between items-center bg-gray-400/40 border-2 border-gray-500">
                                    <div class="w-[20%] flex items-end gap-x-4 " >
                                        <input value="{{ $route['id'] }}" name="destination" type="radio" id="{{ $route['id'] }}" class="w-[30px] h-[30px]" ></input>
                                        <label for="{{ $route['id'] }}" class="text-xl font-[500]" >#{{ $route['id'] }}</label>
                                    </div>

                                    <div class="w-[30%] ">
                                        <h1 class="text-xl" ><span class="font-[600]" >Départure :</span> {{ $route['departure'] }}</h1>
                                        <h1 class="text-xl" ><span class="font-[600]" >Destination :</span> {{ $route['destination'] }}</h1>
                                    </div>

                                    <div class="w-[20%]">
                                        <h1 class="text-xl" ><span class="font-[600]" >Estimated Time :</span>  {{ $route['estimated_time'] }} Hours</h1>
                                    </div>

                                    <div class="w-[20%]">
                                        <h1 class="text-xl" ><span class="font-[600]" >Price :</span> {{ $route['price'] }} Dh</h1>
                                    </div>
                                </div>
                        @endforeach
                    @else
                        <div style="cursor: pointer" class="hover:bg-gray-200 px-4 py-2 bg-gray-400/40 border-2 border-gray-500 text-xl ">
                            <h1 class="font-[600]" >This Driver Has No Routes Yet !!</h1>
                            <h2>If You Really Want To Reserve This Client You Can, <a href="/drivers/profile/{{ $driverId }}" class="underline text-blue-700">Return To His Profile</a> And Call Him By His Work Number! </h2>
                        </div>
                    @endif
                </div>


                <div class="mt-20 flex items-center gap-x-4" >
                    <span class="bg-gray-400/30 py-4 px-4 border-2 border-gray-800 text-3xl" >2</span>
                    <div>
                        <h1 class="text-2xl font-[800]" >Choose Your Date & time !! </h1>
                        <p class="text-xl font-[500]" >Please select the date that is most convenient for you from the options provided.</p>
                    </div>
                </div>

                <div class="flex flex-wrap justify-between mt-4" >
                    <div class="flex flex-col w-[48%]" >
                        <label for="date" class="text-xl font-[500]" ></label>
                        <input type="date" name="date" id="date" placeholder="Licence plate" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    </div>
                    <div class="flex flex-col w-[48%]">
                        <label for="time" class="text-xl font-[500]" ></label>
                        <input type="time" name="time" id="time" placeholder="Licence plate" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    </div>
                </div>

                <button type="submit" class="mt-4 text-xl font-[400] text-white py-4 px-6 border-2 border-gray-700 px-4 bg-gray-500" >Confirm Reservation</button>
            </form>
        </section>
    </section>

@endsection
