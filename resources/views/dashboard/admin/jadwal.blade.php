@extends('dashboard.template')
@section('title','Kelola Jadwal')
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
                <li class="breadcrumb-item active">Jadwal</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 mb-30">
    <div class="pd-20 bg-white border-radius-4 box-shadow">
        <h5 class="weight-500 mb-20">Penjadwalan Ruang</h5>
        <div class="tab">
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home2" role="tab" aria-selected="true">
                        Daftar Jadwal Penggunaan Ruang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile2" role="tab" aria-selected="false">
                        Tambah Jadwal Penggunaan Ruang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-selected="false">
                        Kelola Jadwal Penggunaan Ruang
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="home2" role="tabpanel">
                    <div class="pd-20">
                        <table id="jdwl">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Ruang</th>
                                    <th>Peminjam</th>
                                    <th>Waktu</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                                @foreach($jadwal as $a)
                                    <td>{{$no++}}</td>
                                    <td>{{$a->kode_ruang}}</td>
                                    <td>{{$a->username}}</td>
                                    <td>{{$a->tgl_pinjam}}</td>
                                    <td>Detail</td>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Ruang</th>
                                    <th>Peminjam</th>
                                    <th>Waktu</th>
                                    <th>Detail</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile2" role="tabpanel">
                    <div class="pd-20">
                        <form action="{{route('tambahJadwaladmin')}}" method="post">
                            <div class="form-group">
                                <label>Pilih Ruang Kelas</label>
                                <select class="form-control" name="kode" required>
                                    <option value-"">Pilih Ruang Kelas</option>
                                @foreach($ruang as $ruang)
                                    <option value="{{$ruang->kode_ruang}}">{{$ruang->kode_ruang}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kegunaan</label>
                                <input class="form-control" placeholder="Select Date" type="date" name="tgl">
                            </div>
                            <div class="form-group">
                                <label>Waktu Mulai</label>
                                <input class="form-control" placeholder="time" type="time" name="mulai">
                            </div>
                            <div class="form-group">
                                <label>Waktu Berakhir</label>
                                <input class="form-control" placeholder="time" type="time" name="akhir">
                            </div>
                            <div class="form-group">
                                <label>Kegunaan</label>
                                <input class="form-control" placeholder="Kegunaan" type="text" name="kegunaan">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control"></textarea>
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile3" role="tabpanel">
                    <div class="pd-20">
                        <h1>Kelola</h1>
                    </div>
                </div>
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
            $('#jdwl').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
            });
        } );
        $(document).ready( function () {
            $('#jdwled').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
            });
        } );
    </script>
@endsection