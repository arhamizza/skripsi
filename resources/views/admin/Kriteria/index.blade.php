@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'kriteria',
])

@section('content')
    <div class="content">
        <h1>Tabel Kriteria</h1>
        <a href="{{ url('tambah-kriteria')}}" class="btn btn-primary">Tambah</a>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>                    
                    <th>Nama Kriteria</th>
                    <th>Bobot Kriteria</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tbody>
                    <?php 
                        $id = 0;
                    ?>
                    @foreach ($kriteria as $kriteria)
                        <tr>
                            <td>{{ $id++ +1 }}</td>
                            <td>{{$kriteria->nama_kriteria}}</td>
                            <td>{{$kriteria->bobot}}</td>
                            </td>
                            <td>
                                
                                <a href="{{ url('edit-kriteria/'.$kriteria->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square fa-2xl"></i></a>
                                <a href="{{ url('hapus-kriteria/'.$kriteria->id)}}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-trash fa-beat-fade fa-2xl"></i></a href="">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Body</th>
                </tr>
            </tfoot>
        </table>


    </div>
@endsection

