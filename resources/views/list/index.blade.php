@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('List') }}

                    </div>
                    <div class="card-body">
                        <a href="{{ route('list.create') }}" class="btn btn-primary btn-sm mb-2">Create</a>
                        <a href="/" class="btn btn-secondary btn-sm mb-2">Back</a>
                        <div class="input-group mb-3">
                            <input id="myInput" type="text" onkeyup="searchData()" placeholder="Cari..." class="form-control">
                          </div>
                        <table class="table table-striped" id="myTable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">JK</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Asal Sekolah</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $item)
                              <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jk }}</td>
                                <td>{{ $item->temp_lahir }}</td>
                                <td>{{ $item->tgl_lahir }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->asal_sekolah }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td>
                                    <form action="{{ route('list.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ingin menghapus data?')">Hapus</button>
                                        <a href="{{ route('list.edit', $item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          {{ $siswa->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
  <script src="{{ asset('js/searchsort.js') }}"></script>
@endpush
