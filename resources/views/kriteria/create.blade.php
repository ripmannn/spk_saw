@extends('app')
@section('content')
    <form action="{{ route('kriteria.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_kriteria" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" id="nama_kriteria"
                name="nama_kriteria" value="{{ old('nama_kriteria') }}" required>
            @error('nama_kriteria')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="atribut" class="form-label">Atribut</label>
            <select class="form-select" id="atribut" name="atribut" required>
                <option value="Benefit">Benefit</option>
                <option value="Cost">Cost</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="number" step="0.01" class="form-control @error('bobot') is-invalid @enderror" id="bobot"
                name="bobot" value="{{ old('bobot') }}" required>
            @error('bobot')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
