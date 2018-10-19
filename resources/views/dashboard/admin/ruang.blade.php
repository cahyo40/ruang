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
<div style="margin-top:60px;" class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div id="kalendar"></div>
    </div>
</div>
<div id="app">

</div>

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('dashboard/src/plugins/fullcalendar/fullcalendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('dashboard/src/plugins/fullcalendar/jadwal.min.css')}}">
@endsection
@section('script')
    <script src="{{url('dashboard/src/plugins/fullcalendar/lib/jquery-ui.min.js')}}"></script>
	<script src="{{url('dashboard/src/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{url('dashboard/src/plugins/fullcalendar/jadwal.min.js')}}"></script>
    <script src="{{url('dashboard/src/plugins/fullcalendar/locale-all.js')}}"></script>
    <script>
        $(function(){
            var initialLocaleCode = 'id';
            $('#kalendar').fullCalendar({
            locale: initialLocaleCode,
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
            defaultView: 'agendaWeek',
            defaultDate: '{{date('Y-m-d')}}',
             scrollTime: '05:00',
            // editable: true,
            aspectRatio: 2.7,
            navLinks: true,
            selectable: true,
            eventLimit: true, // allow "more" link when too many events
             header: {
                left: 'today prev,next',
                center: 'title',
                right: 'agendaWeek,month,listWeek'
            },
            views: {
                agendaTwoDay: {
                type: 'timeline',
                groupByResource: true
                }
            },
            resourceLabelText: 'Ruang Kuliah di Teknik Komputer',
            resources: [
                @foreach($ruang as $ruang)
                    {id : '{{$ruang->kode_ruang}}',title:'{{$ruang->kode_ruang}}',color:'{{$ruang->warna}}'},
                @endforeach
            ],
            events: [
                @foreach($pinjam as $pinjam)
                {id : '{{$pinjam->kode_pinjam}}',resourceId:'{{$pinjam->kode_ruang}}',start:'{{$pinjam->tgl_pinjam}}T{{$pinjam->waktu_mulai}}',end:'{{$pinjam->tgl_pinjam}}T{{$pinjam->waktu_akhir}}',title:'{!!$pinjam->keterangan!!}'},
                @endforeach
            ],
            });
        });
    </script>
@endsection
