@extends('layout.Html')
@section('pageContent')

    <section class="w-full h-[100vh] flex justify-between items-center">

        {{-- Nav Bar --}}
        @include('layout.driver.navBar')

        {{-- Page Content --}}
        <section class="w-[80%] h-[100vh] bg-gray-300 overflow-y-auto">

            {{-- Head Nav --}}
            @include('layout.driver.headNav')

            <div class="px-12 py-4 space-y-4 flex flex-wrap justify-between" >

                <div class="w-full bg-gray-500 text-white p-4 border-2 border-gray-800" >
                    <h1 class="text-lg font-[500]" >Update your information easily by clicking on the 'Update Your Profile' button located on the bottom of the page .</h1>
                </div>

                <form action="/driver/updateInformation" method="POST" class="flex flex-wrap justify-between gap-2" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')

                    <div class="w-[100%]" >
                        <img src="http://127.0.0.1:8000/img/icons/profile.png" alt="Profile picture" class="w-[200px]" >
                        <label for="picture" >update your Profile Picture If You Want:</label>
                    </div>
                    <input type="file" name="picture" id="picture" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                    <input type="text" name="name" value="Full Name" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                    <input type="text" name="email" value="Email Address" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                    <input type="text" name="phone" value="+212 06 00 00 00 00" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                    <input type="text" name="address" value="Your Address" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                    <select name="availability" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                        <option disabled selected >Select Your Status</option>
                        <option value="Available" >Available</option>
                        <option value="Non Available"  >Non Available</option>
                    </select>

                    <input type="text" name="car_number" value="Licence plate" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                    <select name="car_model" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                        <option disabled selected >Select Your Car Model</option>
                        <option value="xl" >xl</option>
                        <option value="2xl" >2 xl</option>
                        <option value="3xl" >3 xl</option>
                    </select>

                    <select name="payment_type" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                        <option disabled selected >Select Your Favored Payment Type</option>
                        <option value="Card" >Card</option>
                        <option value="Cash" >Cash</option>
                    </select>

                    <input type="text" value="Role : Passenger" disabled class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                    <textarea name="description" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4">Profile Description</textarea>

                    <button type="submit" class="bg-gray-500 text-white font-[600] border-2 border-gray-600 w-[48%] outline-none p-2 text-left px-4" > Update Your Profile </button>
                </form>

            </div>
        </section>
    </section>
@endsection
