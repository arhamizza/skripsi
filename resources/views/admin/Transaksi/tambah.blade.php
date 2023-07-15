@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'transaksi_guru',
])

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="class-header">
                    <h3>Tambah Data</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('transaksigurus_create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input class="form-control" name="kode" placeholder="Kode">
                                    </div>
                                    <div class="form-group">
                                        <label>Transaksi</label>
                                        <input class="form-control" name="nama" placeholder="Transaksi">
                                    </div>
                                    <div class="form-group">
                                        <label for="position-option">Pilih Kelas</label><br>
                                        <select class="form-select" name="id_kelas">
                                            <option value>Pilih Kelas</option>
                                            @foreach ($kelas as $item)
                                                <option value="{{ $item->id }}" class="bold">{{ $item->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                                            style="width: 100%; display: inline;" onchange="invoicedue(event);" required
                                            value="{{ old('started_at') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input class="form-control" name="keterangan" type="text" placeholder="Keterangan">
                                    </div>
                                    
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
@endsection
