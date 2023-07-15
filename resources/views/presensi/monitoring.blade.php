@extends('layouts.admin.tabler')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Monitoring Presensi
                    </h2>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-icon mb-3">
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-calendar-check" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M11.5 21h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v6">
                                                    </path>
                                                    <path d="M16 3v4"></path>
                                                    <path d="M8 3v4"></path>
                                                    <path d="M4 11h16"></path>
                                                    <path d="M15 19l2 2l4 -4"></path>
                                                </svg>
                                            </span>
                                            <input type="text" id="tanggal" name="tanggal" value=""
                                                class="form-control" placeholder="Tanggal Presensi" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nik</th>
                                                <th>Nama Karyawan</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Keluar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="loadpresensi">

                                        </tbody>
                                    </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @push('myscript')
            <script>
                $(function() {
                    $("#tanggal").datepicker({
                        autoclose: true,
                        todayHighlight: true,
                        format: 'yyyy-mm-dd'
                    });

                    $("#tanggal").change(function(e) {
                        var tanggal = $(this).val();
                        $.ajax({
                            type: 'POST'
                            , url: '/getpresensi'
                            , data: {
                                _token: "{{ csrf_token() }}"
                               , tanggal: tanggal
                            }
                            , cache: false
                            , success: function(respond) {
                                $("#loadpresensi").html(respond);
                            }
                        });
                    });
                });
            </script>
        @endpush
