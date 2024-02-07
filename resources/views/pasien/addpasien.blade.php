@extends('layouts.app', ['page' => __('Tambah Pasien'), 'pageSlug' => 'addpasien'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Tambah Pasien') }}</h5>
                </div>
                <form method="post" action="{{ route('pages.savepasien') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('nomorrekammedis') ? ' has-danger' : '' }}">
                            <label>{{ __('Nomor Rekam Medis') }}</label>
                            <input type="text" name="nomorrekammedis" class="form-control{{ $errors->has('nomorrekammedis') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Rekam Medis') }}" value="{{ old('nomorrekammedis') }}">
                            @include('alerts.feedback', ['field' => 'nomorrekammedis'])
                        </div>

                        <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                            <label>{{ __('Nama') }}</label>
                            <select name="iduser" class="form-control{{ $errors->has('iduser') ? ' is-invalid' : '' }}">
                                <option value="" selected disabled>{{ __('Pilih Nama') }}</option>
                                @foreach($listNama as $user)
                                    <option  style="color: black;" value="{{ $user->id }}" {{ old('iduser') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('tempat') ? ' has-danger' : '' }}">
                            <label>{{ __('Tempat Lahir') }}</label>
                            <input type="text" name="tempat" class="form-control{{ $errors->has('tempat') ? ' is-invalid' : '' }}" placeholder="{{ __('Tempat Lahir') }}" value="{{ old('tempat') }}">
                            @include('alerts.feedback', ['field' => 'tempat'])
                        </div>

                        <div class="form-group{{ $errors->has('tanggallahir') ? ' has-danger' : '' }}">
                            <label>{{ __('Tanggal Lahir') }}</label>
                            <input type="date" name="tanggallahir" class="form-control{{ $errors->has('tanggallahir') ? ' is-invalid' : '' }}" value="{{ old('tanggallahir') }}">
                            @include('alerts.feedback', ['field' => 'tanggallahir'])
                        </div>

                        <div class="form-group{{ $errors->has('jeniskelamin') ? ' has-danger' : '' }}">
                            <label>{{ __('Jenis Kelamin') }}</label>
                            <select name="jeniskelamin" class="form-control{{ $errors->has('jeniskelamin') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Jenis Kelamin') }}</option>
                                <option style="color: black;" value="Laki-laki" {{ old('jeniskelamin') == 'Laki-laki' ? 'selected' : '' }}>{{ __('Laki-laki') }}</option>
                                <option style="color: black;" value="Perempuan" {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}>{{ __('Perempuan') }}</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'jeniskelamin'])
                        </div>

                        <div class="form-group{{ $errors->has('alamatlengkap') ? ' has-danger' : '' }}">
                            <label>{{ __('Alamat Lengkap') }}</label>
                            <textarea name="alamatlengkap" class="form-control{{ $errors->has('alamatlengkap') ? ' is-invalid' : '' }}" placeholder="{{ __('Alamat Lengkap') }}">{{ old('alamatlengkap') }}</textarea>
                            @include('alerts.feedback', ['field' => 'alamatlengkap'])
                        </div>

                        <div class="form-group{{ $errors->has('pendidikan') ? ' has-danger' : '' }}">
                            <label>{{ __('Pendidikan Terakhir') }}</label>
                            <select name="pendidikan" class="form-control{{ $errors->has('pendidikan') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Pendidikan') }}</option>
                                <option style="color: black;" value="SD" {{ old('pendidikan') == 'SD' ? 'selected' : '' }}>{{ __('SD') }}</option>
                                <option style="color: black;" value="SMP" {{ old('pendidikan') == 'SMP' ? 'selected' : '' }}>{{ __('SMP') }}</option>
                                <option style="color: black;" value="SMA/SMK" {{ old('pendidikan') == 'SMA/SMK' ? 'selected' : '' }}>{{ __('SMA/SMK') }}</option>
                                <option style="color: black;" value="Diploma" {{ old('pendidikan') == 'Diploma' ? 'selected' : '' }}>{{ __('Diploma') }}</option>
                                <option style="color: black;" value="S1" {{ old('pendidikan') == 'S1' ? 'selected' : '' }}>{{ __('S1') }}</option>
                                <option style="color: black;" value="S2" {{ old('pendidikan') == 'S2' ? 'selected' : '' }}>{{ __('S2') }}</option>
                                <option style="color: black;" value="S3" {{ old('pendidikan') == 'S3' ? 'selected' : '' }}>{{ __('S3') }}</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'pendidikan'])
                        </div>

                        <div class="form-group{{ $errors->has('agama') ? ' has-danger' : '' }}">
                            <label>{{ __('Agama') }}</label>
                            <input type="text" name="agama" class="form-control{{ $errors->has('agama') ? ' is-invalid' : '' }}" placeholder="{{ __('Agama') }}" value="{{ old('agama') }}">
                            @include('alerts.feedback', ['field' => 'agama'])
                        </div>

                        <div class="form-group{{ $errors->has('pekerjaan') ? ' has-danger' : '' }}">
                            <label>{{ __('Pekerjaan') }}</label>
                            <input type="text" name="pekerjaan" class="form-control{{ $errors->has('pekerjaan') ? ' is-invalid' : '' }}" placeholder="{{ __('Pekerjaan') }}" value="{{ old('pekerjaan') }}">
                            @include('alerts.feedback', ['field' => 'pekerjaan'])
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                            <label>{{ __('Status') }}</label>
                            <select name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" selected disabled>{{ __('Pilih Status') }}</option>
                                <option style="color: black;" value="Menikah" {{ old('status') == 'Menikah' ? 'selected' : '' }}>{{ __('Menikah') }}</option>
                                <option style="color: black;" value="Belum Menikah" {{ old('status') == 'Belum Menikah' ? 'selected' : '' }}>{{ __('Belum Menikah') }}</option>
                                <option style="color: black;" value="Cerai" {{ old('status') == 'Cerai' ? 'selected' : '' }}>{{ __('Cerai') }}</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'status'])
                        </div>

                        <div class="form-group{{ $errors->has('notelp') ? ' has-danger' : '' }}">
                            <label>{{ __('Nomor Telepon') }}</label>
                            <input type="text" name="notelp" class="form-control{{ $errors->has('notelp') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Nomor Telepon') }}" value="{{ old('notelp') }}"
                                   pattern="[+0-9]+"
                                   title="Hanya dapat diisi dengan karakter + dan angka">
                            @include('alerts.feedback', ['field' => 'notelp'])
                        </div>

                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary"><i class="fas fa-save"></i> {{ __('Save') }}</button>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-fill btn-primary" href="{{ route('pages.viewpasien') }}"><i class="tim-icons icon-minimal-left"></i> {{ __('Back') }}</a><br><br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var notelpInput = document.querySelector('input[name="notelp"]');
            notelpInput.addEventListener('input', function () {
                notelpInput.value = notelpInput.value.replace(/[^0-9+]/g, '');
            });
        });
    </script>
@endsection
