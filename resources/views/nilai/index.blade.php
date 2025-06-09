@extends('app')
@section('content')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    
@endpush
    <a href="{{ route('nilai.create') }}" class="btn btn-primary mb-3 d-inline-block btn-tambah" ><i class='bx  bx-plus'></i> <span>Tambah Nilai</span></a>

    @if (session('success'))
        <div class="alert alert-success alert-custom" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close x" data-bs-dismiss="alert" aria-label="Close">×</button>
        </div>
    @endif

    <div class="table-responsive tbl-res">
        @if(count($nilais) > 0)
            <table class="table m-0" style="margin: 0; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->nama_kriteria }} : ({{ $kriteria->id_kriteria }})</th>
                        @endforeach
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach ($nilais as $key => $val)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $alternatifs[$key]->nama_alternatif }}</td>
                        @foreach ($val as $k => $v)
                            <td>{{ $v }}</td>
                        @endforeach
                        <td>
                            <a href="{{ route('nilai.edit', $key) }}" class="btn btn-sm btn-warning btn-edit"><i class='bx bx-edit'></i> Edit</a>

                            <form action="{{ route('nilai.destroy', $key) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-delete"><i class='bx  bx-trash'  ></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="text-center py-5">
                <i class='bx bx-folder-open' style="font-size: 80px; color: #d3d3d3;"></i>
                <p class="mt-3">Tidak ada data Nilai yang tersedia</p>
                <p>Silakan tambahkan Nilai baru</p>
            </div>
        @endif
    </div>
@endsection
