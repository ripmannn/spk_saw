@extends('app')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    @endpush
    <a href="{{ route('alternatif.create') }}" class="btn btn-primary mb-3 d-inline-block btn-tambah"><i
            class='bx  bx-plus'></i> Tambah Alternatif</a>

    @if (session('success'))
        <div class="alert alert-success alert-custom" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close x" data-bs-dismiss="alert" aria-label="Close">×</button>
        </div>
    @endif


    <div class="table-responsive tbl-res">
        @if(count($alternatifs) > 0)
            <table class="table m-0" style="margin: 0; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alternatif)
                        <tr>
                            <td>{{ $alternatif->id_alternatif }}</td>
                            <td>{{ $alternatif->nama_alternatif }}</td>
                            <td>
                                <a href="{{ route('alternatif.edit', $alternatif->id_alternatif) }}"
                                    class="btn btn-sm btn-warning btn-edit"><i class='bx bx-edit'></i> Edit</a>
                                <form action="{{ route('alternatif.destroy', $alternatif->id_alternatif) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete"><i class='bx bx-trash'></i>
                                        Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center py-5">
                <i class='bx bx-folder-open' style="font-size: 80px; color: #d3d3d3;"></i>
                <p class="mt-3">Tidak ada data Alternatif yang tersedia</p>
                <p>Silakan tambahkan Alternatif baru</p>
            </div>
        @endif
    </div>
@endsection
