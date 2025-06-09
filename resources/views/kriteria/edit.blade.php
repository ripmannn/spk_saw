@extends('app')
@section('content')
    <style>
        .error-box {
            background-color: #ff0000;
            color: white;
            padding: 5px;
            margin-top: -15px;
            margin-bottom: 15px;
            border: 2px solid #000;
        }
    </style>
    <div class="container " style="max-width: 800px; border: 4px solid #000; padding: 2rem; background-color: #f0f0f0;">
        <h2 class="mb-3" style="text-transform: uppercase; font-weight: 900; font-size: 2.5rem; letter-spacing: -1px;">
            KRITERIA {{ $kriteria->id_kriteria }}</h2>
        <form action="{{ route('kriteria.update', $kriteria->id_kriteria) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4" >
                <label class="form-label"
                    style="text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 0.5rem;">NAMA</label>
                <input type="text" class="form-control" name="nama_kriteria" value="{{ $kriteria->nama_kriteria }}"
                    required
                    style="width: 100%; padding: 1rem; border: 3px solid #000; border-radius: 0; font-size: 1.2rem; background-color: #fff;">

                @error('nama_kriteria')
                    <div class="error-box mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4" >
                <label class="form-label"
                    style="text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 0.5rem;">ATRIBUT</label>
                <select class="form-select" name="atribut" required
                    style="width: 100%; padding: 1rem; border: 3px solid #000; border-radius: 0; font-size: 1.2rem; background-color: #fff;">
                    <option value="benefit" {{ $kriteria->atribut == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                    <option value="cost" {{ $kriteria->atribut == 'Cost' ? 'selected' : '' }}>Cost</option>
                </select>
            </div>
            <div class="mb-4" >
                <label class="form-label"
                    style="text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 0.5rem;">BOBOT</label>
                <input type="number" step="0.01" class="form-control" name="bobot" value="{{ $kriteria->bobot }}"
                    required
                    style="width: 100%; padding: 1rem; border: 3px solid #000; border-radius: 0; font-size: 1.2rem; background-color: #fff;">
                        @error('bobot')
                    <div class="error-box mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"
                style="padding: 1rem 2rem; border: 3px solid #000; border-radius: 0; background-color: #0d6efd; color: #fff; text-transform: uppercase; font-weight: 700; letter-spacing: 2px; box-shadow: 6px 6px 0 #000; transition: all 0.2s; margin-top: 1rem;">UPDATE</button>
        </form>
    </div>
@endsection
