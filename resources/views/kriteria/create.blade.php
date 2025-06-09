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
        
        .error-box {
            background-color: #ff0000;
            color: white;
            padding: 5px;
            margin-top: -15px;
            margin-bottom: 15px;
            border: 2px solid #000;
        }
    </style>

    <form action="{{ route('kriteria.store') }}" method="POST" class="brutalist-form">
        @csrf
        <div class="mb-3">
            <label for="nama_kriteria">Nama</label>
            <input type="text" id="nama_kriteria" name="nama_kriteria" value="{{ old('nama_kriteria') }}" required>
            @error('nama_kriteria')
                <div class="error-box">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="atribut">Atribut</label>
            <select id="atribut" name="atribut" required>
                <option value="Benefit">Benefit</option>
                <option value="Cost">Cost</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="bobot">Bobot</label>
            <input type="number" step="0.01" id="bobot" name="bobot" value="{{ old('bobot') }}" required>
            @error('bobot')
                <div class="error-box">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="brutalist-btn">Simpan</button>
    </form>
@endsection
