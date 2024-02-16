@extends('layout.Html')
@section('pageContent')

    <section class="px-12 mt-6 w-[100%] space-y-4" >
        <h1 class="text-2xl font-[600]" >Passenger Details :</h1>

        <hr>
        <h3>Passenger : {{ $passengerData->name }} </h3>
        <h3>Email : {{ $passengerData->email }} </h3>
        <h3>Phone : {{ $passengerData->phone }} </h3>

        <hr>
        <h3>Reservation Id : {{ $routeData->id }} </h3>
        <h3>departure : {{ $routeData->departure }} </h3>
        <h3>destination : {{ $routeData->destination }} </h3>
        <h3>price : {{ $routeData->price }} </h3>
        <h3>date : {{ $routeData->date }} </h3>

        <hr>
        <div class="border-2 border-gray-800  py-8 px-6">
            {!! DNS2D::getBarcodeHTML("$invoiceData->code", 'QRCODE') !!}
            <span>{{ $invoiceData->code }}</span>
            <a href="http://127.0.0.1:8000/verify/ticket/{{$invoiceData->code}}" >Verify Ticket</a>
        </div>
    </section>


@endsection
