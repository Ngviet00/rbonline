@extends('layouts.app')
@section('content')
<div class="app-page-title m-0">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Thông tin</div>
            <div class="p-4">
                <b class="mb-2 d-block" style="font-size: 20px">ID: {{$idUser}}</b>
                <b class="my-2 d-block" style="font-size: 20px">Tên đăng nhập: {{$name}}</b>
                <b class="my-2 d-block" style="font-size: 20px">Email: {{$email}}</b>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <x-card-component title="Sách" :numberData="$countBook" bgColor="bg-midnight-bloom" textColor="text-white"/>
    <x-card-component title="Danh mục" :numberData="$countCategory" bgColor="bg-arielle-smile" textColor="text-white"/>
    <x-card-component title="Số chương" :numberData="$countChapper" bgColor="bg-grow-early" textColor="text-white"/>
    <x-card-component title="Thành viên" :numberData="$countUser" bgColor="bg-premium-dark" textColor="text-warning"/>
    <x-card-component title="Lượt truy cập" :numberData="513.679" bgColor="bg-primary" textColor="text-white"/>
</div>
@endsection
