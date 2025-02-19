@extends("layout.layout")
@section("adminContent")
    <div class="w-full  ">
        <h1 class="text-start text-white font-semibold text-2xl">Dashboard</h1>
        <div class="w-full py-8 pr-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 ">

            {{-- USERS --}}
            <div class="w-full h-[150px] bg-pink-400 rounded-lg px-4 py-2">
                <p class="text-2xl text-white font-bold">Users</p>
                <p class="text-white text-4xl font-semibold"> {{ $usersTotal }} </p>
            </div>

            {{-- SUBSCRIBERS --}}
            <div class="w-full h-[150px] bg-blue-400 rounded-lg px-4 py-2">
                <p class="text-2xl text-white font-bold">Subscribers</p>
                <p class="text-white text-4xl font-semibold"> {{ $usersTotal }} </p>
            </div>

            {{-- Payment Completed --}}
            <div class="w-full h-[150px] bg-gray-400 rounded-lg px-4 py-2">
                <p class="text-2xl text-white font-bold">Payments</p>
                <p class="text-white text-4xl font-semibold"> {{ $usersTotal }} </p>
            </div>

            {{-- Basket --}}
            <div class="w-full h-[150px] bg-green-400 rounded-lg px-4 py-2">
                <p class="text-2xl text-white font-bold">Baskets</p>
                <p class="text-white text-4xl font-semibold"> {{ $usersTotal }} </p>
            </div>

            {{-- USERS --}}
            <div class="w-full h-[150px] bg-purple-700 rounded-lg px-4 py-2">
                <p class="text-2xl text-white font-bold">Users</p>
                <p class="text-white text-4xl font-semibold"> {{ $usersTotal }} </p>
            </div>

            {{-- SUBSCRIBERS --}}
            <div class="w-full h-[150px] bg-amber-400 rounded-lg px-4 py-2">
                <p class="text-2xl text-white font-bold">Subscribers</p>
                <p class="text-white text-4xl font-semibold"> {{ $usersTotal }} </p>
            </div>

            {{-- Payment Completed --}}
            <div class="w-full h-[150px] bg-orange-400 rounded-lg px-4 py-2">
                <p class="text-2xl text-white font-bold">Payments</p>
                <p class="text-white text-4xl font-semibold"> {{ $usersTotal }} </p>
            </div>
        </div>
    </div>
    @include("notify.success")
@endsection
