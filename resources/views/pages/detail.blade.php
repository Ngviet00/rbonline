@extends('index')
@section('title')
    {{ $book->name  }}
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mt-3 m-0 p-0 pb-2 mb-2">
            <li class="breadcrumb-item"><a href="/" class="title_dark text-dark font-weight-bold">Trang chủ</a></li>
            <li class="breadcrumb-item active title_dark" aria-current="page">{{$book->name}}</li>
        </ol>
    </nav>
    <div class="detail_book">
        <div class="row" style="min-height: 450px">
            <div class="col-4 main_image">
                <img class="d-block w-100 h-auto" src="{{asset('uploads/books/'.$book->image)}}" alt="image">
            </div>
            <div class="col-8">
                <h1 class="name_book">{{$book->name}}</h1>
                <span class="wp_category_book">Thể loại:
                    <a href="{{ route('categoryBySlug', [$book->category->slug]) }}" class="title_dark category_book text-dark">
                        {{$book->category->name}}
                    </a>
                </span>
                <span class="wp_actor">Tác giả: <a href="#" class="actor">{{$book->author}}</a></span>
                @if($numberListChapper > 0)
                    <a  href="{{route('chapper',[$book->slug,$listChappers[0]['slug']])}}" class="btn btn-danger my-2">
                        Đoc sách
                    </a>
                @endif
                <div>
                </div>
                <p class="summary">
                    <span class="font-weight-bold">Tóm Tắt: {!! $book->description !!}</span>
                </p>
            </div>
        </div>
        <div class="chapper mt-3">
            <div class="row">
                <div class="col-8 list_chapper">
                    <h2>Danh sách chương</h2>
                    <ul>
                        @forelse($listChappers as $key => $chapper)
                            <li>
                                <a href="{{route('chapper', [$book->slug, $chapper->slug])}}" class="title_dark">
                                    {{$chapper->name_chapper}}
                                </a>
                            </li>
                        @empty
                            <li>Đang cập nhật...</li>
                        @endforelse
                    </ul>
                    {{ $listChappers->links() }}
                </div>
                <div class="col-4 list_category">
                    <h2>Thể loại</h2>
                    <ul>
                        @foreach($list_categories as $key => $category)
                            <li>
                                <a href="{{route('categoryBySlug',[$category->slug])}}">
                                    {{$category->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <h1 class="mb-3">Bình luận</h1>
        @if( count($listRelativeBooks) > 0 )
            <h2 class="my-4">Cùng thể loại</h2>
            <div class="row mb-2">
                @foreach ($listRelativeBooks as $key => $value)
                    @include('components.item-book',['value' => $value])
                @endforeach
            </div>
        @endif
    </div>
@endsection
<style>
    ul.pagination {
        display: flex;
        justify-content: center;
    }
</style>

