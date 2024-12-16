@extends('layout.layout')
@section('content')
@include("layout.search_bar")

    <h1 class="text-center font-semibold text-2xl">Menu page</h1>
    @include('notify.success')
    <div
        class="w-full max-w-[90%] mx-auto bg-gray-100 rounded-md py-3 px-7 mt-6 sm:grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
        @foreach ($articles as $article)
            <div class="w-full h-[350px] bg-slate-200 border border-gray-200 shadow-lg hover:shadow-xl rounded px-3 py-3 mb-6">
                <div class="w-full h-[90%]">
                    <img src="{{ $article->getImageUrl() }}" alt="img" class="w-full rounded-tr-3xl rounded-tl-3xl" />
                    <h2 class="text-yellow-500 font-bold text-2xl"> {{ $article->name }} </h2>
                    <p class="text-sm text-gray-500"> <span class="font-semibold">Pre-Description:</span>
                        {{ $article->short_description }} </p>
                    <p class="text-xl font-semibold text-gray-500">Price : ${{ $article->price }} / bottle</p>
                </div>
                <div class="w-full h-10%">
                    <a class="bg-blue-500 py-1 px-3 text-white text-sm rounded block mt-2 text-center hover:bg-blue-600 transition duration-150 ease-in-out"
                        href="{{ route('article.view', $article->id) }}">View article</a>
                </div>

                <hr>
            </div>
        @endforeach
    </div>
    <div class="w-full max-w-[90%] mx-auto mt-3 mb-12">
        {{ $articles->withQueryString()->links("pagination::tailwind") }}
    </div>
@endsection
