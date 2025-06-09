@extends('app')
@section('content')

{{-- perangkingan --}}
    <div class="card mb-5" style="border: 4px solid #000; box-shadow: 8px 8px 0 #000;">
        <div class="card-header bg-primary" style="border-bottom: 4px solid #000; font-family: monospace; color: #000;">
            <h5 class="m-0" style="text-transform: uppercase; letter-spacing: 2px;">PERANGKINGAN</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered m-0" style="border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #000;">
                        <th class="text-center" style="border: 3px solid #000; color: #000;">RANK</th>
                        <th class="text-center" style="border: 3px solid #000; color: #000;">ID</th>
                        <th class="text-center" style="border: 3px solid #000; color: #000;">NAMA ALTERNATIF</th>
                        <th class="text-center" style="border: 3px solid #000; color: #000;">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rank as $key => $val)
                        <tr style="background-color: {{ $loop->odd ? '#fff' : '#eee' }};">
                            <td class="text-center font-weight-bold" style="border: 3px solid #000; font-size: 1.1rem; color: #000;">{{ $val }}</td>
                            <td class="text-center" style="border: 3px solid #000; color: #000;">{{ $key }}</td>
                            <td style="border: 3px solid #000; color: #000;">{{ $alternatifs[$key]->nama_alternatif }}</td>
                            <td class="text-center font-weight-bold" style="border: 3px solid #000; color: #000;">{{ round($total[$key], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

{{-- data nilai --}}
    <div class="card mb-5" style="border: 4px solid #000; box-shadow: 8px 8px 0 #000;">
        <div class="card-header" style="border-bottom: 4px solid #000; background-color: #ff6b6b; color: #000; font-family: monospace;">
            <h5 class="m-0" style="text-transform: uppercase; letter-spacing: 2px;">DATA NILAI</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered m-0" style="border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #000;">
                        <th style="border: 3px solid #000; color: #000;">ID</th>
                        <th style="border: 3px solid #000; color: #000;">NAMA</th>
                        @foreach ($kriterias as $kriteria)
                            <th style="border: 3px solid #000; color: #000;">{{ $kriteria->nama_kriteria }} ({{ $kriteria->atribut }}: {{ $kriteria->bobot }})</th>
                        @endforeach
                    </tr>
                </thead>
                @foreach ($nilais as $key => $val)
                    <tr style="background-color: {{ $loop->odd ? '#fff' : '#eee' }};">
                        <td style="border: 3px solid #000; color: #000;">{{ $key }}</td>
                        <td style="border: 3px solid #000; color: #000;">{{ $alternatifs[$key]->nama_alternatif }}</td>
                        @foreach ($val as $k => $v)
                            <td style="border: 3px solid #000; color: #000;">{{ $v }}</td>
                        @endforeach
                    </tr>
                @endforeach
                <tr style="background-color: #ffdd57;">
                    <td colspan="2" style="border: 3px solid #000; font-weight: bold; color: #000;">MIN</td>
                    @foreach ($minmax as $key => $val)
                        <td style="border: 3px solid #000; color: #000;">{{ $val['min'] }}</td>
                    @endforeach
                </tr>
                <tr style="background-color: #ffdd57;">
                    <td colspan="2" style="border: 3px solid #000; font-weight: bold; color: #000;">MAX</td>
                    @foreach ($minmax as $key => $val)
                        <td style="border: 3px solid #000; color: #000;">{{ $val['max'] }}</td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>

{{-- normalisasi --}}
    <div class="card mb-5" style="border: 4px solid #000; box-shadow: 8px 8px 0 #000;">
        <div class="card-header" style="border-bottom: 4px solid #000; background-color: #4ecdc4; color: #000; font-family: monospace;">
            <h5 class="m-0" style="text-transform: uppercase; letter-spacing: 2px;">NORMALISASI</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered m-0" style="border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #000;">
                        <th style="border: 3px solid #000; color: #000;">ID</th>
                        @foreach ($kriterias as $kriteria)
                            <th style="border: 3px solid #000; color: #000;">{{ $kriteria->nama_kriteria }} : {{ $kriteria->id_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                @foreach ($normal as $key => $val)
                    <tr style="background-color: {{ $loop->odd ? '#fff' : '#eee' }};">
                        <td style="border: 3px solid #000; color: #000;">{{ $key }}</td>
                        @foreach ($val as $k => $v)
                            <td style="border: 3px solid #000; color: #000;">{{ round($v, 4) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{-- terbobot --}}
    <div class="card mb-5" style="border: 4px solid #000; box-shadow: 8px 8px 0 #000;">
        <div class="card-header" style="border-bottom: 4px solid #000; background-color: #ffd166; color: #000; font-family: monospace;">
            <h5 class="m-0" style="text-transform: uppercase; letter-spacing: 2px;">TERBOBOT</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered m-0" style="border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #000;">
                        <th style="border: 3px solid #000; color: #000;">ID</th>
                        @foreach ($kriterias as $kriteria)
                            <th style="border: 3px solid #000; color: #000;">{{ $kriteria->nama_kriteria }} : {{ $kriteria->id_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                @foreach ($terbobot as $key => $val)
                    <tr style="background-color: {{ $loop->odd ? '#fff' : '#eee' }};">
                        <td style="border: 3px solid #000; color: #000;">{{ $key }}</td>
                        @foreach ($val as $k => $v)
                            <td style="border: 3px solid #000; color: #000;">{{ round($v, 4) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
