@extends('app')
@section('content')
 <style>
    .brutalist-form {
        border: 3px solid #000;
        padding: 20px;
        background-color: #fff;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .brutalist-form label {
        text-transform: uppercase;
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }
    
    .brutalist-form input,
    .brutalist-form select {
        width: 100%;
        border: 2px solid #000;
        padding: 8px;
        margin-bottom: 15px;
        font-family: monospace;
        background-color: #f0f0f0;
    }
    
    .brutalist-btn {
        background-color: #28a745;
        color: white;
        border: 2px solid #000;
        padding: 10px 20px;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
        transition: none;
    }
    
    .brutalist-btn:hover {
        background-color: #218838;
        transform: translate(-2px, -2px);
        box-shadow: 4px 4px 0 #000;
    }
    
    .brutalist-form-header {
        background-color: #007bff;
        color: white;
        padding: 15px;
        margin-bottom: 20px;
        border: 3px solid #000;
        text-align: center;
    }
    
    .error-box {
        background-color: #ff0000;
        color: white;
        padding: 5px;
        margin-top: -15px;
        margin-bottom: 15px;
        border: 2px solid #000;
    }
    </style>
    <div class="container">
    <div class="brutalist-form">
        <div class="brutalist-form-header">
        <h3 class="mb-0">{{ $title }}</h3>
        </div>
        <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_alternatif">Alternatif</label>
            <select name="id_alternatif" id="id_alternatif" required>
            <option value="">-- Pilih Alternatif --</option>
            @foreach ($alternatifs as $a)
                <option value="{{ $a->id_alternatif }}">{{ $a->nama_alternatif }} ({{ $a->id_alternatif }})</option>
            @endforeach
            </select>
        </div>

        @foreach ($kriterias as $k)
            <div class="mb-3">
            <label for="nilai_{{ $k->id_kriteria }}">{{ $k->nama_kriteria }} : ( {{$k->id_kriteria}} )</label>
            <input type="number" step="0.01" name="nilai[{{ $k->id_kriteria }}]"
                id="nilai_{{ $k->id_kriteria }}" required>
            @error('nilai.'.$k->id_kriteria)
                <div class="error-box mt-1">
                {{ $message }}
                </div>
            @enderror
            </div>
        @endforeach

        <button type="submit" class="brutalist-btn">Simpan</button>
        </form>
    </div>
    </div>
@endsection
