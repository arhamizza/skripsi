@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard',
])

@section('content')
<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="class-header">
                <h3>edit Data</h3>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('update-linguistik/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" value="{{ $data->nama }}" class="form-control" name="nama" value=""
                                        placeholder="Masukkan Nama">
                                </div>
                                @if ($data->visualisasi)
                                    <img src="{{ asset('paper/img/'.$data->visualisasi) }}" alt="data Image">
                                @endif

                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="visualisasi" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Gambar">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
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
