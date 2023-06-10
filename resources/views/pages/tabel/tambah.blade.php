@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'tabel',
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
                            <form action="{{ url('insert-nilai') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="position-option">Pilih Nama Linguistik</label>
                                    <select class="form-select" name="id_linguistik">
                                        <option value>Pilih Nama Linguistik</option>
                                        @foreach ($tabel as $item)
                                            <option value="{{ $item->id_linguistik }}" class="bold">{{ $item->asd->nama }}</option>
                                        @endforeach
                                    </select>
                                 </div>
                                <div class="form-group">
                                    <label for="">A</label>
                                    <input type="interger" class="form-control" name="A" value=""
                                        placeholder="Masukkan A">
                                </div>
                                <div class="form-group">
                                    <label for="">B</label>
                                    <input type="interger" class="form-control" name="B" value=""
                                        placeholder="Masukkan B">
                                </div>
                                <div class="form-group">
                                    <label for="">C</label>
                                    <input type="interger" class="form-control" name="C" value=""
                                        placeholder="Masukkan C">
                                </div>
                                <div class="form-group">
                                    <label for="">D</label>
                                    <input type="interger" class="form-control" name="D" value=""
                                        placeholder="Masukkan D">
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
