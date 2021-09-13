@extends('index')
@section('title')
    {{$currenChapper->name_chapper}}
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white p-0 mt-3">
            <li class="breadcrumb-item">
                <a href="/" class="title_dark text-dark font-weight-bold">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('detail',[$currenChapper->book->slug])}}" class="title_dark text-dark font-weight-bold">
                    {{$currenChapper->book->name}}
                </a>
            </li>
            <li class="breadcrumb-item active title_dark" aria-current="page">
                {{$currenChapper->name_chapper}}
            </li>
        </ol>
    </nav>
    <div class="container chapper p-0">
         <div class="col-12 text-center p-0">
             <h1>{{$currenChapper->book->name}}</h1>
             <h3 class="">{{$currenChapper->name_chapper}}</h3>
             <h5>
                 Tác giả: <a href="" class="title_dark">{{$currenChapper->book->author}}</a>
             </h5>
             <h5>
                 Thể loại: <a class="title_dark" href="{{ route('categoryBySlug', [$currenChapper->book->category->slug]) }}">
                     {{$currenChapper->book->category->name}}
                 </a>
             </h5>
             <div>
                 <div>
                     <a href="{{url('detail/'.$book->slug.'/'.$prev)}}"
                        class="btn btn-primary {{ $minId->id == $currenChapper->id ? 'disabled' : '' }}">
                         Tập trước
                     </a>
                     <button class="btn btn-primary"
                             type="button"
                             data-toggle="modal"
                             data-target="#exampleModalLong">
                         <i class="fa fa-book" aria-hidden="true"></i>
                     </button>
                     <a href="{{url('detail/'.$book->slug.'/'.$next)}}"
                        class="btn btn-primary {{ $maxId->id == $currenChapper->id ? 'disabled' : '' }}">
                         Tập sau
                     </a>
                 </div>
                 <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title text-dark" id="exampleModalLongTitle">Danh sách chương</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body text-left">
                                <ul class="list_chapper">
                                    @foreach($list_chappers as $key => $chapper)
                                        <li>
                                            <a href="{{route('chapper', [$book->slug,$chapper->slug])}}">{{$chapper->name_chapper}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="content_chapper my-3 text-left" style="font-size: 20px">
                     {!! $currenChapper->content !!}
                 </div>
                 <div>
                     <a href="{{url('detail/'.$book->slug.'/'.$prev)}}"
                        class="btn btn-primary {{ $minId->id == $currenChapper->id ? 'disabled' : '' }}">
                         Tập trước
                     </a>
                     <button class="btn btn-primary"
                             type="button"
                             data-toggle="modal"
                             data-target="#exampleModalLong">
                         <i class="fa fa-book" aria-hidden="true"></i>
                     </button>
                     <a href="{{url('detail/'.$book->slug.'/'.$next)}}"
                        class="btn btn-primary {{ $maxId->id == $currenChapper->id ? 'disabled' : '' }}">
                         Tập sau
                     </a>
                 </div>
             </div>
         </div>
    </div>
@endsection
