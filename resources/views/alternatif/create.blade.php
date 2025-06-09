@extends('app')
@section('content')
    <style>
        .brutalist-form {
            border: 3px solid #000;
            padding: 20px;
            background-color: #fff;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 8px 8px 0px #000;
        }

        .brutalist-form label {
            text-transform: uppercase;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        .brutalist-form input,
        .brutalist-form select {
            width: 100%;
            border: 3px solid #000;
            padding: 10px;
            margin-bottom: 15px;
            font-family: monospace;
            background-color: #f0f0f0;
            border-radius: 0;
            color: #333;
        }

        .brutalist-btn {
            background-color: #4CAF50;
            color: #000;
            border: 3px solid #000;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 4px 4px 0 #000;
            border-radius: 0;
        }

        .brutalist-btn:hover {
            background-color: #218838;
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0 #000;
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

        <form action="{{ route('alternatif.store') }}" method="POST" class="brutalist-form">
            @csrf
            <div class="form-group mb-4">
                <label for="nama_alternatif">Nama</label>
                <input type="text" class="@error('nama_alternatif') is-invalid @enderror" id="nama_alternatif"
                    name="nama_alternatif" value="{{ old('nama_alternatif') }}" required>
                @error('nama_alternatif')
                    <div class="error-box">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="brutalist-btn">Simpan</button>
        </form>
    </div>
@endsection
