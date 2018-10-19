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
@php
$no = 1;
@endphp
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
<div class="tab">
    <ul class="nav nav-tabs customtab" role="tablist">
        <li>
            <a href="#mahasiswa" class="nav-link active" data-toggle="tab" role="tab" aria-selected="false">
                Daftar Mahasiswa
            </a>
        </li>
        <li>
            <a href="#dosen" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">
                Daftar Dosen
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="mahasiswa" role="tabpane1">
            <div class="pd-20">
                <h3 align="center">DAFTAR MAHASISWA</h3>
                <table id="daftarMHS" class="data-table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($mahasiswa as $mahasiswa)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$mahasiswa->username}}</td>
                            <td>{{$mahasiswa->nama}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Kelas</th>
                            <th>Keterangan</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="tab-pane fade show " id="dosen" role="tabpane1">
            <div class="pd-20">
                <h3 align="center">DAFTAR DOSEN</h3>
                <table id="dftrDosen" class="data-table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dosen as $dosen)
                        <tr>
                            <td>{{$dosen->username}}</td>
                            <td>{{$dosen->nama}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kode Kelas</th>
                            <th>Keterangan</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
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
            $('#daftarMHS').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
            });
        } );
        $(document).ready( function () {
            $('#dftrDosen').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
            });
        } );
    </script>
@endsection
