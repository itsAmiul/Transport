@extends('layout.Html')
@section('pageContent')

    <section class="w-full h-[100vh] flex justify-between items-center">

        {{-- Nav Bar --}}
        @include('layout.driver.navBar')

        {{-- Page Content --}}
        <section class="w-[80%] h-[100vh] bg-gray-300 overflow-y-auto">

            {{-- Head Nav --}}
            @include('layout.driver.headNav')

            <div class="px-12 py-4 space-y-4" >

                <div class="w-full bg-gray-500 text-white p-4 border-2 border-gray-800" >
                    <h1 class="text-lg font-[500]" >Update your Password if needed easily by clicking on the 'Update button' located in the bottom of the page .</h1>
                </div>

                <form action="/user/updatePassword" method="POST" class="flex flex-wrap justify-between gap-2 border-2 border-gray-800 p-4" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH')

                    <input type="password" name="password" value="Password" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <button type="submit" class="bg-gray-500 text-white font-[600] border-2 border-gray-600 w-[48%] outline-none p-2 text-left px-4" > Update Your Password </button>
                </form>
            </div>
        </section>
    </section>
@endsection
