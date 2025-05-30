@extends('app')
@section('content')
    <a href="{{ route('kriteria.create') }}" class="btn btn-primary mb-3 d-flex align-items-center" style="gap: 5px; width: fit-content;"> <i class='bx  bx-plus'></i> Tambah Kriteria</a>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Atribut</th>
                    <th>Bobot</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $kriteria)
                    <tr>
                        <td>{{ $kriteria->id_kriteria }}</td>
                        <td>{{ $kriteria->nama_kriteria }}</td>
                        <td>{{ $kriteria->atribut }}</td>
                        <td>{{ $kriteria->bobot }}</td>
                        <td>
                            <a href="{{ route('kriteria.edit', $kriteria->id_kriteria) }}" class="btn btn-sm btn-warning"> <i class='bx bx-edit'></i> Edit</a>
                            <form action="{{ route('kriteria.destroy', $kriteria->id_kriteria) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-delete"> <i class='bx  bx-trash'  ></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
