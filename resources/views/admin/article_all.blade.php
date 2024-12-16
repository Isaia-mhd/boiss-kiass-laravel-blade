@extends('layout.layout')
@section('content')
    <div class="w-full">
        <h1 class="text-center text-2xl font-semibold mb-6">All article page</h1>
    </div>
    <div>
        <p>
            @include('notify.success')
        </p>
        <table class="w-full max-w-[90%]  mx-auto rounded-tr-xl rounded-tl-xl table-auto border-collapse">
            <thead>
                <tr class="text-sm text-gray-500 ">
                    <th>Id</th>
                    <th>Image</th>
                    <th>Article</th>
                    <th>Price</th>
                    <th>Short desc</th>
                    <th>Changing</th>
                    <th>Deleting</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr class="text-center text-sm border shadow-lg">
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">{{ $article->id }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white"><img src="{{ asset('articles/' . $article->image) }}" class="w-[30px] h-[30px]" alt="img"></td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">{{ $article->name }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">${{ $article->price }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">{{ $article->short_description }}</td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">
                            <a href="{{ route('admin.edit', $article->id) }}">
                                <button type="submit" class="bg-green-500 py-1 px-3 lg:px-7 rounded text-sm text-white hover:bg-green-700 transition duration-150 ease-in-out">Edit</button>
                            </a>
                        </td>
                        <td class="border py-2 border-y-8 border-x-0  border-y-white">
                            <form action="{{ route('admin.destroy', $article->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 py-1 px-3 rounded text-sm text-white hover:bg-red-700 transition duration-150 ease-in-out">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="w-full max-w-[90%] mx-auto mt-3">{{ $articles->links('pagination::tailwind') }}</div>

       
    </div>
@endsection
