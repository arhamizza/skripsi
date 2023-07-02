@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'kriteria',
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
                            <form action="{{ url('insert-kriteria') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Kriteria</label>
                                    <input type="interger" class="form-control" name="nama_kriteria" value=""
                                        placeholder="Masukkan kriteria">
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
