@extends('layouts.app', ['page' => __('Daftar'), 'pageSlug' => 'adduser'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Pendaftaran User') }}</h5>
                </div>
                <form method="post" action="{{ route('pages.saveuser') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('alerts.success')
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Nama') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
                            </select>
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ __('Email') }}</label>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>{{ __('Password') }}</label>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                            <label>{{ __('Role') }}</label>
                            <select name="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Role') }}</option>
                                <option style="color: black;" value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>{{ __('Admin') }}</option>
                                <option style="color: black;" value="Tamu" {{ old('role') == 'Tamu' ? 'selected' : '' }}>{{ __('Tamu') }}</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'status'])
                        </div>

                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary"><i class="fas fa-save"></i> {{ __('Save') }}</button>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-fill btn-primary" href="{{ route('user.index') }}"><i class="tim-icons icon-minimal-left"></i> {{ __('Back') }}</a><br><br>
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
