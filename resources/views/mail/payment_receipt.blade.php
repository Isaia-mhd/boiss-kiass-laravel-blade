<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Successfully</title>
</head>
<body>
    <h1>Payment details</h1>
    <p>Thank you for the payment. Here are the details: </p>
    <ul>
        <li>Payment ID : {{$paymentDetails["payment_id"]  }} </li>
        <li>Amount : ${{ $paymentDetails["amount"] }} </li>
        <li>Date : {{ $paymentDetails["date"] }} </li>
    </ul>
    <h2>User's details </h2>
    <ul>
        <li>Name: {{ $paymentDetails["user"]["name"] }} </li>
        <li>Email: {{ $paymentDetails["user"]["email"] }} </li>
    </ul>
</body>
</html>
