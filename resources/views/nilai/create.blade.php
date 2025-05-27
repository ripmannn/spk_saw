@extends('app')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">{{ $title }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('nilai.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_alternatif" class="form-label">Alternatif</label>
                        <select name="id_alternatif" id="id_alternatif" class="form-select" required>
                            <option value="">-- Pilih Alternatif --</option> {{-- Baris ini baik untuk ditambahkan --}}
                            @foreach ($alternatifs as $a)
                                {{-- Tidak perlu @if di sini karena $alternatifs sudah difilter dari controller --}}
                                <option value="{{ $a->id_alternatif }}">{{ $a->nama_alternatif }}</option>
                            @endforeach
                        </select>
                    </div>

                    @foreach ($kriterias as $k)
                        <div class="mb-3">
                            <label for="nilai_{{ $k->id_kriteria }}" class="form-label">{{ $k->nama_kriteria }} : ( {{$k->id_kriteria}} )</label>
                            <input type="number" step="0.01" name="nilai[{{ $k->id_kriteria }}]"
                                id="nilai_{{ $k->id_kriteria }}" class="form-control" required>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
