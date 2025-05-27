@extends('app')
@section('content')
    <div class="container mt-5">
    
        <form action="{{ route('kriteria.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_kriteria" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" required>
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
                <input type="number" step="0.01" class="form-control" id="bobot" name="bobot" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
