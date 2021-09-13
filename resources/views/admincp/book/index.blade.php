@extends('layouts.app')
@section('content')
@livewireStyles
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('books')
        </div>
    </div>
</div>
@endsection
<style>
    ul.pagination {
        display: flex;
        justify-content: center;
    }
</style>
@livewireScripts
