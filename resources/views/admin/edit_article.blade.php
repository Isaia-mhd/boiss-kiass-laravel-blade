@extends('layout.layout')
@section('adminContent')
    <div class="w-full !bg-red-500">
        <h1 class="text-center text-2xl font-semibold mb-3">Edit article page</h1>
        <form
            class="w-full mt-6 py-7 bg-violet-950 rounded-lg shadow-md max-w-[90%] sm:max-w-[80%] md:max-w-[60%] lg:max-w-[50%] xl:max-w-[40%] mx-auto flex flex-col gap-5 items-center justify-center"
            action="{{ route('admin.edit', $article->id) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')
            <div class="w-full max-w-[95%] mx-auto">
                <input class="w-full py-1.5 px-3 rounded outline outline-2 focus:outline-amber-400"
                    value="{{ $article->name }}" type="text" name="name" id="name" placeholder="Article name">
                @error('name')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>

            <div class="w-full max-w-[95%] mx-auto">
                <input class="w-full py-1.5 px-3 rounded outline outline-2 focus:outline-amber-400"
                    value="{{ $article->short_description }}" type="text" name="short_description" id="short_description"
                    placeholder="Short text of description">
                @error('short_description')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>
            <div class="w-full max-w-[95%] mx-auto">
                <input class="w-full py-1.5 px-3 rounded outline outline-2 focus:outline-amber-400"
                    value="{{ $article->description }}" type="text" name="description" id="description"
                    placeholder="Description">
                @error('description')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>
            <div class="w-full max-w-[95%] mx-auto">
                <input class="w-full py-1.5 px-3 rounded outline outline-2 focus:outline-amber-400"
                    value="{{ $article->price }}" type="number" name="price" id="price" placeholder="Price">
                @error('price')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>
            <div class="w-full max-w-[95%] mx-auto">
                <input class="text-white text-sm w-[20%]" type="file" name="image" id="image"
                    accept="png.jpeg.jpg">
                @error('image')
                    <span class="text-red-500 text-sm"> {{ $message }} </span>
                @enderror
            </div>
            <div class="w-full  max-w-[95%]">
                <button
                    class="w-full py-2 px-7 rounded-md text-sm  text-white uppercase bg-gradient-to-r from-indigo-800 to-emerald-600 hover:from-indigo-900 hover:to-emerald-700 transition duration-150 ease-in-out"
                    type="submit">Edit</button>

            </div>
        </form>
    </div>
@endsection
