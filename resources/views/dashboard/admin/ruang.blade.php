<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="title">
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}/{{ csrf_token() }}">Beranda</a></li>
                <li class="breadcrumb-item active">Ruang</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
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
    </div>
    <div class="col-md-4">
        <a href="#" class="btn btn-primary" role="button" data-toggle="modal" data-target="#tambah-ruang" >Tambah Ruang</a>
        <div class="modal fade" id="tambah-ruang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Ruang Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <form action="{{route('tambahruang')}}" method="POST">
                        <div class="form-group">
                            <label>Kode Ruang Kelas</label>
                            <input name="kode" class="form-control" type="text" placeholder="Kode Ruang Kelas">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control"></textarea>
                        </div>
                        @csrf
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin-top:30px">
    <table id="ruang" class="data-table stripe hover nowrap">
        <thead>
            <tr>
                <th>Kode Kelas</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ruang as $ruang)
            <tr>
                <td>{{$ruang->kode_ruang}}</td>
                <td>{{$ruang->keterangan}}</td>
                <td>
                    <div class="dropdown">
                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Hapus</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Kode Kelas</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>
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
            $('#ruang').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
            });
        } );
    </script>
@endsection
