@extends('index')
@section('title')
    {{$category->name}}
@endsection
@section('content')
    <div class="list_story_book_by_category" style="min-height: 30em">
        <h2 class="my-4">{{$category->name}}</h2>
        <div class="row mb-2">
            @forelse($list_books_by_slug as $key => $value)
                @include('components.item-book',['value' => $value])
            @empty
                <div class="ml-3">Đang cập nhật...</div>
            @endforelse
        </div>
    </div>
@endsection
