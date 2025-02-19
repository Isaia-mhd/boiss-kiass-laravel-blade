@extends("layout.layout")
@section("content")
@include("layout.search_bar")
    <div class="w-full max-w-[90%]  mx-auto ">

        @include("notify.success")

        <aside class="w-[400px] flex flex-col space-y-4 mt-12">
            <h3 class="text-blue-500 text-4xl">Looking for different articles?</h3>
            <h2 class="text-white text-xl uppercase">You are in the right place</h2>
            <p class="text-slate-500 text-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam amet consequatur vero voluptatem facilis quia accusantium debitis eveniet! Porro, minima molestias exercitationem aliquam assumenda saepe cumque atque corrupti tenetur consectetur neque iure vero adipisci fugiat</p>
        </aside>
    </div>

@endsection



