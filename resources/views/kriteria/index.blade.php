@extends('app')
@section('content')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    
@endpush
    <a href="{{ route('kriteria.create') }}" class="btn btn-primary mb-3 d-inline-block btn-tambah"> <i class='bx bx-plus'></i> TAMBAH KRITERIA</a>

    @if (session('success'))
        <div class="alert alert-success alert-custom" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close x" data-bs-dismiss="alert" aria-label="Close">×</button>
        </div>
    @endif

    <div class="table-responsive tbl-res">
        @if(count($kriterias) > 0)
            <table class="table m-0" style="margin: 0; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Atribut</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $kriteria)
                        <tr>
                            <td>{{ $kriteria->id_kriteria }}</td>
                            <td>{{ $kriteria->nama_kriteria }}</td>
                            <td>{{ $kriteria->atribut }}</td>
                            <td>{{ $kriteria->bobot }}</td>
                            <td>
                                <a href="{{ route('kriteria.edit', $kriteria->id_kriteria) }}" class="btn btn-warning btn-edit"> <i class='bx bx-edit'></i> EDIT</a>
                                <form action="{{ route('kriteria.destroy', $kriteria->id_kriteria) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"> <i class='bx bx-trash'></i> HAPUS</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center py-5">
                <i class='bx bx-folder-open' style="font-size: 80px; color: #d3d3d3;"></i>
                <p class="mt-3">Tidak ada data kriteria yang tersedia</p>
                <p>Silakan tambahkan kriteria baru</p>
            </div>
        @endif
    </div>
@endsection
