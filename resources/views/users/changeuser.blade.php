@extends('layouts.app', ['page' => __('Ubah Data User'), 'pageSlug' => 'changeuser'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Ubah User') }}</h5>
                </div>
                <form method="post" action="{{ route('pages.updateuser') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                            {{-- <label>{{ __('id') }}</label> --}}
                            <input type="hidden" name="id" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" placeholder="{{ __('id') }}" value="{{ old('id', $users->id) }}">
                            @include('alerts.feedback', ['field' => 'id'])
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Nama') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('name', $users->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ __('Email') }}</label>
                            <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $users->email) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>{{ __('Password') }}</label>
                            <input type="password" name="newpassword" class="form-control{{ $errors->has('newpassword') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                            <input type="hidden" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="{{ old('password', $users->password) }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                            <label>{{ __('Role') }}</label>
                            <select name="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}">
                                <option style="color: black;" value="" disabled>{{ __('Pilih Role') }}</option>
                                <option style="color: black;" value="Admin" {{ old('role', $users->role) == 'Admin' ? 'selected' : '' }}>
                                    {{ __('Admin') }}
                                </option>
                                <option style="color: black;" value="Tamu" {{ old('role', $users->role) == 'Tamu' ? 'selected' : '' }}>
                                    {{ __('Tamu') }}
                                </option>
                            </select>
                            @include('alerts.feedback', ['field' => 'role'])
                        </div>

                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary"><i class="fas fa-save"></i> {{ __('Edit') }}</button>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-fill btn-primary" href="{{ route('pages.index') }}"><i class="tim-icons icon-minimal-left"></i> {{ __('Back') }}</a><br><br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
