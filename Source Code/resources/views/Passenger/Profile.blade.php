@extends('layout.Html')
@section('pageContent')

    {{-- Head Nav --}}
    @include('layout.website.headNav')

    {{-- Page Content --}}
    <section class="w-[100%] bg-gray-300 overflow-y-auto"  style="min-height: calc(100vh - 105px)">

         <div class="px-[200px] py-4 space-y-4 flex flex-wrap justify-between" >

             @include('layout.sucess')

             <form action="/passenger/profile" method="POST" class="flex flex-wrap justify-between gap-2" enctype="multipart/form-data" >
                 @csrf
                 @method('PUT')

                 <div class="w-[100%]" >
                     <img src="http://127.0.0.1:8000/uploads/users/{{ $user[0]->picture }}" alt="Profile picture" class="border-2 border-gray-700 w-[200px] rounded-[10px] mb-4" >
                     <label for="picture" >Update your Profile Picture If You Want:</label>
                 </div>
                 <input type="file" name="picture" id="picture" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                 <input type="text" name="name" value="{{ $user[0]->name }}" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                 <input type="text" name="email" value="{{ $user[0]->email }}" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                 <input type="text" name="phone" value="{{ $user[0]->phone }}" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                 <input type="text" name="address" value="{{ $user[0]->address }}" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                 <input type="text" value="Account Type : {{ $user[0]->type }}" disabled class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                 <button type="submit" class="bg-gray-500 text-white font-[600] border-2 border-gray-600 w-[48%] outline-none p-2 text-left px-4" > Update Your Profile </button>
             </form>

         </div>
    </section>
@endsection
