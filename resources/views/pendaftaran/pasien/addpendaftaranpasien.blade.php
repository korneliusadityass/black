@extends('layouts.app', ['page' => __('Daftar'), 'pageSlug' => 'addpendaftaranpasien'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Pendaftaran Pasien') }}</h5>
                </div>
                <form method="post" action="{{ route('pages.savependaftaranpasien') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('alerts.success')
                        <div class="form-group{{ $errors->has('iduser') ? ' has-danger' : '' }}">
                            <label>{{ __('Nama Pasien') }}</label>
                            <input style="color: white;" type="text" name="iduser" class="form-control{{ $errors->has('iduser') ? ' is-invalid' : '' }}" value="{{ auth()->user()->name }}" readonly>
                            @include('alerts.feedback', ['field' => 'iduser'])
                        </div>
                        <div class="form-group{{ $errors->has('tanggaldaftar') ? ' has-danger' : '' }}">
                            <label>{{ __('Tanggal daftar') }}</label>
                            <input type="date" name="tanggaldaftar" class="form-control{{ $errors->has('tanggaldaftar') ? ' is-invalid' : '' }}" value="{{ old('tanggaldaftar') }}">
                            @include('alerts.feedback', ['field' => 'tanggaldaftar'])
                        </div>
                        <div class="form-group{{ $errors->has('jadwal') ? ' has-danger' : '' }}">
                            <label>{{ __('Jadwal Dokter') }}</label>
                            <select name="jadwal" class="form-control{{ $errors->has('jadwal') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Jadwal') }}</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'jadwal'])
                        </div>

                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary"><i class="fas fa-save"></i> {{ __('Save') }}</button>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-fill btn-primary" href="{{ route('pages.viewpendaftaranpasien') }}"><i class="tim-icons icon-minimal-left"></i> {{ __('Back') }}</a><br><br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Tangkap elemen input tanggal
            const tanggalInput = document.querySelector('input[name="tanggaldaftar"]');

            // Tangkap elemen dropdown jadwal
            const jadwalDropdown = document.querySelector('select[name="jadwal"]');

            // Fungsi untuk mengisi opsi dropdown jadwal berdasarkan hari
            function updateJadwalOptions(hari) {
                // Kosongkan opsi dropdown jadwal
                jadwalDropdown.innerHTML = '';

                // Tambahkan opsi berdasarkan hari yang dipilih
                switch (hari) {
                    case 'Senin':
                        addJadwalOption('Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00');
                        addJadwalOption('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00');
                        addJadwalOption('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30');
                        addJadwalOption('Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00');
                        break;
                    case 'Selasa':
                        addJadwalOption('Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00');
                        addJadwalOption('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00');
                        addJadwalOption('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30');
                        addJadwalOption('Splesialis Kandungan | dr. Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00');
                        break;
                    case 'Rabu':
                        addJadwalOption('Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00');
                        addJadwalOption('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00');
                        addJadwalOption('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30');
                        addJadwalOption('Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00');
                        break;
                    case 'Kamis':
                        addJadwalOption('Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00');
                        addJadwalOption('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00');
                        addJadwalOption('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30');
                        addJadwalOption('Splesialis Kandungan | dr.  Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00');
                        break;
                    case 'Jumat':
                        addJadwalOption('Spesialis Anak | dr. Hans Angelius suharto, Sp. A | 14.00-16.00');
                        addJadwalOption('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 12.00-14.00');
                        addJadwalOption('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30');
                        addJadwalOption('Splesialis Kandungan | dr. Hariyati Wijaya, Sp.OG | 10.00-15.00');
                        break;
                    case 'Sabtu':
                        addJadwalOption('Splesialis Bedah | dr. Billy Jeffkien A. ohe, Sp.B | 08.00-10.00');
                        addJadwalOption('Splesialis Gizi Klinik | dr. Aprinand Tandoek, M.Kes. Sp.GK | 08.00-09.30');
                        addJadwalOption('Splesialis Kandungan | dr. Arthur Todingbua, Sp.OG, M.Kes | 10.00-15.00');
                }
            }

            // Fungsi untuk menambahkan opsi ke dropdown jadwal
            function addJadwalOption(text) {
                const option = document.createElement('option');
                option.style.color = 'black';
                option.value = text;
                option.text = text;
                jadwalDropdown.add(option);
            }

            // Tambahkan event listener untuk perubahan pada input tanggal
            tanggalInput.addEventListener('change', function () {
                // Ambil nilai hari dari tanggal yang dipilih
                const selectedDate = new Date(tanggalInput.value);
                const hari = getDayName(selectedDate.getDay());

                // Perbarui opsi dropdown jadwal berdasarkan hari
                updateJadwalOptions(hari);
            });

            // Fungsi untuk mendapatkan nama hari berdasarkan indeks
            function getDayName(dayIndex) {
                const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                return days[dayIndex];
            }
        });
    </script>

@endsection
