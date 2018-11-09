<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="title">
            <h4>{{$nama}} ({{$username}})</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Beranda</a></li>
            </ol>
        </nav>
    </div>
</div>
<div style="margin-top:20px;margin-bottom:40px">
    @foreach($status as $a)
        <p>{{$a->status}}</p>
    @endforeach
</div>
<div>
    <div id="kalendar"></div>
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
            defaultView: 'month',
            defaultDate: '{{date('Y-m-d',strtotime("+1 day"))}}',
             scrollTime: '05:00',
            // editable: true,
            aspectRatio: 1.8,
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
                    {id : '{{$ruang->kode_ruang}}',title:'{{$ruang->kode_ruang}}'},
                @endforeach
            ],
            events: [
                @foreach($pinjam->where('status','Setuju') as $pinjam)
                    {id : '{{$pinjam->kode_pinjam}}',resourceId:'{{$pinjam->kode_ruang}}',start:'{{$pinjam->tgl_pinjam}}T{{$pinjam->waktu_mulai}}',end:'{{$pinjam->tgl_pinjam}}T{{$pinjam->waktu_akhir}}',title:'{!!$pinjam->keterangan!!}'},
                @endforeach
            ],
            });
        });
    </script>
@endsection