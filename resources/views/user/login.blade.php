@extends('layout.layout')
@section('content')
    <h1 class="text-center text-2xl font-semibold">Login page</h1>
    <form action="{{route("login")}}" method="post" class="w-full mt-6 py-7 bg-violet-950 rounded-lg shadow-md max-w-[90%] sm:max-w-[80%] md:max-w-[60%] lg:max-w-[50%] xl:max-w-[40%] mx-auto flex flex-col gap-5 items-center justify-center">
        @csrf
        <div class="flex flex-col gap-1 w-full max-w-[90%]">
            <label for="email" class="text-sm text-white font-semibold">Email</label>
            <input class="rounded py-2 px-2 outline-2 focus:outline focus:outline-amber-400" type="email" name="email" id="email" placeholder="E-mail">
        @error("email")
            <span class="text-red-500 text-sm"> {{ $message }} </span>
        @enderror
        </div>

        <div class="flex flex-col gap-1 w-full max-w-[90%]">
            <label for="password" class="text-sm text-white font-semibold">Password</label>
            <input class="rounded py-2 px-2 outline-2 focus:outline focus:outline-amber-400" type="password" name="password" id="password" placeholder="Password">
        @error("password")
            <span class="text-red-500 text-sm"> {{ $message }} </span>
        @enderror
        </div>

        <div class="w-full max-w-[90%] mx-auto">
            <button class="transition duration-150 ease-in-out py-2 px-7 rounded-md text-sm  text-white uppercase bg-gradient-to-r from-indigo-800 to-emerald-600 hover:from-indigo-900 hover:to-emerald-700" type="submit">Login</button>
        </div>
        <div class="flex items-center justify-between w-full max-w-[90%] mx-auto">
            <a href="{{route('register')}}" class="text-sm text-white">Don-t have an account ? <span class="text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out">Register</span></a>
            <a href="{{route('register')}}" class="text-sm text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out">Forgot password ?</a>

        </div>
    </form>

@endsection
