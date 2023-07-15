@if ($histori->isEmpty())
    <div class="alert alert-outline-warning">
        <p>Data Belum Ada</p>
@endif
@foreach ($histori as $d)
    <ul class="listview">
        <li>
            <div class="item">
                @php
                    $path = Storage::url('uploads/absensi/');
                @endphp
                <div class="in">
                    <div>
                        <b>{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</b><br>
                    </div>
                    <span class="badge {{ $d->jam_in < "07:00" ? "bg-success" : "bg-danger" }}">
                        {{ $d->jam_in }}
                    </span>
                    <span class="badge bg-primary">{{ $d->jam_out }}</span>
                </div>
            </div>
        </li>
    </ul>
@endforeach
