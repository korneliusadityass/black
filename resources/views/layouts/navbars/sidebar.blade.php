@php
    $pageSlug = isset($pageSlug) ? $pageSlug : '';
@endphp

<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">
                <img src="{{ asset('black/img/392954327_650574423596082_8133245612540985038_n.jpg') }}" alt="Logo Rumah Sakit Bunda Pengharapan Merauke">
            </a>
            <div class="marquee-container">
                <a href="#" class="simple-title logo-normal marquee-text">{{ __('Rumah Sakit Bunda Pengharapan Merauke') }}</a>
            </div>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            @if(Auth::check() && Auth::user()->role == 'Tamu')
            <li @if ($pageSlug == 'viewpendaftaranpasien') class="active " @endif>
                <a href="{{ route('pages.viewpendaftaranpasien') }}">
                    <i class="tim-icons icon-notes"></i>
                    <p>{{ __('Pendaftaran Pasien') }}</p>
                </a>
            </li>
            @endif
            {{-- <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li> --}}
            @if(Auth::user()->role != 'Tamu')
            <li @if ($pageSlug == 'viewpasien') class="active " @endif>
                <a href="{{ route('pages.viewpasien') }}">
                    <i class="tim-icons icon-book-bookmark"></i>
                    <p>{{ __('Pasien List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'viewpendaftaran') class="active " @endif>
                <a href="{{ route('pages.viewpendaftaran') }}">
                    <i class="tim-icons icon-notes"></i>
                    <p>{{ __('Pendaftaran Pasien') }}</p>
                </a>
            </li>
            @endif
            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('User Profile') }}</p>
                </a>
            </li>
            @if(Auth::user()->role != 'Tamu')
            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ route('user.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('User Management') }}</p>
                </a>
            </li>
            @endif
            </li><li @if ($pageSlug == 'aboutus') class="active " @endif>
                <a href="{{ route('pages.aboutus') }}">
                    <i class="tim-icons icon-alert-circle-exc"></i>
                    <p>{{ __('About Us') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
