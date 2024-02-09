@extends('layout.Html')
@section('pageContent')

    <section class="w-full h-[100vh] flex justify-between items-center">

        {{-- Nav Bar --}}
        @include('layout.driver.navBar')

        {{-- Page Content --}}
        <section class="w-[80%] h-[100vh] bg-gray-300 overflow-y-auto">

            {{-- Head Nav --}}
            @include('layout.driver.headNav')

            <section class="px-12 py-4 space-y-4 flex flex-wrap justify-between" >

                <div class="w-full bg-gray-500 text-white p-4 border-2 border-gray-800" >
                    <span class="text-2xl font-[600]" >Welcome To Your Dashboard</span>
                    <h1 class="text-lg font-[500]" >Unlock endless opportunities and earn competitive rewards as a valued member of our registered driver community. Start driving with us today !</h1>
                </div>

                <div class="w-[48%] bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center" >
                    <span class="text-3xl font-[500]" >2024-02-08 20:30:08</span>
                    <h1 class="text-xl font-[600]" >Member Since</h1>
                </div>

                <div class="w-[48%] bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center" >
                    <span class="text-3xl font-[500]" >4</span>
                    <h1 class="text-xl font-[600]" >Reservation Number</h1>
                </div>
            </section>
        </section>
    </section>
@endsection
