@extends("layout.layout")
@section("content")
@include("layout.search_bar")

    <h1 class="text-center text-xl font-thin text-green-500">The results of  "<span class="font-semibold">{{ request("search")}}</span>" </h1>
    @include("notify.success")
    <div class="w-full max-w-[90%] mx-auto bg-gray-100 rounded-md py-3 px-7 mt-6 sm:grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
        @forelse ($articles as $article)
        <div class="w-full bg-slate-200 border border-gray-200 shadow-lg hover:shadow-xl rounded px-3 py-3 mb-6">
            <img src="{{ $article->getImageUrl() }}" alt="img" class="w-full rounded-tr-3xl rounded-tl-3xl" />
            <h2 class="text-yellow-500 font-bold text-2xl"> {{ $article->name}} </h2>
            <p class="text-sm text-gray-500"> <span class="font-semibold">Pre-Description:</span> {{ $article->short_description }} </p>
            <p class="text-xl font-semibold text-gray-500">Price : ${{ $article->price }} / bottle</p>
            <a class="bg-blue-500 py-1 px-3 text-white text-sm rounded block mt-2 text-center hover:bg-blue-600 transition duration-150 ease-in-out" href="{{route("article.view", $article->id)}}">View article</a>

            <hr>
        </div>

        @empty
            <div class="">
                <p>No found results !</p>
            </div>
        @endforelse
    </div>
@endsection
