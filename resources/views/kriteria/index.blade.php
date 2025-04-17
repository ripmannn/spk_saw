@extends('app')
@section('content')
    <a href="{{ route('kriteria.create') }}" class="btn btn-primary mb-3">+ Tambah Kriteria</a>

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
                            <a href="{{ route('kriteria.edit', $kriteria->id_kriteria) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('kriteria.destroy', $kriteria->id_kriteria) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin hapus?')"
                                    class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
