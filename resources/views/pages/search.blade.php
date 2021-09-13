@extends('index')
@section('title')
    {{$_GET['q']}}
@endsection
@section('content')
    <div class="list_story_book_by_category" style="min-height: 25em">
        <h1 class="mb-4">Từ khóa:
            @php
                echo $_GET['q'];
            @endphp
        </h1>
        <div class="row mb-2">
            @forelse($data as $key => $value)
                @include('components.item-book',['value' => $value])
            @empty
                <div class="ml-3">Không tìm thấy truyện cần tìm!</div>
            @endforelse
        </div>
    </div>
@endsection
