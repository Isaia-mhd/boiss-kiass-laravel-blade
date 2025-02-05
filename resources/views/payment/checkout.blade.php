<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Stripe Payment</h1>
    <form action="{{ route('payment', $basket) }}" method="POST">
        @csrf
        <button type="submit">Pay ${{$basket->total_price}} </button>
    </form>
    @include("notify.error")
</body>
</html>
