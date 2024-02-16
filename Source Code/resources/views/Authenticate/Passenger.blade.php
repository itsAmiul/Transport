@extends('layout.Html')
@section('pageContent')
    <section class="w-[100%] mx-auto flex" >

        {{-- Login Image --}}
        <div class="h-[100vh] relative bg-gray-200" >
            <img src="http://127.0.0.1:8000/img/img/img_3.jpg" alt="login img" class="h-full" >
        </div>

        {{-- Login Form --}}
        <div class="m-auto border-2 border-gray-700 py-12 px-6 w-[40%] space-y-4 bg-gray-100" >

            <h1 class="font-[600] text-xl" >Create Your Free Account</h1>
            <span class="mb-4" >Ready to enjoy traveling ? Join us as a Passenger today and experience a world of convenient transportation options at your fingertips</span>

            <div class="step pb-2" >
                <span id="first" class="first text-xl font-[500] bg-gray-600 text-white py-2 px-4 mr-2 border-2 border-gray-600">1</span>
                <span id="second" class="second text-xl bg-gray-200 text-gray-600 py-2 px-4 mr-2 border-2 border-gray-600">2</span>
            </div>

            <form action="/passenger/registration" method="POST" class="space-y-2" enctype="multipart/form-data" >
                @csrf
                @method('POST')

                <!-- First Step -->
                <div class="space-y-2" id="firstStep" >
                    <input type="text" name="name" placeholder="Full Name" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <input type="text" name="email" placeholder="Email Address" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <input type="text" name="phone" placeholder="+212 06 00 00 00 00" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <input type="password" name="password" placeholder="Password" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <button id="nextStep" class="bg-gray-500 text-white font-[600] border-2 border-gray-600 w-[100%] outline-none p-2 text-left px-4" >Next Step</button>
                </div>

                <!-- Second Step -->
                <div class="space-y-2 hidden" id="secondStep">
                    <label for="picture" >Add A Profile Picture :</label>
                    <input type="file" name="picture" id="picture" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                    <input type="text" name="address" placeholder="Your Address" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
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
        multipleSteps(nextStep, 'firstStep', 'secondStep', 'second');
    </script>

@endsection
