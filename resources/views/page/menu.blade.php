@extends('layout.layout')
@section('content')
    @include('layout.search_bar')

    <h1 class="text-center text-white
    lll font-semibold text-2xl">Menu page</h1>
    @include('notify.success')
    <div class="w-full max-w-[90%] mx-auto  flex gap-4">
        <div class=" flex flex-col gap-2 justify-start items-start">
            <p class="text-white">Filter by</p>
            <select name="filter" class="w-[150px] h-[30px] rounded-sm px-4 bg-white">
                <option value="category">Category</option>
                <option value="price">Price</option>
            </select>



        </div>
        <div
            class="w-full max-w-[90%] mx-auto rounded-md py-3 px-7 mt-6 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4">
            @foreach ($articles as $article)
                <div
                    class="w-full h-[350px] bg-slate-200 border border-gray-200 shadow-lg hover:shadow-xl rounded px-3 py-3 mb-6">
                    <div class="w-full h-[90%]">
                        <div class="h-[60%] rounded-md"
                            style="background-image: url('{{ asset('storage/' . $article->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                            {{-- <img src="{{ asset('storage/' . $article->image) }}" className="w-full" alt="{{ $article->name }}"> --}}
                        </div>
                        <h2 class="text-blue-950 font-bold text-xl"> {{ $article->name }} </h2>
                        <div class="h-[20%] ">
                            <p class="text-sm text-gray-500"> <span class="font-semibold"></span>
                                {{ $article->short_description }} </p>
                        </div>
                        <div class="h-20%[] ">
                            <p class="text-md font-semibold text-gray-500">Price : ${{ $article->price }} </p>
                        </div>
                    </div>
                    <div class="w-full h-10%">
                        <a class="bg-blue-500 py-1 px-3 text-white text-sm rounded block mt-2 text-center hover:bg-blue-600 transition duration-150 ease-in-out"
                            href="{{ route('article.view', $article->id) }}">View article</a>
                    </div>

                    <hr>
                </div>
            @endforeach
        </div>
    </div>
    <div class="w-full max-w-[90%] mx-auto mt-3 mb-12">
        {{ $articles->withQueryString()->links('pagination::tailwind') }}
    </div>
@endsection
