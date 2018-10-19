<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="title">
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Beranda</a></li>

            </ol>
        </nav>
    </div>
</div>
<div style="margin-top:60px;" class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div id="kalendar"></div>
    </div>
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