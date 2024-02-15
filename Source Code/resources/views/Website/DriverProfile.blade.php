@extends('layout.Html')
@section('pageContent')

    @include('layout.website.headNav')

    @if(!$driver->isEmpty())
        <section class="w-[100%] bg-gray-300 overflow-y-auto"  style="min-height: calc(100vh - 105px)" >
        <section class="px-[200px] py-4" >

            <div class="mt-4" >
                <h1 class="text-2xl font-[800]" >Driver Profile  !! </h1>
                <p class="text-xl font-[500]" >Take A look at our driver profile, and don't hesitate to report any Miss Information !</p>
            </div>

            <div class="flex gap-x-12 items-center justify-between mt-8" >
                <img src="http://127.0.0.1:8000/uploads/users/{{ $driver[0]->picture }}" alt="Driver Picture" class="w-[200px] border-2 border-gray-500 rounded-[20px]" >
                <div class="w-[85%]" >
                    <h1 class="text-2xl font-[500] flex items-center gap-x-4" >
                        {{ $driver[0]->name }}
                        @if($driver[0]->status == 'Available')
                            <span class="ml-4 text-lg text-white py-[2px] border-2 border-green-700 px-4 bg-green-500" >{{ $driver[0]->status }}</span>
                        @else
                            <span class="ml-4 text-lg text-white py-[2px] border-2 border-red-700 px-4 bg-red-500" >{{ $driver[0]->status }}</span>
                        @endif

                        I<a href="/reservation/create/{{$driver[0]->user_id}}" class="text-lg text-white py-[2px] border-2 border-gray-700 px-4 bg-gray-500" > Reserve Driver </a>

                        I<input value="http://127.0.0.1:8000/drivers/profile/{{ $driver[0]->id }}" hidden id="inputToCopy" >
                        <button class="flex items-center gap-x-2" id="share" title="Share {{ $driver[0]->name }} Profile" onclick="copyText()">
                            <img src="http://127.0.0.1:8000/img/icons/share.png" class="w-[50px] border-2 border-gray-800 rounded-full"  >
                            <span class="text-lg" >Share</span>
                        </button>
                    </h1>
                    <h1 class="mt-2 text-lg text-justify" >{{ $driver[0]->description }}</h1>
                </div>
            </div>

            <div class="flex justify-between flex-wrap mt-8" >
                <div class="bg-gray-500 border-2 border-gray-700 text-white px-4 py-6 font-[500] w-[48%]" >
                    Member Since :<br>
                    <span class="text-2xl" >{{ $driver[0]->created_at }}</span>
                </div>

                <div class="bg-gray-500 border-2 border-gray-700 text-white px-4 py-6 font-[500] w-[48%]" >
                    Total Reservation :<br>
                    <span class="text-2xl" >{{ $reservationCOUNT }}</span>
                </div>
            </div>

            @auth
                <div class="flex justify-between flex-wrap gap-y-2 mt-4" >
                    <div class="bg-gray-300 border-2 bg-gray-400/10 border-gray-700 text-gray-700 px-4 py-2 font-[500] w-[48%]" >
                        Email :<br>
                        <span class="text-2xl" >{{ $driver[0]->email }}</span>
                    </div>

                    <div class="bg-gray-300 border-2 bg-gray-400/10 border-gray-700 text-gray-700 px-4 py-2 font-[500] w-[48%]" >
                        Phone Number :<br>
                        <span class="text-2xl" >+212 {{ $driver[0]->phone }}</span>
                    </div>

                    <div class="bg-gray-300 border-2 bg-gray-400/10 border-gray-700 text-gray-700 px-4 py-2 font-[500] w-[48%]" >
                        Preferred Payment Type :
                        <span class="text-2xl" > {{ $driver[0]->payment_type }}</span>
                    </div>

                    <div class="bg-gray-300 border-2 bg-gray-400/10 border-gray-700 text-gray-700 px-4 py-2 font-[500] w-[48%]" >
                        Car Model :
                        <span class="text-2xl" > {{ $driver[0]->car_model }}</span>
                    </div>
                </div>
            @else
                <div class="mt-4 border-2 border-gray-800 bg-yellow-300/40 py-8 px-4 flex items-end gap-x-4" >
                    <img src="http://127.0.0.1:8000/img/icons/warning.png" alt="warning Img" class="w-[40px]" >
                    <h1 class="text-2xl font-[500]" >
                        You Need To Be Login To See Additional Information About This Driver !!
                        <a class="underline text-blue-500" href="/login" >Login Now</a>
                    </h1>
                </div>
            @endauth

            <script src="http://127.0.0.1:8000/js/share.js" ></script>
        </section>
    </section>
    @else
        <section class="w-[100%] bg-gray-300 overflow-y-auto"  style="min-height: calc(100vh - 105px)" >
            <section class="px-[200px] pt-[200px] py-4 flex items-center justify-center" >

                <div class="flex items-center gap-x-6 border-2 border-gray-800 py-6 px-12 bg-gray-400/20" >
                    <img src="http://127.0.0.1:8000/img/icons/warning.png" alt="warning img" class="w-[80px]" >
                    <div>
                        <h1 class="text-3xl font-[900]" > Not Found !!</h1>
                        <p class="text-2xl font-[400]" >Please <a class="underline text-blue-700" href="/drivers" >Return Home</a> And Choose An Existing Driver</p>
                    </div>
                </div>
            </section>
        </section>
    @endif
@endsection
