@extends('app')
@section('content')
    <a href="{{ route('nilai.create') }}" class="btn btn-primary mb-3 d-flex align-items-center" style="gap: 5px; width: fit-content;"><i class='bx  bx-plus'></i> <span>Tambah Nilai</span></a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    @foreach ($kriterias as $kriteria)
                        <th>{{ $kriteria->nama_kriteria }} : ({{ $kriteria->id_kriteria }})</th>
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
                        <a href="{{ route('nilai.edit', $key) }}" class="btn btn-sm btn-warning"><i class='bx bx-edit'></i> Edit</a>

                        <form action="{{ route('nilai.destroy', $key) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus data ini?')"
                                class="btn btn-sm btn-danger"><i class='bx  bx-trash'  ></i> Hapus</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
@endsection
