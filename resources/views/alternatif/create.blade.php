@extends('app')
@section('content')
    <form action="{{ route('alternatif.store') }}" method="POST">
        @csrf
        <div class="form-group"> 
            <label for="nama_alternatif">Nama Alternatif</label>
            <input type="text" name="nama_alternatif" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Simpan</button>
    </form>
@endsection
