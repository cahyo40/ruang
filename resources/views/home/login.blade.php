@extends('home.template')
@section('judul','Halaman Login')
@section('konten')
<div class="container" style="padding-top:20px">
    <div class="card">
        <div class="card-header">
            <h3 align="center">
                FORM LOGIN
            </h3>
        </div>
        <div class="card-body">
            <form action="{{route('prosesLogin')}}" method="POST">
                <div class="form-group">
                    <label for="email">Username:</label>
                    <input type="text" class="form-control" name="username" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" id="pwd">
                </div>
                @csrf
                <button type="submit" class="btn btn-outline-primary">Login</button>
            </form>
            <center>
                @if (session('gagal'))
                    <div class="alert alert-danger">
                        {{ session('gagal') }}
                    </div>
                @endif
                @if (session('sukses'))
                    <div class="alert alert-success">
                        {{ session('sukses') }}
                    </div>
                @endif
            </center>
        </div>
    </div>
</div>

@endsection
@section('css')
<link rel="stylesheet" href="{{url('home/css/assets/pricing-tbl.css')}}">
@endsection
