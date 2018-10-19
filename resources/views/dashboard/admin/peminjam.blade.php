@extends('dashboard.template')
@section('title','Daftar Pengguna')
@section('header')
    @include('dashboard.non-admin.header')
@endsection
@section('footer')
    @include('dashboard.footer')
@endsection
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('konten')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="title">
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}/{{ csrf_token() }}">Beranda</a></li>
                <li class="breadcrumb-item active">Pengguna</a></li>
            </ol>
        </nav>
    </div>
</div>
<center><h3>Daftar Mahasiswa</h3></center>
<div class="row">
    <table id="mahasiswa" class="data-table stripe hover nowrap">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mahasiswa as $mahasiswa)
            <tr>
                <td>{{$mahasiswa->username}}</td>
                <td>{{$mahasiswa->nama}}</td>
                <td>{{$mahasiswa->email}}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fa fa-eye"></i> {{$mahasiswa->username}}</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('dashboard/src/plugins/datatables/media/css/jquery.dataTables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('dashboard/src/plugins/datatables/media/css/dataTables.bootstrap4.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('dashboard/src/plugins/datatables/media/css/responsive.dataTables.css')}}">
@endsection
@section('script')
	<script src="vendors/scripts/script.js"></script>	<script src="{{url('dashboard/src/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{url('dashboard/src/plugins/datatables/media/js/dataTables.bootstrap4.js')}}"></script>
	<script src="{{url('dashboard/src/plugins/datatables/media/js/dataTables.responsive.js')}}"></script>
	<script src="{{url('dashboard/src/plugins/datatables/media/js/responsive.bootstrap4.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#mahasiswa').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
            });
        } );
    </script>
@endsection
