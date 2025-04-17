@extends('app')
@section('content')
    <form action="{{ route('alternatif.update', $alternatif->id_alternatif) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_alternatif">Nama Alternatif</label>
            <input type="text" name="nama_alternatif" class="form-control" value="{{ $alternatif->nama_alternatif }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
@endsection
