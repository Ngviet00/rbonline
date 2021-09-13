@extends('layouts.app')
@section('content')
    @livewireStyles
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('categories')
            </div>
        </div>
    </div>
@endsection
@livewireScripts
<style>
    ul.pagination {
        display: flex;
        justify-content: center;
    }
</style>
