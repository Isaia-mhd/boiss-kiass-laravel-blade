@extends('layout.layout')
@section('content')

    {{-- Little Title --}}
    <h1 class="text-center text-2xl font-semibold text-white">Forgot Password</h1>

    {{-- Field --}}
    <form action="{{route("login")}}" method="post" class="w-full mt-6 py-7 rounded-lg shadow-md max-w-[80%] sm:max-w-[70%] md:max-w-[50%] lg:max-w-[40%] xl:max-w-[30%] mx-auto flex flex-col gap-5 items-center justify-center">
        @csrf

        {{-- Email --}}
        <div class="flex flex-col gap-1 w-full max-w-[90%]">
            <label for="email" class="text-sm text-white font-semibold">Email</label>
            <input class="bg-slate-900 text-white rounded py-2 px-2 outline-2 focus:outline focus:outline-blue-400" type="email" name="email" id="email" placeholder="E-mail">
            @error("email")
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>

        {{-- LOgin Button --}}
        <div class="w-full max-w-[90%] mx-auto">
            <button class="transition duration-150 ease-in-out py-2 px-7 rounded-md text-sm  text-white uppercase bg-gradient-to-r from-indigo-800 to-emerald-600 hover:from-indigo-900 hover:to-emerald-700" type="submit">SEND RESET PASSWORD LINK</button>
        </div>

        {{-- Link Register/forgot PW --}}
        <div class="flex items-center justify-between w-full max-w-[90%] mx-auto">
            <a href="{{route('register')}}" class="text-sm text-white">Don-t have an account ? <span class="text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out">Register</span></a>
            <a href="{{route('login')}}" class="text-sm text-blue-500 hover:text-blue-600 transition duration-150 ease-in-out ">Login</a>

        </div>

        @include("notify.error")
    </form>

@endsection
