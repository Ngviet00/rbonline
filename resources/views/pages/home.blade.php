@extends('index')
<?php
\Carbon\Carbon::setLocale('vi');
?>
@section('title','Trang chủ')
@section('content')
    <div class="home">
        <div class="new_story_book">
            <h1 class="my-4" style="font-weight: bolder;font-style: italic">Dành cho bạn</h1>
            <h2 class="my-4" >Sách nổi bật</h2>
            <div class="row mb-2">
                @foreach ($listOutStandingBooks as $key => $value)
                    @include('components.item-book',['value' => $value])
                @endforeach
            </div>
            <div>
                <h2 class="my-4">Sách mới</h2>
                <div class="row mb-2">
                    @foreach ($listNewBooks as $key => $value)
                        @include('components.item-book',['value' => $value])
                    @endforeach
                </div>
            </div>

            <h1 class="font-italic">Mới cập nhật</h1>
            <table class="table my-4">
                <tbody>
                @foreach($listNewUpdateBooks as $key => $value)
                    <tr>
                        <th scope="row" id="name_book">
                            <a href="/detail/{{$value->book->slug}}" class="font-weight-bold title_dark">
                                {{$value->book->name}}
                            </a>
                        </th>
                        <td id="name_chapper" >
                            <a class="title_dark" href="{{route('chapper', [$value->book->slug, $value->slug])}}">
                                {{$value->name_chapper}}
                            </a>
                        </td>
                        <td id="category">
                            <a class="title_dark" href="{{ route('categoryBySlug', [$value->book->category->slug]) }}">
                                {{$value->book->category->name}}
                            </a>
                        </td>
                        <td class="title_dark" id="created_at">{{$value->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
