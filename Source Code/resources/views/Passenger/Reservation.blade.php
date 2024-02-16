@extends('layout.Html')
@section('pageContent')

    {{-- Head Nav --}}
    @include('layout.website.headNav')

    {{-- Page Content --}}
    <section class="w-[100%] bg-gray-300 overflow-y-auto" style="min-height: calc(100vh - 105px)" >

        <div class="px-[200px] w-full py-4 space-y-4" >
            @include('layout.sucess')

                    <div class="RESERVATIONS space-y-2">

                        @if($reservationDATA->isEmpty())
                            <div class="border-2 border-gray-600 px-12 py-4 bg-gray-200" >
                                <p class="text-xl font-[600]" >We Are Sorry, But You Have No Reservation Yet !! </p>
                                <a href="/drivers" class="text-lg underline text-blue-700 " >Find A Driver To Create A New Reservation</a>
                            </div>
                        @else
                            <div class="flex justify-between px-6 text-lg font-[500] bg-gray-500 text-white py-2 border-2 border-gray-800">
                                <h1 class="w-[5%]" >Id</h1>
                                <h1 class="w-[25%]" >Reserved Driver</h1>
                                <h1 class="w-[45%]" >Information</h1>
                                <h1 class="w-[25%]" >Action</h1>
                            </div>

                            @foreach($reservationDATA as $reservation)
                                <div class="flex justify-between items-center px-6 text-lg bg-gray-200 text-gray-800 py-2 border-2 border-gray-800">
                                    <div class="w-[5%] font-[700]" >#{{ $reservation->id }}</div>
                                    <div class="w-[25%] flex items-center gap-x-2" >
                                        <img src="http://127.0.0.1:8000/uploads/users/{{ $reservation->picture }}" alt="Profile picture" class="w-[100px] rounded-[30px]" >
                                        <span class="font-[500]" >{{ $reservation->name }} <br> {{ $reservation->phone }}</span>
                                    </div>
                                    <div class="w-[45%]" >
                                        <h1><span class="font-[600]" >Reserved Date :</span> {{ $reservation->date }}</h1>
                                        <h1><span class="font-[600]" >Status :</span>
                                            @if($reservation->status === 'Confirmed')
                                                <span class="bg-green-500 text-white border-2 border-green-700 py-[1px] px-2" >{{ $reservation->status }}</span>
                                            @else
                                                <span class="bg-red-500 text-white border-2 border-red-700 py-[1px] px-2" >{{ $reservation->status }}</span>
                                            @endif
                                        </h1>
                                        <h1><span class="font-[600]" >Departure :</span> {{ $reservation->departure }}</h1>
                                        <h1><span class="font-[600]" >Destination :</span> {{ $reservation->destination }}</h1>
                                    </div>
                                    <div class="w-[25%] flex items-center gap-x-2" >
                                        @if($reservation->status === 'Confirmed')
                                            <a href="/pdf/{{ $reservation->id }}" class="bg-green-500 text-white border-2 border-green-700 py-[1px] px-2" >Download Receipt</a>
                                        @else
                                            <form method="POST" action="/reservation/passenger/delete/{{ $reservation->id }}" >
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="p-2" onclick="return confirm('Are You Shure You Want to delete this reservation ?')" >
                                                    <img src="http://127.0.0.1:8000/img/icons/delete.png" alt="Profile picture" class="w-[50px]" >
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            {{ $reservationDATA }}
                        @endif
                    </div>

        </div>
    </section>
@endsection
