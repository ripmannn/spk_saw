@extends('app')
@section('content')
    <form action="{{ route('alternatif.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_alternatif" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama_alternatif') is-invalid @enderror" id="nama_alternatif" name="nama_alternatif" value="{{ old('nama_alternatif') }}" required>
                @error('nama_alternatif')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>
        <button type="submit" class="btn btn-success mt-2">Simpan</button>
    </form>
@endsection
