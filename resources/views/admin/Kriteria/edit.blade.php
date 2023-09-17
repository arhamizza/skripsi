@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'kriteria',
])

@section('content')
<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="class-header">
                <h3>Edit Kriteria</h3>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('update-kriteria/'.$kriteria->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Nama Kriteria</label>
                                    <input type="text" value="{{ $kriteria->nama_kriteria }}" class="form-control" name="nama_kriteria" value=""
                                        placeholder="Masukkan Nama_kriteria">
                                </div>
                                <div class="form-group">
                                    <label for="">Bobot</label>
                                    <input type="text" value="{{ $kriteria->bobot }}" class="form-control" name="nama_kriteria" value=""
                                        placeholder="Masukkan bobot">
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
