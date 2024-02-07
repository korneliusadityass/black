@extends('layouts.app', ['page' => __('pendaftaran Pasien'), 'pageSlug' => 'viewpendaftaranpasien'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Pendaftaran Pasien</h4>
      </div>
      <div class="card-body">
        @php $showDaftarButton = true; @endphp
        @foreach($pendaftaranpasien as $pdfn)
          @if ($pdfn->nomor_antrian || $pdfn->status != 0)
            @php $showDaftarButton = false; @endphp
            @break
          @endif
        @endforeach

        @if ($showDaftarButton)
          <a class="btn btn-success" href="{{ route('pages.addpendaftaranpasien') }}">
            <i class="tim-icons icon-simple-add"></i> Daftar
          </a>
          <br><br>
        @endif
        <div class="table-responsive">
            <table class="table tablesorter " id="">
                <thead class=" text-primary">
                    <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Nama Pasien
                    </th>
                    <th>
                        Tanggal Daftar
                    </th>
                    <th>
                        Jadwal
                    </th>
                    </th>
                    <th>
                        Status
                    </th>
                    </tr>
                </thead>
                @php $no = 1; @endphp
                <tbody>
                    @foreach($pendaftaranpasien as $pdfn)
                        <tr>
                            <th>{{ ( $pendaftaranpasien->currentPage() - 1 ) * $pendaftaranpasien->perPage() + $loop->iteration }}</th>
                            <td>{{$pdfn->name}}</td>
                            <td>{{$pdfn->tanggaldaftar}}</td>
                            <td>{{$pdfn->jadwal}}</td>
                            <td>{{($pdfn->status ==1 ? "AKTIF" : "NON AKTIF")}}</td>
                            <td>
                                @if($pdfn->status == '1')
                                    <a href="{{ route('pages.deletependaftaranpasien', $pdfn->id)}}" onclick="return confirm('Apakah Anda Yakin Membatalkan Pendaftaran?');" class="btn btn-danger btn-sm">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Table Paging" class="mb-0 text-muted">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item{{ ($pendaftaranpasien->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $pendaftaranpasien->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $pendaftaranpasien->lastPage(); $i++)
                        <li class="page-item{{ ($pendaftaranpasien->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $pendaftaranpasien->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item{{ ($pendaftaranpasien->currentPage() == $pendaftaranpasien->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $pendaftaranpasien->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
      </div>
    </div>
    @foreach($pendaftaranpasien as $pdfn)
      @if ($pdfn->nomor_antrian)
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h1 style="font-size: 30px" class="card-category">Nomor Antrian Anda :</h1>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <h1 style="font-size: 200px; text-align: center" class="card-title">{{ $pdfn->nomor_antrian}}</h1>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4"></div>
        </div>
        @break
      @endif
    @endforeach
  </div>
</div>
@endsection
