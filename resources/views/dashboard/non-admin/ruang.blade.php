<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="title">
            <h4>{{$nama}} ({{$username}})</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}/{{ csrf_token() }}">Beranda</a></li>
                <li class="breadcrumb-item active">Ruang</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="container-fluid">
    <form action="" method="post">
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
