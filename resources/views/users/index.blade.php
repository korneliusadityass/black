@extends('layouts.app', ['page' => __('user list'), 'pageSlug' => 'index'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">User List</h4>
      </div>
      <div class="card-body">
        <a class="btn btn-success" href="{{ route('pages.adduser') }}"><i class="tim-icons icon-simple-add"></i> Tambah User</a><br><br>
        <div class="table-responsive">
            <table class="table tablesorter " id="">
                <thead class=" text-primary">
                    <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Nama
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Role
                    </th>
                    <th>
                        Action
                    </th>
                    </tr>
                </thead>
                @php $no = 1; @endphp
                <tbody>
                    @foreach($users as $usr)
                        <tr>
                            <th>{{ ( $users->currentPage() - 1 ) * $users->perPage() + $loop->iteration }}</th>
                            <td>{{$usr->name}}</td>
                            <td>{{$usr->email}}</td>
                            <td>{{$usr->role}}</td>
                            <td>
                            @if(Auth::user()->role == 'Super Admin' || (Auth::user()->role == 'Admin' && $usr->role == 'Tamu'))
                                <a href="{{ route('pages.changeuser', $usr->id)}}" class="btn btn-warning btn-sm"><i class="tim-icons icon-pencil"></i></a>
                                <a href="{{ route('pages.deleteuser', $usr->id)}}" onclick="return confirm('Apakah Anda Yakin Menghapus User?');" class="btn btn-danger btn-sm"><i class="tim-icons icon-simple-remove"></i></a>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Table Paging" class="mb-0 text-muted">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item{{ ($users->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                        <li class="page-item{{ ($users->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item{{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
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
