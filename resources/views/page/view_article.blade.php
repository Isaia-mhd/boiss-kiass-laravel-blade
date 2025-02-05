@extends('layout.layout')
@section('content')
    <h1 class="text-center text-2xl font-semibold">View page</h1>

    <div class="w-full bg-gray-100 max-w-[90%] md:max-w-[70%] lg:max-w-[60%] mx-auto p-5 rounded shadow-md mt-6">
        <h2 class="text-yellow-500 text-2xl font-semibold italic "> {{ $article->name }} </h2>
        <p class="text-sm text-gray-500 lg:w-[50%]"> <span class="font-semibold">Description:</span> {{ $article->description }} </p>
        <p class="text-xl font-semibold text-gray-500">Price : ${{ $article->price }}</p>
        @guest
            <div class="bg-blue-500 rounded p-3 shadow-md mt-3">
                <p class="text-sm text-white">You need to <a href="{{route("login")}}" class="text-blue-800">login</a> if you want to order this article</p>
            </div>
        @endguest
        @auth
            <form action="{{ route('basket.add', $article->id) }}" method="post" class="flex justify-start items-center w-full h-10 gap-3 mt-3">
                @csrf
                <input class="block  w-[100px] text-center py-1 rounded shadow-md" type="number" name="quantity" id="quantity" min="1" placeholder="Quantity">
                <button class="bg-blue-500 rounded text-sm text-white py-1.5 px-7 hover:bg-blue-700 transition duration-150 ease-in-out shadow-md" type="submit">Add to basket</button>
            </form>
            @error("quantity")
                <p class="text-red-500 text-sm"> {{ $message }} </p>
            @enderror
        @endauth
    </div>
@endsection
