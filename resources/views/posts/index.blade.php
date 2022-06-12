@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-3/4 bg-white p-6 rounded-lg">
            @auth
            <form action="{{ route('posts') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="" cols="30" rows="4"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('body') border-red-500 @enderror"
                        placeholder="Post something!"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium ">
                    Post
                </button>
            </form>
            @endauth

            @if ($posts->count())
                @foreach ($posts as $post)
                <x-post :post="$post"></x-post>
                @endforeach
            @else
                <p>Thera are no posts</p>
            @endif

            <div class="mt-6 p-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
