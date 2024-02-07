@extends('layouts.app', ['page' => __('pendaftaran Pasien'), 'pageSlug' => 'viewpendaftaran'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Pendaftaran Pasien</h4>
      </div>
      <div class="card-body">
        <a class="btn btn-success" href="{{ route('pages.addpendaftaran') }}"><i class="tim-icons icon-simple-add"></i> Daftar</a><br><br>
        <div class="table-responsive">
            <div id="table-container">
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
                    <th>
                        Nomor Antrian
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
                            <td>{{ $pdfn->nomor_antrian ?? '' }}</td>
                            <td>{{($pdfn->status ==1 ? "AKTIF" : "NON AKTIF")}}</td>
                            <td>
                                @if($pdfn->status == 1)
                                <a href="{{ route('pages.finishpendaftaran', $pdfn->id)}}" class="btn btn-success btn-sm"><i class="tim-icons icon-check-2"></i></a>
                                <a href="{{ route('pages.deletependaftaran', $pdfn->id)}}" onclick="return confirm('Apakah Anda Yakin Membatalkan Pendaftaran?');" class="btn btn-danger btn-sm"><i class="tim-icons icon-simple-remove"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
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
  </div>
</div>
<!-- Update your pagination links to use AJAX -->
<script>
    $(document).ready(function () {
      $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');

        $.ajax({
          url: url,
          success: function (data) {
            $('#table-container').html(data);
          }
        });
      });
    });
  </script>

@endsection
