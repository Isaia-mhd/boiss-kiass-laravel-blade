@extends('layout.layout')
@section('content')
    <div class="w-full">
        <h1 class="text-center text-white text-2xl font-semibold mb-6">Basket page</h1>
    </div>
    <div class="text-white">
        <p>
            @include('notify.success')
        </p>
        <table class="w-full max-w-[90%]  mx-auto rounded-tr-xl rounded-tl-xl table-auto border-collapse">
            <thead>
                <tr class="text-sm text-gray-500 ">
                    <th>Qt</th>
                    <th>Image</th>
                    <th>Article</th>
                    <th>P/U</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Deleting</th>
                </tr>
            </thead>
            <tbody>
                @foreach($baskets as $basket)
                    <tr class="text-center text-sm shadow-lg">
                        <td class="border py-2 border-y-8 border-x-0  border-y-slate-900">{{ $basket->quantity }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-slate-900"><img src="{{ asset('storage/' . $basket->articles->image) }}" class="w-[30px] h-[30px] rounded-sm" alt="img"></td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-slate-900">{{ $basket->articles->name }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-slate-900">${{ $basket->price_unit }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-slate-900">${{ $basket->total_price }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-slate-900">
                            
                                <button type="button" class="{{ $basket->status == "Paid" ? "" : "bg-green-500 bg-opacity-20 border-[1px] border-green-500" }} py-1 px-3 lg:px-7 rounded text-sm text-green-600 transition duration-150 ease-in-out">

                                    @if ($basket->status == "Paid")
                                        <i class="fa-solid fa-circle-check text-green-500 text-xl"></i>

                                    @else
                                        <a href="{{ route('checkout', $basket) }}"> {{ $basket->status === "Paid" ? "Paid" : "Pay"}} </a>
                                    @endif
                                </button>
                            
                        </td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-slate-900">
                            <form action="{{ route('basket.delete', $basket->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class=" py-1 px-3 rounded text-sm text-white transition duration-150 ease-in-out"> <i class="fa-solid fa-trash text-white text-md"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-full max-w-[90%] mx-auto mt-3">{{ $baskets->links('pagination::tailwind') }}</div>

        <p class="text-gray-500 text-center text-sm md:text-md mt-9">
            <?php
                if ($baskets->Count() <= 0) {
                    echo "Your Basket is empty! Add some article";
                }
            ?>
        </p>
    </div>
@endsection
