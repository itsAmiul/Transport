@extends('layout.Html')
@section('pageContent')

    {{-- Page Content --}}
    <section class="w-[100%] h-[100vh] bg-gray-300 overflow-y-auto">

        {{-- Head Nav --}}
        @include('layout.passenger.headNav')

         <div class="px-[200px] py-4 space-y-4 flex flex-wrap justify-between" >

             <form action="/driver/updateInformation" method="POST" class="flex flex-wrap justify-between gap-2" enctype="multipart/form-data" >
                 @csrf
                 @method('PUT')

                 <div class="w-[100%]" >
                     <img src="http://127.0.0.1:8000/img/icons/profile.png" alt="Profile picture" class="w-[200px]" >
                     <label for="picture" >Update your Profile Picture If You Want:</label>
                 </div>
                 <input type="file" name="picture" id="picture" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                 <input type="text" name="name" value="Full Name" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                 <input type="text" name="email" value="Email Address" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                 <input type="text" name="phone" value="+212 06 00 00 00 00" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                 <input type="text" name="address" value="Your Address" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                 <input type="text" value="You Are A : Passenger" disabled class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                 <button type="submit" class="bg-gray-500 text-white font-[600] border-2 border-gray-600 w-[48%] outline-none p-2 text-left px-4" > Update Your Profile </button>
             </form>

         </div>
    </section>
@endsection
