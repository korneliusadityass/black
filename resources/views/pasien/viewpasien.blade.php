@extends('layouts.app', ['page' => __('Pasien List'), 'pageSlug' => 'viewpasien'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Pasien List</h4>
      </div>
      <div class="card-body">
        <a class="btn btn-success" href="{{ route('pages.addpasien') }}"><i class="tim-icons icon-simple-add"></i> Tambah Pasien</a><br><br>
        <div class="table-responsive">
            <table class="table tablesorter " id="">
                <thead class=" text-primary">
                    <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Nomor Rekam Medis
                    </th>
                    <th>
                        Nama
                    </th>
                    <th>
                        Di buat pada
                    </th>
                    <th>
                        Di ubah pada
                    </th>
                    <th>
                        Action
                    </th>
                    </tr>
                </thead>
                @php $no = 1; @endphp
                <tbody>
                    @foreach($pasien as $psn)
                        <tr>
                            <th>{{ ( $pasien->currentPage() - 1 ) * $pasien->perPage() + $loop->iteration }}</th>
                            <td>{{$psn->nomorrekammedis}}</td>
                            <td>{{$psn->name}}</td>
                            <td>{{$psn->created_at}}</td>
                            <td>{{$psn->updated_at}}</td>
                            <td>
                                <a href="{{ route('pages.detailpasien', $psn->id)}}" class="btn btn-info btn-sm"><i class="tim-icons icon-zoom-split"></i></a>
                                <a href="{{ route('pages.changepasien', $psn->id)}}" class="btn btn-warning btn-sm"><i class="tim-icons icon-pencil"></i></a>
                                <a href="{{ route('pages.deletepasien', $psn->id)}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Table Paging" class="mb-0 text-muted">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item{{ ($pasien->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $pasien->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $pasien->lastPage(); $i++)
                        <li class="page-item{{ ($pasien->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $pasien->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item{{ ($pasien->currentPage() == $pasien->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $pasien->nextPageUrl() }}" aria-label="Next">
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
@endsection
