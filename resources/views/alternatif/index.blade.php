@extends('app')
@section('content')
<a href="{{ route('alternatif.create') }}" class="btn btn-primary mb-3">+ Tambah Alternatif</a>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped m-0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach ($alternatifs as $alternatif)
                    <tr>
                        <td>{{ $alternatif->id_alternatif }}</td>
                        <td>{{ $alternatif->nama_alternatif }}</td>
                        <td>
                            <a href="{{ route('alternatif.edit', $alternatif->id_alternatif) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('alternatif.destroy', $alternatif->id_alternatif) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus alternatif ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection