@extends('layout.Html')
@section('pageContent')

    {{-- Page Content --}}
    <section class="w-[100%] h-[100vh] bg-gray-300 overflow-y-auto">

        {{-- Head Nav --}}
        @include('layout.passenger.headNav')

        <div class="px-[200px] w-full py-4 space-y-4" >
            <div class="flex justify-between px-6 text-lg font-[500] bg-gray-500 text-white py-2 border-2 border-gray-800">
                <h1 class="w-[5%]" >Id</h1>
                <h1 class="w-[25%]" >Reserved Driver</h1>
                <h1 class="w-[45%]" >Information</h1>
                <h1 class="w-[25%]" >Action</h1>
            </div>

            <div class="RESERVATIONS space-y-2">
                <div class="flex justify-between items-center px-6 text-lg bg-gray-200 text-gray-800 py-2 border-2 border-gray-800">
                    <div class="w-[5%] font-[700]" >#1</div>
                    <div class="w-[25%] flex items-center gap-x-2" >
                        <img src="http://127.0.0.1:8000/img/icons/profile.png" alt="Profile picture" class="w-[100px]" >
                        <span class="font-[500]" >Amine elk arroudi</span>
                    </div>
                    <div class="w-[45%]" >
                        <h1><span class="font-[600]" >Reserved Date :</span> 2024-02-08 20:30:08</h1>
                        <h1><span class="font-[600]" >Status :</span> <span class="bg-green-500 text-white border-2 border-green-700 py-[1px] px-2" >Confirmed</span></h1>
                        <h1><span class="font-[600]" >Departure :</span> Safi, Lala Hnia</h1>
                        <h1><span class="font-[600]" >Destination :</span> El Jadida</h1>
                    </div>
                    <div class="w-[25%] flex items-center gap-x-2" >
                        <a href="" ><img src="http://127.0.0.1:8000/img/icons/delete.png" alt="Profile picture" class="w-[50px]" ></a>
                    </div>
                </div>

                <div class="w-full" >
                    {{-- Pagination --}}
                </div>
            </div>

            <div class="border-2 border-gray-600 px-12 py-4 bg-gray-200" >
                <p class="text-xl font-[600]" >We Are Sorry, But You Have No Reservation Yet !! </p>
                <a href="" class="text-lg underline text-blue-700 " >Find A Driver To Create A New Reservation</a>
            </div>


        </div>
    </section>
@endsection
