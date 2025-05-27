@extends('app')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">{{ $title }} : {{ $alternatif->id_alternatif }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('nilai.update', $alternatif->id_alternatif) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Alternatif</label>
                        <input type="text" class="form-control" value="{{ $alternatif->nama_alternatif }}" disabled>
                    </div>

                    @foreach ($kriterias as $k)
                        <div class="mb-3">
                            <label class="form-label">{{ $k->nama_kriteria }}</label>
                            <input type="number" step="0.01" name="nilai[{{ $k->id_kriteria }}]" class="form-control"
                                   value="{{ $nilaiMap[$k->id_kriteria] ?? '' }}" required>
                        </div>
                    @endforeach

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
