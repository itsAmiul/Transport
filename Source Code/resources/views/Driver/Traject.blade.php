@extends('layout.Html')
@section('pageContent')

    <section class="w-full w-[100%] h-[100vh] flex justify-between items-center">

        {{-- Nav Bar --}}
        @include('layout.driver.navBar')

        {{-- Page Content --}}
        <section class="w-[80%] h-[100vh] bg-gray-300 overflow-y-auto">

            {{-- Head Nav --}}
            @include('layout.driver.headNav')

            <div class="px-12 py-4 space-y-4 flex flex-wrap justify-between" >

                <div class="w-[100%] flex justify-between" >
                    <div>
                        <h1 class="text-2xl font-[600] " >Routes</h1>
                        <span  class="text-xl font-[500] ">Add Routes That You Can Work On !</span>
                    </div>
                    <button class="bg-gray-600 text-white px-6 py-4 text-lg font-[600] border-2 border-gray-800" onclick="popUp()" >Add New Route</button>
                </div>

                <div class="RESERVATIONS space-y-2 w-[100%]">
                    @if($routes->isEmpty())
                        <div class="border-2 border-gray-600 px-12 py-4 bg-gray-200" >
                            <p class="text-xl font-[600]" >We Are Sorry, But You Have No Routes Yet !! </p>
                            <span>Wait Until Someone Make A Reservation</span>
                        </div>
                    @else
                        <div class="flex justify-between px-6 text-lg font-[500] bg-gray-500 text-white py-2 border-2 border-gray-800">
                            <h1 class="w-[10%]" >Id</h1>
                            <h1 class="w-[35%]" >Details</h1>
                            <h1 class="w-[20%]" >Estimated Time</h1>
                            <h1 class="w-[15%]" >Price</h1>
                            <h1 class="w-[20%]" >Action</h1>
                        </div>

                        @foreach($routes as $route)
                            <div class="flex justify-between items-center px-6 text-lg bg-gray-200 text-gray-800 py-2 border-2 border-gray-800">
                                <div class="w-[10%] font-[700]" >#{{ $route->id }}</div>
                                <div class="w-[35%] flex  gap-x-2 flex-col" >
                                    <h1><span class="font-[600]" >Departure :</span> {{ $route->departure }}</h1>
                                    <h1><span class="font-[600]" >Destination :</span> {{ $route->destination }}</h1>
                                </div>
                                <div class="w-[20%] flex items-center gap-x-2" >
                                    {{ $route->estimated_time }} Hours<br>
                                </div>
                                <div class="w-[15%] flex items-center gap-x-2" >
                                    {{ $route->price }} Dh<br>
                                </div>
                                <div class="w-[20%] flex items-center gap-x-2" >
                                    <form method="POST" action="/traject/delete/{{ $route->id }}" >
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="p-2" onclick="return confirm('Are You Shure You Want to delete this reservation ?')" >
                                            <img src="http://127.0.0.1:8000/img/icons/delete.png" alt="Profile picture" class="w-[50px]" >
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        {{ $routes }}
                    @endif

            </div>
        </section>
    </section>


    <section id="popUP" class="fixed top-0 right-0 w-[100%] h-[100vh] bg-gray-200/40 flex justify-end py-6 px-12 hidden"  >
        <div class="w-[40%] py-6 px-12 bg-gray-300 border-2 border-gray-800">
            <button class="bg-red-600 text-white px-4 py-2 text-lg font-[600] border-2 border-red-800 hover:bg-red-300" onclick="popUp()" >CLose</button>
            <form method="POST" action="/driver/traject" class="flex flex-col w-[100%] gap-y-2 mt-4" >

                @csrf
                @method('POST')

                <select id="departure" name="departure" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <option disabled selected >Select Your Departure City</option>
                    @foreach($cities as $city)
                        <option value="{{ $city }}" >{{ $city }}</option>
                    @endforeach
                </select>

                <select id="destination" name="destination" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <option disabled selected >Select Your Destination City</option>
                    @foreach($cities as $city)
                        <option value="{{ $city }}" >{{ $city }}</option>
                    @endforeach
                </select>

                <input type="number" placeholder="Estimated Time" name="estimated_time" min="0" max="30" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                <input type="number" placeholder="Price" name="price" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >

                <button type="submit" class="bg-gray-500 text-white font-[600] border-2 border-gray-600 w-[100%] outline-none p-2 text-left px-4" >Add Route To Your Profile</button>
            </form>
        </div>
    </section>

    <script src="http://127.0.0.1:8000/js/popUp.js" ></script>
@endsection
