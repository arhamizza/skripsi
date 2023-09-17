@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'transaksi',
])
@section('content')
    <div class="content">
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card p-4">
                        <h3>Data Siswa</h3>
    
                        <table class="table">
                            <thead>
                                <th>Nama</th>
                                <th>Rank</th>
                            </thead>
                            <tbody>
                                @foreach ($hasilAkhir as $key => $item)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{{ $loop->iteration }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card p-4">
                        <h3>Data Guru</h3>
                        <table class="table">
                            <thead>
                                <th>Nama</th>
                            </thead>
                            <tbody>
                                @foreach ($penilai as $item)
                                    <tr>
                                        <td>{{ $item->nama_guru }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card p-4">
                <h3>Hasil Analisis</h3>
                <table class="table">
                    <thead>
                        <tr>
                            @foreach ($calon as $c)
                                <th scope="col">{{ $c->nama_siswa }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($hasilPerhitungan as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
