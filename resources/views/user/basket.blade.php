@extends('layout.layout')
@section('content')
    <div class="w-full">
        <h1 class="text-center text-2xl font-semibold mb-6">Basket page</h1>
    </div>
    <div>
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
                    <tr class="text-center text-sm border shadow-lg">
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">{{ $basket->quantity }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white"><img src="{{ asset('storage/' . $basket->articles->image) }}" class="w-[30px] h-[30px] rounded-sm" alt="img"></td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">{{ $basket->articles->name }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">${{ $basket->price_unit }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">${{ $basket->total_price }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">
                            <form action="{{ route('basket.delete', $basket->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-green-500 py-1 px-3 lg:px-7 rounded text-sm text-white hover:bg-green-700 transition duration-150 ease-in-out">Pay</button>
                            </form>
                        </td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">
                            <form action="{{ route('basket.delete', $basket->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 py-1 px-3 rounded text-sm text-white hover:bg-red-700 transition duration-150 ease-in-out">Delete</button>
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
