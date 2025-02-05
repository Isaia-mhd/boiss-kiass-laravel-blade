@extends('layout.layout')
@section('content')
    <h1 class="text-center text-2xl font-semibold text-white">Register page</h1>
    <form action="{{route("register")}}" method="post" class="w-full mt-6 py-7 bg-violet-950 rounded-lg shadow-md max-w-[90%] sm:max-w-[80%] md:max-w-[60%] lg:max-w-[50%] xl:max-w-[40%] mx-auto flex flex-col gap-5 items-center justify-center">
        @csrf
        <div class="flex flex-col gap-1 w-full max-w-[90%]">
            <label for="name" class="text-sm text-white font-semibold">Name</label>
            <input class="rounded py-2 px-2 outline-2 focus:outline focus:outline-amber-400" type="text" name="name" id="name" placeholder="Name">
        @error("name")
            <span class="text-red-500 text-sm"> {{ $message }} </span>
        @enderror
        </div>
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
        <div class="flex flex-col gap-1 w-full max-w-[90%]">
            <label for="password_confirm" class="text-sm text-white font-semibold">Confirm Password</label>
            <input class="rounded py-2 px-2 outline-2 focus:outline focus:outline-amber-400" type="password" name="password_confirmation" id="password_confirm" placeholder="Password">
        </div>

        <div class="w-full max-w-[90%] mx-auto">
            <button class="bg-indigo-800 hover:bg-indigo-900 transition duration-150 ease-in-out py-2 px-7 rounded-md text-sm  text-white uppercase" type="submit">Register</button>
        </div>
        <div class="flex items-center justify-between w-full max-w-[90%] mx-auto">
            <a href="{{route('login')}}" class="text-sm text-white">have an account ? <span class="text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out">Login</span></a>
            <a href="{{route('register')}}" class="text-sm text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out">Forgot password ?</a>

        </div>
    </form>

@endsection
