<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    @vite('resources/css/app.css')

    <title> {{ config('app.name') }} </title>
</head>

<body class="bg-slate-950">
    <header
        class="w-full h-14 bg-gradient-to-r from-violet-800 to-emerald-400 shadow-md rounded-br-xl rounded-bl-xl mb-6">
        <div class="flex items-center h-14 justify-between w-full max-w-[90%] mx-auto">
            <div class="">
                @auth
                <a href="{{auth()->user()->admin == 1? "/admin" : "/" }}" class="text-xl text-amber-400">{{ config('app.name') }}</a>
                @endauth

                @guest
                <h1 href="" class="text-xl text-amber-400">{{ config('app.name') }}</h1>
                @endguest
            </div>

            <nav>
                <ul class="flex items-center justify-between gap-6 text-sm md:text-base font-normal">
                    <li><a href="{{ route('home') }}"
                            class="hover:text-amber-400 text-white transition duration-150 ease-in-out">Home</a></li>
                    <li><a href="{{ route('article.article') }}"
                            class="hover:text-amber-400 text-white transition duration-150 ease-in-out">Shop</a></li>
                    
                    @auth
                        <li><a href="{{ route('profile') }}"
                        class="hover:text-amber-400 text-white transition duration-150 ease-in-out">Chat Bot</a></li>
                        
                        <li><a href="{{ route('profile') }}"
                                class="hover:text-amber-400 text-white transition duration-150 ease-in-out">
                                Profile </a></li>
                        
                        <li><a href="{{ route('logout') }}"
                                class="hover:text-amber-400 text-white transition duration-150 ease-in-out">Logout</a></li>
                        
                    @endauth
                    @guest
                        <li><a href="{{ route('register') }}"
                                class="hover:text-amber-400 text-white transition duration-150 ease-in-out">Register</a>
                        </li>
                        <li><a href="{{ route('login') }}"
                                class="hover:text-amber-400 text-white transition duration-150 ease-in-out">Login</a></li>
                    @endguest
                </ul>
            </nav>

            
        </div>

    </header>
    <section>
        
        @yield('content')
    </section>

    <footer class="w-full h-[50px] bg-blue-950 flex justify-center items-center mt-[400px] ">
        <p class="text-white font-light text-sm ">copyright&copy; {{ date("Y") }} Developped by Isaia Mohamed</p>
    </footer>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}
</body>

</html>
