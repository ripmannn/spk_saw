@extends('app')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    @endpush
    <div class="brutalist-actions mb-4">
        <a href="{{ route('kriteria.create') }}" class="btn btn-primary mb-3 d-inline-block btn-tambah">
            <i class='bx bx-plus'></i> TAMBAH KRITERIA
        </a>

        {{-- <div class="import-section mt-3 p-3 border border-dark">
            <h5 class="text-uppercase fw-bold">Import Data</h5>
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="d-flex gap-2 flex-wrap">
                @csrf
                <input type="file" name="file" accept=".xlsx,.xls" class="form-control border-dark">
                <button type="submit" class="btn btn-dark text-uppercase">Import Excel</button>
            </form>
            <a href="{{ route('template.download') }}" class="btn btn-success mt-2 text-uppercase fw-bold">
                Download Template Excel
            </a>
        </div> --}}
    </div>

    @if ($errors->any())
        <div class="alert alert-danger border border-dark border-2 p-3" role="alert">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li class="fw-bold">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session('success'))
        <div class="alert alert-success alert-custom" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close x" data-bs-dismiss="alert" aria-label="Close">×</button>
        </div>
    @endif

    <div class="table-responsive tbl-res">
        @if (count($kriterias) > 0)
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
                                <a href="{{ route('kriteria.edit', $kriteria->id_kriteria) }}"
                                    class="btn btn-warning btn-edit"> <i class='bx bx-edit'></i> EDIT</a>
                                <form action="{{ route('kriteria.destroy', $kriteria->id_kriteria) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"> <i class='bx bx-trash'></i>
                                        HAPUS</button>
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
