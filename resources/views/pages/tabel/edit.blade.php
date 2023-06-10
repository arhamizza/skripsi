@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'tabel',
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
                            <form action="{{ url('update-nilai/'.$tabel->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <select class="form-control" id="type" name="id_linguistik">
                                    @foreach($tabel2 as $user)
                                        <option value="{{ $user->id }}" 
                                            {{ $user->id_linguistik == $tabel->id ? 'selected' : '' }}>{{ $user->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="">A</label>
                                    <input type="text" value="{{ $tabel->A }}" class="form-control" name="A" value=""
                                        placeholder="Masukkan A">
                                </div>
                                <div class="form-group">
                                    <label for="">B</label>
                                    <input type="text" value="{{ $tabel->B }}" class="form-control" name="B" value=""
                                        placeholder="Masukkan B">
                                </div>
                                <div class="form-group">
                                    <label for="">C</label>
                                    <input type="text" value="{{ $tabel->C }}" class="form-control" name="C" value=""
                                        placeholder="Masukkan C">
                                </div>
                                <div class="form-group">
                                    <label for="">D</label>
                                    <input type="text" value="{{ $tabel->D }}" class="form-control" name="D" value=""
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
