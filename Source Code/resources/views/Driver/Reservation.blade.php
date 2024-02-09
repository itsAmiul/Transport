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

                <div class="w-full bg-gray-500 text-white p-4 border-2 border-gray-800" >
                    <h1 class="text-lg font-[500]" >Check All Your Reservation Details On THis Page, And don't forget to start Accepting Them to start making Money !</h1>
                </div>

                <div class="flex justify-between px-6 text-lg font-[500] bg-gray-500 text-white py-2 border-2 border-gray-800">
                    <h1 class="w-[5%]" >Id</h1>
                    <h1 class="w-[25%]" >Reserved By</h1>
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
                            <h1><span class="font-[600]" >Status :</span> Confirmed</h1>
                            <h1><span class="font-[600]" >Departure :</span> Safi, Lala Hnia</h1>
                            <h1><span class="font-[600]" >Destination :</span> El Jadida</h1>
                        </div>
                        <div class="w-[25%] flex items-center gap-x-2" >
                            <a href="" ><img src="http://127.0.0.1:8000/img/icons/confirm.png" alt="Profile picture" class="w-[50px]" ></a>
                            <a href="" ><img src="http://127.0.0.1:8000/img/icons/delete.png" alt="Profile picture" class="w-[50px]" ></a>
                        </div>
                    </div>
                </div>

                <div class="w-full" >
                    {{-- Pagination --}}
                </div>

            </div>
        </section>
    </section>
@endsection
