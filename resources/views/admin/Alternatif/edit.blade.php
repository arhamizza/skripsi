@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'alternatif',
])

@section('content')
<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="class-header">
                <h3>Edit Alternatif</h3>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('update-alternatif/'.$alternatif->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Nama Alternatif</label>
                                    <input type="text" value="{{ $alternatif->nama_alternatif }}" class="form-control" name="nama_alternatif" value=""
                                        placeholder="Masukkan Nama_Alternatif">
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
