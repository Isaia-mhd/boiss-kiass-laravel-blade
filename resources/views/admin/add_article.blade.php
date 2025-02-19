@extends('layout.layout')
@section('adminContent')
    <div class="w-full">
        <h1 class="text-start text-white text-2xl font-semibold mb-3">Add article page</h1>
    <form
        class="w-[40%] mt-6 py-7 rounded-lg shadow-md flex flex-col gap-5 items-center justify-start"
        action="{{ route('admin.add') }}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="w-full max-w-[95%] mx-auto">
            <input class="bg-white bg-opacity-20 text-white placeholder:text-white w-full py-1.5 px-3 rounded outline border-none outline-2 focus:outline-blue-400" type="text" name="name" id="name" placeholder="Article name">
            @error('name')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>

        <div class="w-full max-w-[95%] mx-auto">
            <input class="bg-white bg-opacity-20 text-white placeholder:text-white w-full py-1.5 px-3 rounded outline border-none outline-2 focus:outline-blue-400" type="text" name="short_description" id="short_description" placeholder="Short text of description">
            @error('short_description')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div class="w-full max-w-[95%] mx-auto">
            <input class="bg-white bg-opacity-20 text-white placeholder:text-white w-full py-1.5 px-3 rounded outline border-none outline-2 focus:outline-blue-400" type="text" name="description" id="description" placeholder="Description">
            @error('description')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div class="w-full max-w-[95%] mx-auto">
            <input class="bg-white bg-opacity-20 text-white placeholder:text-white w-full py-1.5 px-3 rounded outline border-none outline-2 focus:outline-blue-400" type="number" name="price" id="price" placeholder="Price">
            @error('price')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div class="w-full max-w-[95%] mx-auto">
            <input class="bg-slate-900 text-white text-sm w-[50%]" type="file" name="image" id="image" accept="png.jpeg.jpg">
            @error('image')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div class="w-full  max-w-[95%]">
            <button class="w-full py-2 px-7 rounded-md text-sm  text-white uppercase bg-gradient-to-r from-indigo-800 to-emerald-600 hover:from-indigo-900 hover:to-emerald-700 transition duration-150 ease-in-out" type="submit">Add</button>

        </div>
    </form>
    </div>
@endsection
