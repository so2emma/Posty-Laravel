@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-3/4 ">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1 ">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }}  {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes->count() }} likes </p>
            </div>
            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post"></x-post>
                    @endforeach
                @else
                    <p>{{ $user->name }} does not have any post</p>
                @endif

                <div class="mt-6 p-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
