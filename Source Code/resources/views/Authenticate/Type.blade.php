@extends('layout.Html')
@section('pageContent')
    <section class="w-[85%] h-[100vh] mx-auto flex flex-col justify-center" >

        <h1 class="font-[600] text-lg" >Welcome To Our Platform !</h1>
        <h1 class="font-[500] text-lg mb-6" >Cultivate your journey with us. Begin by selecting your role: Driver or Passenger, and embark on a seamless experience tailored just for you !!</h1>

        <section class="flex justify-between items-center" >
            <div class="w-[45%] flex justify-around items-center border-2 border-gray-500 py-6 px-4 bg-gray-200 hover:bg-gray-100" >
                <img src="http://127.0.0.1:8000/img/icons/driver.png" alt="Driver Image" class="w-[20%]" >
                <div class="w-[50%]">
                    <h1 class="text-xl font-[600] mb-2" ><a href="/driver/registration" >Register As A Driver !</a></h1>
                    <h1 class="font-[500]" >Ready to hit the road ? Let's create your driver account.</h1>
                </div>
            </div>

            <div class="w-[45%] flex justify-around items-center border-2 border-gray-500 py-6 px-4 bg-gray-200 hover:bg-gray-100" >
                <img src="http://127.0.0.1:8000/img/icons/passenger.png" alt="Passenger Image" class="w-[20%]" >
                <div class="w-[50%]" >
                    <h1 class="text-xl font-[600] mb-2" ><a href="/passenger/registration" >Register As A Passenger !</a></h1>
                    <h1 class="font-[500]" >Unlock access to reliable transportation services tailored to your needs</h1>
                </div>
            </div>
        </section>
    </section>
@endsection
