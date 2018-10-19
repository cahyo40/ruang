@extends('dashboard.template')
@if($role == "mahasiswa")
@section('konten')
    @include('dashboard.non-admin.ruang')
@endsection
@section('title','Halaman Ruang Kelas')
@section('header')
    @include('dashboard.non-admin.header')
@endsection
@section('sidebar')
    @include('dashboard.non-admin.sidebar')
@endsection
@section('footer')
    @include('dashboard.footer')
@endsection


@elseif($role == "admin")
@section('title','Dashboard Admin')
@section('header')
    @include('dashboard.non-admin.header')
@endsection
@section('footer')
    @include('dashboard.footer')
@endsection
@section('konten')
    @include('dashboard.admin.ruang')
@endsection
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@elseif($role == "dosen")
@section('konten')
    @include('dashboard.non-admin.ruang')
@endsection
@section('title','Dashboard Dosen')
@section('header')
    @include('dashboard.non-admin.header')
@endsection
@section('sidebar')
    @include('dashboard.non-admin.sidebar')
@endsection
@section('footer')
    @include('dashboard.footer')
@endsection
@else

@endif
