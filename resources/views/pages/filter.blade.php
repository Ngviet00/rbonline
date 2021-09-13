@extends('index')
@section('content')
@livewireStyles
    <div style="min-height: 28em;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white p-0">
                <li class="breadcrumb-item"><a href="/" class="title_dark text-dark font-weight-bold">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-dark title_dark" style="text-decoration: none">Lọc sách</a></li>
            </ol>
        </nav>
        @livewire('filter')
    </div>
@endsection
@livewireScripts
