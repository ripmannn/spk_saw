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
    <div class="brutalist-container"
        style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #f0f0f0; border: 4px solid #000;">
        <h2
            style="font-size: 2.5rem; text-transform: uppercase; letter-spacing: -1px; border-bottom: 8px solid #000; padding-bottom: 10px; margin-bottom: 20px;">
            {{ $title }}: {{ $alternatif->id_alternatif }}</h2>

        <form action="{{ route('nilai.update', $alternatif->id_alternatif) }}" method="POST"
            style="display: block; width: 100%;">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 25px;">
                <label
                    style="display: block; text-transform: uppercase; font-weight: bold; font-size: 1.2rem; margin-bottom: 10px;">ALTERNATIF</label>
                <input type="text"
                    style="width: 100%; padding: 12px; font-size: 1.1rem; border: 3px solid #000; background-color: #fff;"
                    value="{{ $alternatif->nama_alternatif }}" disabled>
            </div>

            @foreach ($kriterias as $k)
                <div style="margin-bottom: 25px;">
                    <label
                        style="display: block; text-transform: uppercase; font-weight: bold; font-size: 1.2rem; margin-bottom: 10px;">{{ $k->nama_kriteria }}</label>
                    <input type="number" step="0.01" name="nilai[{{ $k->id_kriteria }}]"
                        style="width: 100%; padding: 12px; font-size: 1.1rem; border: 3px solid #000; background-color: #fff;"
                        value="{{ $nilaiMap[$k->id_kriteria] ?? '' }}" required>
                    @error('nilai.' . $k->id_kriteria)
                        <div class="error-box mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary"
                style="padding: 1rem 2rem; border: 3px solid #000; border-radius: 0; background-color: #0d6efd; color: #fff; text-transform: uppercase; font-weight: 700; letter-spacing: 2px; box-shadow: 6px 6px 0 #000; transition: all 0.2s; margin-top: 1rem;">UPDATE</button>
        </form>
    </div>
@endsection
