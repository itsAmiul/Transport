@extends('layout.Html')
@section('pageContent')

    <section class="w-full h-[100vh] flex justify-between items-center">

        {{-- Nav Bar --}}
        @include('layout.driver.navBar')

        {{-- Page Content --}}
        <section class="w-[80%] h-[100vh] bg-gray-300 overflow-y-auto">

            {{-- Head Nav --}}
            @include('layout.driver.headNav')

            <div class="px-12 w-full py-4 space-y-4" >

                @include('layout.sucess')

                <div class="w-full bg-gray-400 text-white p-4 border-2 border-gray-800" >
                    <h1 class="text-lg font-[500]" >Check All Your Reservation Details On THis Page, And don't forget to start Accepting Them to start making Money !</h1>
                </div>

                <div class="RESERVATIONS space-y-2">
                    @if($reservationDATA->isEmpty())
                        <div class="border-2 border-gray-600 px-12 py-4 bg-gray-200" >
                            <p class="text-xl font-[600]" >We Are Sorry, But You Have No Reservation Yet !! </p>
                            <span>Wait Until Someone Make A Reservation</span>
                        </div>
                    @else
                        <div class="flex justify-between px-6 text-lg font-[500] bg-gray-500 text-white py-2 border-2 border-gray-800">
                            <h1 class="w-[5%]" >Id</h1>
                            <h1 class="w-[25%]" >Reserved By</h1>
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
                                        <form method="POST" action="/reservation/cancel/{{ $reservation->id }}" >
                                            @csrf
                                            @method('put')
                                            <button type="submit" onclick="return confirm('Are You Shure You Want to cancel this reservation ?')" class="hover:bg-red-200 hover:text-red-800 bg-red-500 text-white border-2 border-red-700  px-4 py-2" >Cancel</button>
                                        </form>

                                        <form method="POST" action="/reservation/done/{{ $reservation->id }}" >
                                            @csrf
                                            @method('put')
                                            <button type="submit" onclick="return confirm('Are You Shure You Want to FInish this reservation ?')" class="hover:bg-green-200 hover:text-green-800 bg-green-500 text-white border-2 border-green-700  px-4 py-2" >Done</button>
                                        </form>

                                    @elseif($reservation->status === 'Done')
                                        <span class="bg-green-500 border-2 border-green-800 text-white px-4 py-2" >This reservation is finished</span>
                                    @else
                                        <form method="POST" action="/reservation/confirm/{{ $reservation->id }}" >
                                            @csrf
                                            @method('put')
                                            <button onclick="return confirm('Are You Shure You Want to confirm this reservation ?')"  type="submit" class="hover:bg-green-200 hover:text-green-800 bg-green-500 border-2 border-green-800 text-white px-4 py-2" >Confirm</button>
                                        </form>
                                        <form method="POST" action="/reservation/delete/{{ $reservation->id }}" >
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
    </section>
@endsection
