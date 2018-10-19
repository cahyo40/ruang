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
            defaultView: 'agendaWeek',
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
                { id: '5', resourceId: 'D.304', start: '2018-10-07T10:20', end: '2018-10-07T12:00', title: 'Kuliah Tapi Minggu' }
            ],
            });
        });
    </script>
@endsection