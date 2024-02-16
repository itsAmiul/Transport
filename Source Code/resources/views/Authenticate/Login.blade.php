@extends('layout.Html')
@section('pageContent')
    <section class="w-[100%] mx-auto flex" >

        {{-- Login Image --}}
        <div class="h-[100vh] relative bg-gray-200" >
            <img src="http://127.0.0.1:8000/img/img/login_img.jpg" alt="login img" class="h-full" >
        </div>

        {{-- Login Form --}}
        <div class="m-auto border-2 border-gray-700 py-12 px-6 w-[40%] space-y-4 bg-gray-100" >

            <h1 class="font-[600] text-xl" >Login To Your Account</h1>
            <span class="mb-4" >Welcome back ! Please enter your credentials to access your account.</span>

            @include('layout.error')
            <form action="/login" method="POST" class="space-y-2 ">
                @csrf
                @method('POST')

                <input type="text" name="email" placeholder="Email Address" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                <input type="password" name="password" placeholder="Password" class="border-2 border-gray-600 w-[100%] outline-none p-2 px-4" >
                <button type="submit" class="bg-gray-500 text-white font-[600] border-2 border-gray-600 w-[100%] outline-none p-2 text-left px-4" >Login </button>
            </form>

            <h1 class="text-right font-[500]" >Don't Have An Account ? <a href="/register" class="underline text-blue-800">Create One !</a></h1>
        </div>
    </section>
@endsection
