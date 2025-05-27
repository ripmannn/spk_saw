@extends('app')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-3">Kriteria {{ $kriteria->id_kriteria }}</h2>
        <form action="{{ route('kriteria.update', $kriteria->id_kriteria) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_kriteria" value="{{ $kriteria->nama_kriteria }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Atribut</label>
                <select class="form-select" name="atribut" required>
                    <option value="benefit" {{ $kriteria->atribut == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                    <option value="cost" {{ $kriteria->atribut == 'Cost' ? 'selected' : '' }}>Cost</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Bobot</label>
                <input type="number" step="0.01" class="form-control" name="bobot" value="{{ $kriteria->bobot }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
