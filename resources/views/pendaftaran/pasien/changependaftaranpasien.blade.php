@extends('layouts.app', ['page' => __('Ubah Data Pendaftaran'), 'pageSlug' => 'changependaftaran'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Ubah Pendaftaran') }}</h5>
                </div>
                <form method="post" action="{{ route('pages.updatependaftaran') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                            {{-- <label>{{ __('id') }}</label> --}}
                            <input type="hidden" name="id" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Rekam Medis') }}" value="{{ old('id', $pendaftaranpasien->id) }}">
                            @include('alerts.feedback', ['field' => 'id'])
                        </div>

                        <div class="form-group{{ $errors->has('idpasien') ? ' has-danger' : '' }}">
                            <label>{{ __('Nama Pasien') }}</label>
                            <select style="color: white; -moz-appearance: none; -webkit-appearance: none; appearance: none; overflow: hidden; text-overflow: ''; text-indent: 0;" name="idpasien" class="form-control{{ $errors->has('idpasien') ? ' is-invalid' : '' }}" disabled>
                                <option value="" selected disabled>{{ __('Pilih Pasien') }}</option>
                                @foreach($listPasien as $pasien)
                                    <option style="color: black;" value="{{ $pasien->id }}" {{ $pendaftaranpasien->idpasien == $pasien->id ? 'selected' : '' }}>
                                        {{ $pasien->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'idpasien'])
                        </div>
                        <div class="form-group{{ $errors->has('tanggaldaftar') ? ' has-danger' : '' }}">
                            <label>{{ __('Tanggal daftar') }}</label>
                            <input style="color: white" type="date" name="tanggaldaftar" class="form-control{{ $errors->has('tanggaldaftar') ? ' is-invalid' : '' }}" value="{{ old('tanggaldaftar', $pendaftaranpasien->tanggaldaftar) }}" readonly>
                            @include('alerts.feedback', ['field' => 'tanggaldaftar'])
                        </div>

                        <div class="form-group{{ $errors->has('jadwal') ? ' has-danger' : '' }}">
                            <label>{{ __('Jadwal Dokter') }}</label>
                            <input style="color: white" type="text" id="jadwal" name="jadwal" class="form-control{{ $errors->has('jadwal') ? ' is-invalid' : '' }}" value="{{ old('jadwal', $pendaftaranpasien->jadwal) }}" readonly>
                            @include('alerts.feedback', ['field' => 'jadwal'])
                        </div>

                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary"><i class="fas fa-save"></i> {{ __('Edit') }}</button>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-fill btn-primary" href="{{ route('pages.viewpendaftaran') }}"><i class="tim-icons icon-minimal-left"></i> {{ __('Back') }}</a><br><br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
