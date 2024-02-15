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

                @include('layout.sucess')
                <div class="w-full bg-gray-500 text-white p-4 border-2 border-gray-800" >
                    <span class="text-2xl font-[600]" >Welcome To Your Dashboard</span>
                    <h1 class="text-lg font-[500]" >Unlock endless opportunities and earn competitive rewards as a valued member of our registered driver community. Start driving with us today !</h1>
                </div>

                <div class="w-[48%] bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center" >
                    <span class="text-3xl font-[500]" >{{ $user[0]->created_at }}</span>
                    <h1 class="text-xl font-[600]" >Member Since</h1>
                </div>

                <div class="w-[48%] bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center" >
                    <span class="text-3xl font-[500]" >{{ $reservations }}</span>
                    <h1 class="text-xl font-[600]" >Reservation Number</h1>
                </div>

                @if($status[0]->status === "Available")
                    <div class="w-[48%] bg-gray-300 text-white bg-green-500 p-4 border-2 border-green-800 text-center" >
                        <h1 class="text-xl font-[600]" >Your Status : <span class="text-3xl font-[500] underline" >{{ $status[0]->status }}</span></h1>
                    </div>
                @else
                    <div class="w-[48%] bg-red-500 text-white p-4 border-2 border-red-800 text-center" >
                        <h1 class="text-xl font-[600]" >Your Status : <span class="text-3xl font-[500] underline" >{{ $status[0]->status }}</span></h1>
                    </div>
                @endif

            </section>
        </section>
    </section>
@endsection
