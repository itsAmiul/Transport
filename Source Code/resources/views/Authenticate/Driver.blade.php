@extends('layout.Html')
@section('pageContent')
    <section class="w-[100%] mx-auto flex" >

        {{-- Login Image --}}
        <div class="h-[100vh] relative bg-gray-200" >
        </div>

        {{-- Login Form --}}
        <div class="m-auto border-2 border-gray-700 py-12 px-6 w-[60%] space-y-4 bg-gray-100" >

            <h1 class="font-[600] text-xl" >Create Your Account</h1>
            <span class="mb-4" >Welcome to our community ! Fasten your seatbelt and enjoy the ride as we navigate through a world of possibilities together.</span>

            <form action="/driver/registration" method="POST" class="space-y-2" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="step pb-2" >
                    <span id="first" class="first text-xl font-[500] bg-gray-600 text-white py-2 px-4 mr-2 border-2 border-gray-600">1</span>
                    <span id="second" class="second text-xl bg-gray-200 text-gray-600 py-2 px-4 mr-2 border-2 border-gray-600">2</span>
                    <span id="third" class="third text-xl bg-gray-200 text-gray-600 py-2 px-4 mr-2 border-2 border-gray-600">3</span>
                </div>

                <div class="space-y-2" id="firstStep" >
                    <input type="text" name="name" placeholder="Full Name" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <input type="text" name="email" placeholder="Email Address" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <input type="text" name="phone" placeholder="+212 06 00 00 00 00" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <input type="password" name="password" placeholder="Password" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <button id="nextStep" class="bg-gray-500 text-white font-[600] border-2 border-gray-600 w-[100%] outline-none p-2 text-left px-4" >Next Step</button>
                </div>

                <div class="space-y-2 hidden" id="secondStep">
                    <label for="picture" >Add A Profile Picture :</label>
                    <input type="file" name="picture" id="picture" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <input type="text" name="address" placeholder="Your Address" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <button id="nextStep_2" class="bg-gray-500 text-white font-[600] border-2 border-gray-600 w-[100%] outline-none p-2 text-left px-4" >Next Step</button>
                </div>

                <div class="space-y-2 hidden" id="thirdStep" >
                    <input type="text" name="car_number" placeholder="Licence plate" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >

                    <select name="location" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4">
                        <option disabled selected >Select Favorite Work City</option>
                        @foreach($city as $cty)
                            <option value="{{$cty}}" >{{$cty}}</option>
                        @endforeach
                    </select>

                    <select name="car_model" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                        <option disabled selected >Select Your Car Model</option>
                        <option value="xl" >xl</option>
                        <option value="2xl" >2 xl</option>
                        <option value="3xl" >3 xl</option>
                    </select>

                    <textarea placeholder="Profile Description" name="description" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4"></textarea>

                    <select name="payment_type" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                        <option disabled selected >Select Your Favored Payment Type</option>
                        <option value="Card" >Card</option>
                        <option value="Cash" >Cash</option>
                    </select>

                    <button type="submit" class="bg-gray-500 text-white font-[600] border-2 border-gray-600 w-[100%] outline-none p-2 text-left px-4" >Sign Up </button>
                </div>
            </form>

            <h1 class="text-right font-[500]" >Have An Account ? <a href="/login" class="underline text-blue-800">Login Now !</a></h1>
        </div>
    </section>

    <script src="http://127.0.0.1:8000/js/steps.js" ></script>
    <script>

        const form = document.querySelector('form');
        const nextStep = document.getElementById('nextStep');
        const nextStep_2 = document.getElementById('nextStep_2');

        multipleSteps(nextStep, 'firstStep', 'secondStep', 'second');
        multipleSteps(nextStep_2, 'secondStep', 'thirdStep', 'third');
    </script>

@endsection
