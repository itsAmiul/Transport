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

                @include('layout.sucess')

                <form action="/driver/profile" method="POST" class="flex flex-wrap justify-between gap-2" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')

                    <div class="w-[100%]" >
                        <img src="http://127.0.0.1:8000/uploads/users/{{ $user[0]->picture }}" alt="Profile picture" class="border-2 border-gray-700 w-[200px] rounded-[10px] mb-4" >
                        <label for="picture" >update your Profile Picture If You Want:</label>
                    </div>
                    <input type="file" name="picture" id="picture" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                    <input type="text" name="name" value="{{ $user[0]->name }}" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                    <input type="text" name="email" value="{{ $user[0]->email }}" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                    <input type="text" name="phone" value="{{ $user[0]->phone }}" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                    <input type="text" name="address" value="{{ $user[0]->address }}" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                    <select name="status" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                        <option disabled selected >Select Your Status</option>
                        @foreach(['Available', 'Reserved', 'Non Available'] as $status)
                            @if($user[0]->status === $status )
                                <option value="{{ $status }}" selected >{{ $status }}</option>
                            @else
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endif
                        @endforeach
                    </select>

                    <input type="text" name="car_number" value="{{ $user[0]->car_number }}" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >

                    <select name="car_model" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                        <option disabled selected >Select Your Car Model</option>
                        @foreach(['xl', '2xl', '3xl'] as $model)
                            @if($user[0]->car_model === $model )
                                <option value="{{ $model }}" selected>{{ $model }}</option>
                            @else
                                <option value="{{ $model }}">{{ $model }}</option>
                            @endif
                        @endforeach
                    </select>

                    <select name="payment_type" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4" >
                        <option disabled selected >Select Your Favored Payment Type</option>
                        @foreach(['Card', 'Cash'] as $payment)
                            @if($user[0]->payment_type === $payment )
                                <option value="{{ $payment }}" selected>{{ $payment }}</option>
                            @else
                                <option value="{{ $payment }}">{{ $payment }}</option>
                            @endif
                        @endforeach
                    </select>

                    <select name="location" class="border-2 border-gray-600 w-[48%] outline-none p-2 px-4">
                        <option disabled selected >Select Favorite Work City</option>
                        @foreach($city as $cty)
                            @if($user[0]->location === $cty)
                                <option value="{{$cty}}" selected >{{$cty}}</option>
                            @else
                                <option value="{{$cty}}" >{{$cty}}</option>
                            @endif
                        @endforeach
                    </select>
                    <textarea name="description" class="border-2 border-gray-600 w-[100%] h-auto outline-none p-2 px-4">{{ $user[0]->description }}</textarea>

                    <button type="submit" class="bg-gray-500 text-white font-[600] border-2 border-gray-600 w-[48%] outline-none p-2 text-left px-4" > Update Your Profile </button>
                </form>

            </div>
        </section>
    </section>
@endsection
