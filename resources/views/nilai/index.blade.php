@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('nilai.create') }}" class="btn btn-primary">Create</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped m-0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->nama_kriteria }}</th>
                        @endforeach
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach ($nilais as $key => $val)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $alternatifs[$key]->nama_alternatif }}</td>
                        @foreach ($val as $k => $v)
                            <td>{{ $v }}</td>
                        @endforeach
                        <td>
                            <a href="{{ route('nilai.edit', $key) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                            <form action="{{ route('nilai.destroy', $key) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection