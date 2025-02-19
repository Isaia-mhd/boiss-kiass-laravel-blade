@extends('layout.layout')

@section('content')
    <h1 class="text-white text-2xl text-center mb-4">Payment</h1>
    <form action="{{ route('payment', $basket) }}" method="POST"
        class="w-full max-w[400px] lg:max-w-[400px] mx-auto  border-1 border-white rounded-lg px-5 flex flex-col gap-4 py-6">
        @csrf
        <div class="">
            <p class="text-white font-semibold">Product: {{ $basket->articles->name }} </p>
            <p class="text-white font-semibold">Quantity: {{ $basket->quantity }} </p>
            <p class="text-white font-semibold">Total: ${{ $basket->total_price }} </p>
        </div>
        <div class="w-full flex flex-col gap-2">
            <label for="method" class="text-white">Payment method</label>
            <select name="payment_method" id="method" class="text-slate-700 py-2 px-3">
                <option value="Stripe" selected>Stripe</option>
                <option value="Paypal" selected>Paypal</option>
                <option value="Mvola" selected>Mvola</option>
                <option value="OrangeMoney" selected>Orange Money</option>
                <option value="AirtelMoney" selected>Airtel Money</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white rounded-sm py-2 font-semibold">Pay ${{ $basket->total_price }} </button>
        @include('notify.error')
    </form>
@endsection
